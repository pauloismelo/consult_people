<?php 
require_once('checkout_config.php');
require_once('db.php');

//METODO POST É O PADRÃO ENVIADO PELO PAGSEGURO
if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
    //Todo resto do código iremos inserir aqui.

	$email = $PAGSEGURO_EMAIL;
    $token =  $PAGSEGURO_TOKEN;



	$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/'.$_POST['notificationCode'].'?email='.$email.'&token='.$token;
	//$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/'.$_POST['notificationCode'].'?email='.$email.'&token='.$token;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);

    if($transaction == 'Unauthorized'){
        $redirect='http://www.atualizarinformatica.com.br/consulta/retorno_avisa_erro.asp?notificationCode='.$_POST['notificationCode'];
		header("location:$redirect");

        exit;//Mantenha essa linha
    }
    $transaction = simplexml_load_string($transaction);
	$transacaoID= $transaction -> code;
	$StatusTransacao=$transaction -> status;
	$Referencia=$transaction -> reference;
	$TipoPagamento=$transaction -> paymentMethod -> type;
	$Bandeira=$transaction -> paymentMethod -> code;
	$areceber=$transaction -> netAmount;
	$valor=$transaction -> grossAmount;
	$valorcreditado = $transaction -> items -> item ->amount;
	
	   if ($TipoPagamento=='1'){
			$tppag='CREDITO';
	   }else if ($TipoPagamento=='2') {
			$tppag='BOLETO';
		}else if ($TipoPagamento=='3'){ 
			$tppag='DEBITO';
		}else if ($TipoPagamento=='4'){ 
			$tppag='PAGSEGURO';
		}elseif ($TipoPagamento=='5'){ 
			$tppag='OIPAGGO';
		}else if ($TipoPagamento=='7'){ 
			$tppag='DEP.PAGSEGURO';
		}
		
		if ($StatusTransacao=='1'){
			$stat='Aguardando';
		}else if($StatusTransacao=='2'){
			$stat='Em analise';
		}else if($StatusTransacao=='3'){
			$stat='Paga';
		}else if($StatusTransacao=='4'){
			$stat='Disponivel';
		}else if($StatusTransacao=='5'){
			$stat='Em disputa';
		}else if($StatusTransacao=='6'){
			$stat='Devolvida';
		}else if($StatusTransacao=='7'){
			$stat='Cancelada';
		}else if($StatusTransacao=='8'){
			$stat='Devolvido';
		}else if($StatusTransacao=='9'){
			$stat='Em contestacao';
		}
		
		if ($Bandeira=='101'){
			$band='VISA';
		}else if($Bandeira=='102'){
			$band='MASTERCARD';
		}else if($Bandeira=='103'){
			$band='AMERICANEXPRESS';
		}else if($Bandeira=='104'){
			$band='DINERS';
		}else if($Bandeira=='105'){
			$band='HIPERCARD';
		}else if($Bandeira=='106'){
			$band='AURA';
		}else if($Bandeira=='107'){
			$band='ELO';
		}else if($Bandeira=='108'){
			$band='PLENOCARD';
		}else if($Bandeira=='109'){
			$band='PERSONALCARD';
		}else if($Bandeira=='110'){
			$band='JCB';
		}else if($Bandeira=='111'){
			$band='DISCOVER';
		}else if($Bandeira=='112'){
			$band='BRASILCARD';
		}else if($Bandeira=='113'){
			$band='FORTBRASIL';
		}else if($Bandeira=='114'){
			$band='CORDBAN';
		}else if($Bandeira=='115'){
			$band='VALERCARD';
		}else if($Bandeira=='116'){
			$band='CABAL';
		}else if($Bandeira=='117'){
			$band='MAIS';
		}else if($Bandeira=='118'){
			$band='CART.AVISTA';
		}else if($Bandeira=='119'){
			$band='GRANDCARD';
		}else if($Bandeira=='120'){
			$band='SOROCRED';
		}else if($Bandeira=='201'){
			$band='BOL.BRADESCO';
		}else if($Bandeira=='202'){
			$band='BOL.SANTANDER';
		}else if($Bandeira=='301'){
			$band='DEB.BRADESCO';
		}else if($Bandeira=='302'){
			$band='DEB.ITAU';
		}else if($Bandeira=='303'){
			$band='DEB.UNIBANCO';
		}else if($Bandeira=='304'){
			$band='DEB.BANCOBRASIL';
		}else if($Bandeira=='305'){
			$band='DEB.BANCOREAL';
		}else if($Bandeira=='306'){
			$band='DEB.BANRISUL';
		}else if($Bandeira=='307'){
			$band='DEB.HSBC';
		}else if($Bandeira=='401'){
			$band='SALDO.PAGSEGURO';
		}else if($Bandeira=='501'){
			$band='OI.PAGGO';
		}else if($Bandeira=='701'){
			$band='DEP.BANCOBRASIL';
		}else if($Bandeira=='702'){
			$band='DEP.HSBC';
		}
		
		if ($stat=='Paga'){
			$SQLus="select id_conta from tb_extrato where codigo='".$transacaoID."' ";
			$resus = mysqli_query($conn,$SQLus);
			$rsus = mysqli_fetch_array($resus);
			$registrosus =mysqli_num_rows($resus);
			if ($registrosus>0){
				$queryx = "update tbfuncionarios set saldo=saldo+'".$valorcreditado."'  where id='".$rsus['id_conta']."' ";
				if (mysqli_query($conn, $queryx)) {
					echo "Saldo atualizado com sucesso!";
				} else {
					echo "Error: " . $queryx . "<br>" . mysqli_error($conn);
					exit;
				}
			}
			unset($SQLus);
			unset($resus);
			unset($rsus);
			unset($registrosus);		
		}
		

			$query3 = "update tb_extrato set status='".$stat."'  where codigo='".$transacaoID."' ";
			if (mysqli_query($conn, $query3)) {
				echo "Atualizado com sucesso!";
			} else {
				echo "Error: " . $query3 . "<br>" . mysqli_error($conn);
				exit;
			}
		
		//$redirect='http://www.atualizarinformatica.com.br/lulanna/pay/retorno_pagseguro.asp?StatusTransacao='.$stat.'&Referencia='.$Referencia.'&TipoPagamento='.$tppag.'&vlrloja='.$areceber.'&bandeira='.$band.'&TransacaoID='.$transacaoID;
				
	//	header("location:$redirect");
}
?>

<?php //METODO POST É O PADRÃO ENVIADO PELO PAGSEGURO
if(isset($_GET['notificationType']) && $_GET['notificationType'] == 'transaction'){
    //Todo resto do código iremos inserir aqui.

   	$email = $PAGSEGURO_EMAIL;
    $token = $PAGSEGURO_TOKEN;

    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/'.$_GET['notificationCode'].'?email='.$email.'&token='.$token;
	//$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/'.$_GET['notificationCode'].'?email='.$email.'&token='.$token;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);

    if($transaction == 'Unauthorized'){
        $redirect='http://www.atualizarinformatica.com.br/consulta/retorno_avisa_erro.asp?notificationCode='.$_GET['notificationCode'];
		header("location:$redirect");

        exit;//Mantenha essa linha
    }
	print_r($transaction);
    $transaction = simplexml_load_string($transaction);
	$transacaoID= $transaction -> code;
	$StatusTransacao=$transaction -> status;
	$Referencia=$transaction -> reference;
	$TipoPagamento=$transaction -> paymentMethod -> type;
	$Bandeira=$transaction -> paymentMethod -> code;
	$areceber=$transaction -> netAmount;
	$valor=$transaction -> grossAmount;
	$valorcreditado = $transaction -> items -> item ->amount;
	
	   if ($TipoPagamento=='1'){
			$tppag='CREDITO';
	   }else if ($TipoPagamento=='2') {
			$tppag='BOLETO';
		}else if ($TipoPagamento=='3'){ 
			$tppag='DEBITO';
		}else if ($TipoPagamento=='4'){ 
			$tppag='PAGSEGURO';
		}elseif ($TipoPagamento=='5'){ 
			$tppag='OIPAGGO';
		}else if ($TipoPagamento=='7'){ 
			$tppag='DEP.PAGSEGURO';
		}
		
		if ($StatusTransacao=='1'){
			$stat='Aguardando';
		}else if($StatusTransacao=='2'){
			$stat='Em analise';
		}else if($StatusTransacao=='3'){
			$stat='Paga';
		}else if($StatusTransacao=='4'){
			$stat='Disponivel';
		}else if($StatusTransacao=='5'){
			$stat='Em disputa';
		}else if($StatusTransacao=='6'){
			$stat='Devolvida';
		}else if($StatusTransacao=='7'){
			$stat='Cancelada';
		}else if($StatusTransacao=='8'){
			$stat='Devolvido';
		}else if($StatusTransacao=='9'){
			$stat='Em contestacao';
		}
		
		if ($Bandeira=='101'){
			$band='VISA';
		}else if($Bandeira=='102'){
			$band='MASTERCARD';
		}else if($Bandeira=='103'){
			$band='AMERICANEXPRESS';
		}else if($Bandeira=='104'){
			$band='DINERS';
		}else if($Bandeira=='105'){
			$band='HIPERCARD';
		}else if($Bandeira=='106'){
			$band='AURA';
		}else if($Bandeira=='107'){
			$band='ELO';
		}else if($Bandeira=='108'){
			$band='PLENOCARD';
		}else if($Bandeira=='109'){
			$band='PERSONALCARD';
		}else if($Bandeira=='110'){
			$band='JCB';
		}else if($Bandeira=='111'){
			$band='DISCOVER';
		}else if($Bandeira=='112'){
			$band='BRASILCARD';
		}else if($Bandeira=='113'){
			$band='FORTBRASIL';
		}else if($Bandeira=='114'){
			$band='CORDBAN';
		}else if($Bandeira=='115'){
			$band='VALERCARD';
		}else if($Bandeira=='116'){
			$band='CABAL';
		}else if($Bandeira=='117'){
			$band='MAIS';
		}else if($Bandeira=='118'){
			$band='CART.AVISTA';
		}else if($Bandeira=='119'){
			$band='GRANDCARD';
		}else if($Bandeira=='120'){
			$band='SOROCRED';
		}else if($Bandeira=='201'){
			$band='BOL.BRADESCO';
		}else if($Bandeira=='202'){
			$band='BOL.SANTANDER';
		}else if($Bandeira=='301'){
			$band='DEB.BRADESCO';
		}else if($Bandeira=='302'){
			$band='DEB.ITAU';
		}else if($Bandeira=='303'){
			$band='DEB.UNIBANCO';
		}else if($Bandeira=='304'){
			$band='DEB.BANCOBRASIL';
		}else if($Bandeira=='305'){
			$band='DEB.BANCOREAL';
		}else if($Bandeira=='306'){
			$band='DEB.BANRISUL';
		}else if($Bandeira=='307'){
			$band='DEB.HSBC';
		}else if($Bandeira=='401'){
			$band='SALDO.PAGSEGURO';
		}else if($Bandeira=='501'){
			$band='OI.PAGGO';
		}else if($Bandeira=='701'){
			$band='DEP.BANCOBRASIL';
		}else if($Bandeira=='702'){
			$band='DEP.HSBC';
		}
		
		if ($stat=='Paga'){
			$SQLus="select id_conta from tb_extrato where codigo='".$transacaoID."' ";
			$resus = mysqli_query($conn,$SQLus);
			$rsus = mysqli_fetch_array($resus);
			$registrosus =mysqli_num_rows($resus);
			if ($registrosus>0){
				$queryx = "update tbfuncionarios set saldo=saldo+'".$valorcreditado."'  where id='".$rsus['id_conta']."' ";
				if (mysqli_query($conn, $queryx)) {
					echo "Saldo atualizado com sucesso!";
				} else {
					echo "Error: " . $queryx . "<br>" . mysqli_error($conn);
					exit;
				}
			}
			unset($SQLus);
			unset($resus);
			unset($rsus);
			unset($registrosus);		
		}
		

			$query3 = "update tb_extrato set status='".$stat."'  where codigo='".$transacaoID."' ";
			if (mysqli_query($conn, $query3)) {
				echo "Atualizado com sucesso!";
			} else {
				echo "Error: " . $query3 . "<br>" . mysqli_error($conn);
				exit;
			}
		
		//$redirect='http://www.atualizarinformatica.com.br/lulanna/pay/retorno_pagseguro.asp?StatusTransacao='.$stat.'&Referencia='.$Referencia.'&TipoPagamento='.$tppag.'&vlrloja='.$areceber.'&bandeira='.$band.'&TransacaoID='.$transacaoID;
				
	//	header("location:$redirect");
}
?>



