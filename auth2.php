<?php	
include ('db.php');

	$SQL="select * from tbfuncionarios where id=".$_POST['id']."  ";
	$res = mysqli_query($conn,$SQL);
	$rs = mysqli_fetch_array($res);
	$registros =mysqli_num_rows($res);
	//echo $registros.'!!!';
	//exit;
	
	if ($registros>0){
		$query = "update tbfuncionarios set senha='".$_POST['senha']."' where id=".$_POST['id']."  ";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Senha alterada com sucesso!\nEfetue seu login novamente.');</script>";
			echo "<script>window.location='login.php';</script>";
		} else {
			echo "Erro: " . $query . "<br>" . mysqli_error($conn);
			exit;
		}
		
		
		
		
	}else{
		echo "<script>alert('Usuarios nao encontrado!');</script>";
		if ($_POST['tipo']=='Administrador'){
			echo "<script>window.location='logina.php';</script>";
		}else{
			echo "<script>window.location='loging.php';</script>";
		}
	
	}

?>