<?php

$hostname="";
$username="";
$password="";
$dbname="";
	
$conn = mysqli_connect($hostname,$username, $password, $dbname);
if (!$conn){
	die("Conexão ao banco de dados falhou: ".mysqli_connect_error());	
}

$SQL="select * from dados ";
$res = mysqli_query($conn,$SQL);
$rs = mysqli_fetch_array($res);
$registros =mysqli_num_rows($res);

if ($registros>0){
	$email=$rs['emaildaempresa'];
	$nomeempresa=$rs['nomedaempresa'];
	$cnpjx=$rs['cnpj'];
	$titulo=$rs['titulo'];
	$telefone=$rs['telefonedaempresa'];
	$celular=$rs['celdaempresa'];
	$site=$rs['site'];
	$endereco=$rs['endereco'];
	$bairro=$rs['bairro'];
	$cidade=$rs['cidade'];
	$uf=$rs['uf'];
	$keyword=$rs['keywords'];
	$descriptions=$rs['descriptions'];
	$msg_cabecalho=$rs['msg_cabecalho'];
	$instagram=$rs['instagram'];
	$facebook=$rs['facebook'];
	$num01=$rs['num01'];
	$num02=$rs['num02'];
	$num03=$rs['num03'];
	
}else{
	echo "<script>alert('O site não pode ser carregado, pois não há informações da empresa!');</script>";
	

}

unset($SQL);
unset ($res);
unset ($rs);

$loja='n';


?>