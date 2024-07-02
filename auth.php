<?php
include ('db.php');



	$SQL="select * from TBFUNCIONARIOS where email='".$_POST['login']."' and senha='".$_POST['senha']."' and status='ATIVO'  ";
	$res = mysqli_query($conn,$SQL);
	$rs = mysqli_fetch_array($res);
	$registros =mysqli_num_rows($res);
	//echo $registros.'!!!';
	//exit;

	if ($registros>0){
		if ($_POST['senha']=='COL1597POP753'){ ?>
			<form action="limparsenha.php" id="FormPass" method="post">
            	<input type="hidden" name="id_imob" value="<? echo $rs['id_imob']?>" />
                <input type="hidden" name="id" value="<? echo $rs['id']?>" />
                <input type="hidden" name="tipo" value="<? echo $rs['tipo']?>" />
            </form>
            <script>
				document.getElementById('FormPass').submit();
			</script>

		<?
        }else{
			session_cache_expire(1);

			// Iniciando uma sessão
			session_start();

			// Guardando dados na sessão
			$_SESSION["nomex"] = $rs['NOME'];
			$_SESSION["idx"] = $rs['id'];
			$_SESSION["departamentox"] = $rs['departamento'];
			$_SESSION["emailx"] = $rs['email'];
			$_SESSION["saldox"] = $rs['saldo'];
			//$_SESSION["tipox"] = $rs['tipo'];

			header('Location: index.php');
		}
	}else{

		echo "<script>alert('Login ou Senha incorreto!');</script>";
		echo "<script>window.location='login.php';</script>";

	}

?>
