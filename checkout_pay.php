<?php 
    require_once('checkout_config.php');
    require_once('checkout_utils.php');
    require_once('verifica.php');
?>

    <meta charset="UTF-8">
<?php 
    
    $creditCardToken = htmlspecialchars($_POST["token"]);
    $senderHash = htmlspecialchars($_POST["senderHash"]);

    $itemAmount = number_format($_POST["amount"], 2, '.', '');
    $shippingCoast = number_format($_POST["shippingCoast"], 2, '.', '');
    $installmentValue = number_format($_POST["installmentValue"], 2, '.', '');
    $installmentsQty = $_POST["installments"];

    $params = array(
        'email'                     => $PAGSEGURO_EMAIL,  
        'token'                     => $PAGSEGURO_TOKEN,
        'creditCardToken'           => $creditCardToken,
        'senderHash'                => $senderHash,
        'receiverEmail'             => $PAGSEGURO_EMAIL,
        'paymentMode'               => 'default', 
        'paymentMethod'             => 'creditCard', 
        'currency'                  => 'BRL',
        // 'extraAmount'               => '1.00',
        'itemId1'                   => '0001',
        'itemDescription1'          => 'PHP Test',  
        'itemAmount1'               => $itemAmount,  
        'itemQuantity1'             => 1,
        'reference'                 => 'REF1234',
        'senderName'                => 'Chuck Norris',
        'senderCPF'                 => '54793120652',
        'senderAreaCode'            => 83,
        'senderPhone'               => '999999999',
        'senderEmail'               => 'ChuckNorris@sandbox.pagseguro.com.br',
        'shippingAddressStreet'     => 'Address',
        'shippingAddressNumber'     => '1234',
        'shippingAddressDistrict'   => 'Bairro',
        'shippingAddressPostalCode' => '58075000',
        'shippingAddressCity'       => 'João Pessoa',
        'shippingAddressState'      => 'PB',
        'shippingAddressCountry'    => 'BRA',
        'shippingType'              => 1,
        'shippingCost'              => $shippingCoast,
        'maxInstallmentNoInterest'      => 2,
        'noInterestInstallmentQuantity' => 2,
        'installmentQuantity'       => $installmentsQty,
        'installmentValue'          => $installmentValue,
        'creditCardHolderName'      => 'Chuck Norris',
        'creditCardHolderCPF'       => '54793120652',
        'creditCardHolderBirthDate' => '01/01/1990',
        'creditCardHolderAreaCode'  => 83,
        'creditCardHolderPhone'     => '999999999',
        'billingAddressStreet'     => 'Address',
        'billingAddressNumber'     => '1234',
        'billingAddressDistrict'   => 'Bairro',
        'billingAddressPostalCode' => '58075000',
        'billingAddressCity'       => 'João Pessoa',
        'billingAddressState'      => 'PB',
        'billingAddressCountry'    => 'BRA'
    );

    $header = array('Content-Type' => 'application/json; charset=UTF-8;');
    $response = curlExec($PAGSEGURO_API_URL."/transactions", $params, $header);
    $json = json_decode(json_encode(simplexml_load_string($response)));


    $valorcarregado=$json->items->item->amount;
    $valorpago=$json->grossAmount;
    $valorrecebido=$json->netAmount;
    $codigo = $json->code;

    /*
    Status pagseguro
    1 - Aguardando pagamento;
    2 - Em análise
    3 - Paga: a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.
    4 - Disponível: a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.
    5 - Em disputa: o comprador, dentro do prazo de liberação da transação, abriu uma disputa.
    6 - Devolvida: o valor da transação foi devolvido para o comprador.
    7 - Cancelada: a transação foi cancelada sem ter sido finalizada.
    */

    if ($json->status==1){
        $status='AGUARDANDO PAGAMENTO';
    }elseif($json->status==2){
        $status='EM ANÁLISE';
    }elseif($json->status==3){
        $status='PAGA';
    }elseif($json->status==4){
        $status='DISPONIVEL';
    }elseif($json->status==5){
        $status='EM DISPUTA';
    }elseif($json->status==6){
        $status='DEVOLVIDA';
    }elseif($json->status==7){
        $status='CANCELADA';
    }
    ?>
    

<?php
/*
echo $idx.'<br>';
echo $valorcarregado.'<br>';
echo $codigo.'<br>';
echo json_encode($json).'<br>';
echo $status.'<br>';
echo $nomex.'<br>';
*/

$query = "insert into tb_extrato (id_conta, tipo, valor, descricao, codigo, json, status, datareg, userreg) values (".$idx.", 'C', '".$valorcarregado."', 'Compra de créditos', '".$codigo."', '".json_encode($json)."', '".$status."', '".Date('Y-m-d H:i:s')."', '".$nomex."') ";
//echo $query;

if (mysqli_query($conn, $query)) {

    if ($status=='PAGA' or $status=='DISPONIVEL'){
        //ATUALIZA O SALDO
        $query2 = "update tbfuncionarios set saldo=saldo+'".$valorcarregado."' where id=".$idx." ";
        if (mysqli_query($conn, $query2)) {
            ?>
                <script>
                    alert('Sua compra foi efetivada e você pode utilizar os seus créditos!');
                </script>
            <?
            
        }else{
            echo "Erro ao atualizar o saldo: " . $query2 . "<br>" . mysqli_error($conn)."<br>Procure o nosso suporte e relate esse erro.";
            exit;
        }

    }else{
        ?>
            <script>
            alert('O seu pagamento está sendo processado.\n EM breve seus créditos estarão disponíveis!');
            </script>
        <?
    }
} else {
    echo "Erro ao comprar os créditos: " . $query . "<br>" . mysqli_error($conn)."<br>Procure o nosso suporte e relate esse erro.";
    exit;
}

//header('Location: painel.php?go=extrato');
?>
<script>
window.location='painel.php?go=extrato';
</script>