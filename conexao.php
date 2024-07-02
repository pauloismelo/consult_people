
<?php
ini_set('max_execution_time', '300');
/*
===================================== token PAgSeguro
$url='https://api-m.sandbox.paypal.com/v1/oauth2/token';

$ch = curl_init();

curl_setopt_array($ch, [

    CURLOPT_URL => $url,

    CURLOPT_POST => true,

    CURLOPT_HTTPHEADER => [
		'Authorization: Basic '. base64_encode("Aec63KFdHPgighlOH5-amB83jeAtWgPkbJwVOOBGHBit4B3OQ_SXStHtYvfIQcSE0GwscM1gVQPoAJ6E:ECkrauwbHaiYCSVldJ1yckYn7q0pDfiQcm0IDQzkA6Mb5BC1nsnEDpbTww0BZLhcZO9uPfkeiFVLnxrw"),
        'Content-Type: application/x-www-form-urlencoded'
		
    ],
	CURLOPT_POSTFIELDS => "grant_type=client_credentials",
    CURLOPT_RETURNTRANSFER => true,
    
]);
$resultado = json_decode(curl_exec($ch));
echo $resultado.'<br>';

$token=$resultado->accessToken;
//echo $token.'<br>';
curl_close($ch);



exit;
=================================================================
*/
include('verifica.php');

$SQL="select id from tb_analises order by id desc ";
$res = mysqli_query($conn,$SQL);
$rs = mysqli_fetch_array($res);
$registros=mysqli_num_rows($res);
    if ($registros>0){
		$ida=$rs['id']+1;
    }else{
		$ida=0;
	}
unset($SQL);
unset($res);
unset($rs);
unset($registros);




if ($_POST['tipo']=='PF'){
	$doc=str_replace("/","",str_replace("-","",str_replace(".","",$_POST['campo_PF'])));
	$documento=$_POST['campo_PF'];
}else{
	$doc=str_replace("/","",str_replace("-","",str_replace(".","",$_POST['campo_PJ'])));
	$documento=$_POST['campo_PJ'];
}

//$valor=str_replace(".","",str_replace(",","",$_POST['valor_aluguel']));
$valor=1000;

$tipo='p';
if ($tipo=='h'){
	$url='https://uat-api.serasaexperian.com.br/security/iam/v1/user-identities/login?clientId=649f222ceb928d718d6fb891';
	$user='53290860';
	$pass='Tes@1009';
	$url2="https://uat-api.serasaexperian.com.br/credit/recomenda/v1/consumo-externo/pessoa-fisica/propostas";
}else{
	$url='https://api.serasaexperian.com.br/security/iam/v1/user-identities/login?clientId=649f222dec738062068b478a';
	$user='46403444';
	$pass='Ing@2648';
	if ($_POST['tipo']=='PF'){
		$url2="https://api.serasaexperian.com.br/credit/recomenda/v1/consumo-externo/pessoa-fisica/propostas";
	}else{
		$url2="https://api.serasaexperian.com.br/credit/recomenda/v1/consumo-externo/empresa/propostas";
	}
}

// Inicia a autenticação
//=====================================
$ch = curl_init();

curl_setopt_array($ch, [

    CURLOPT_URL => $url,

    CURLOPT_POST => true,

    CURLOPT_HTTPHEADER => [
		'Authorization: Basic '. base64_encode($user.":".$pass),
        'Content-Type: application/json'
    ],

    CURLOPT_RETURNTRANSFER => true,
    
]);
$resultado = json_decode(curl_exec($ch));

$token=$resultado->accessToken;
//echo $token.'<br>';
curl_close($ch);


if ($_POST['tipo']=='PF'){
	// Inicia a consulta PF
	//=====================================
	include('conexao_pf.php');
}else{
	// Inicia a consulta PJ
	//=====================================
	include('conexao_pj.php');
}


//==================Inserir extrato================================
$queryex ="insert into tb_extrato (id_conta, id_consulta, tipo, valor, descricao, arquivo, datareg, userreg) values (".$idx.", ".$ida.", 'D', '5.00', 'Consulta: ".$nome."', '', '".date('Y-m-d H:i:s')."', '".$nomex."')";
//echo '<br>'.$query.'<br>';
if (mysqli_query($conn, $queryex)) {
	
} else {
	echo "Erro: " . $queryex . "<br>" . mysqli_error($conn);
	exit;
}	
//==================================================
$queryco ="update tbfuncionarios set saldo=saldo-5.00 where id=".$idx."";
if (mysqli_query($conn, $queryco)) {
	
} else {
	echo "Erro: " . $queryco . "<br>" . mysqli_error($conn);
	exit;
}	


//==================Inserir no bando de dados================================
$query ="insert into tb_analises (id, id_conta, tipo, nome, razaosocial, situacaocadastral, datanascimento, genero, nomeMae, numproposta, codnivelrisco, limite_recomendado, faixarendaestimada, mensagemrendaestimada, score, mensagemscore, datareg, userreg, documento, vlr_dividasvencidas, qtd_dividasvencidas, vlr_protestos, qtd_protestos, vlr_chequesSemfundos, qtd_chequesSemfundos, qtd_chequesSustados, qtd_acoesjudiciais, vlr_acoesjudiciais, qtd_falencias, retorno_serasa) values (".$ida.", ".$idx.", '".$tipo."', '".$nome."', '".$razaosocial."', '".$situacaocadastral."', '".$datanascimento."', '".$genero."', '".$nomeMae."', '".$numproposta."', '".$codnivelrisco."', '".$limite_recomendado."', '".$faixarendaestimada."', '".$mensagemrendaestimada."', '".$score."', '".$mensagemscore."', '".date('Y-m-d H:i:s')."', '".$nomex."', '".$documento."', '".$vlr_dividasvencidas."', '".$qtd_dividasvencidas."', '".$vlr_protestos."', '".$qtd_protestos."', '".$vlr_chequesSemfundos."', '".$qtd_chequesSemfundos."', '".$qtd_chequesSustados."', '".$qtd_acoesjudiciais."', '".$vlr_acoesjudiciais."', '".$qtd_falencias."', '".strval($server_output)."')";
//echo '<br>'.$query.'<br>';
if (mysqli_query($conn, $query)) {
	echo "<script>alert('Consulta realizada com sucesso!');</script>";
	echo "<script>window.location='painel.php?go=analise';</script>";
} else {
	echo "Erro: " . $query . "<br>" . mysqli_error($conn);
	exit;
}	
//==================================================

?>