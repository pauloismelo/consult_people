<?php
include('db.php');

if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['idx'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: login.php");
	  exit;
}else{
	$nomex=$_SESSION["nomex"];
	$idx=$_SESSION["idx"];
	$departamentox=$_SESSION["departamentox"];
	$emailx=$_SESSION["emailx"];
	$saldox=$_SESSION["saldox"];
	//$tipox=$_SESSION["tipox"];

	$SQL="select * from dados order by id desc  ";
	$res = mysqli_query($conn,$SQL);
	$rs = mysqli_fetch_array($res);
	$registros =mysqli_num_rows($res);
	if ($registros>0){
		$layout=$rs['layout'];
		$fonte=$rs['fonte'];
		$vlr_consulta=$rs['vlr_consulta'];
	}
	unset($SQL);
	unset($res);
	unset($rs);
	unset($registros);

}




?>
