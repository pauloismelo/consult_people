<?php
include ('db.php');

		$SQLus="select * from tbfuncionarios where email='".$_POST['email']."'  ";
		$resus = mysqli_query($conn,$SQLus);
		$rsus = mysqli_fetch_array($resus);
		$registrosus =mysqli_num_rows($resus);
		if ($registrosus>0){
			//================ENCONTROU============
			$query = "update tbfuncionarios set senha='COL1597POP753' where id=".$rsus['id']." ";

			if (mysqli_query($conn, $query)) {
				//==========================================================
					$body="<body bgcolor='#FFFFFF'><center><table width='700' border=0 cellpadding=0 cellspacing=0><tr><td align='center' style='color:#fff; font-size:18px; background-color:#333333'><b>RECUPERA&Ccedil;&Atilde;O DE SENHA - LOC POP CONSULTAS</b></td></tr><tr><td><br>Prezado(a) <strong>".$rsus['NOME']."</strong>,<br> voc&ecirc; solicitou a recupera&ccedil;&atilde;o de senha no sistema da Loc Pop Consultas.<br>Segue abaixo a senha padrão que dever&aacute; ser alterada no seu primeiro acesso.<br><br>Senha: <strong>COL1597POP753</strong><br><br></td></tr><tr><td valign=top>&nbsp;</td></tr></table></center></body>";
					
				///////////////ENVIAR EMAIL/////////////
					//carrengando a biblioteca phpmailer
					 require("class.phpmailer.php");
					 //pegando os dados do formulário
					 $nome = "LOC POP CONSULTAS";
					 $email = "loc@atualizarinformatica.com.br";
					 $assunto = "RECUPERAÇÃO DE SENHA";
					 //fazemos a chamada a classe phpmailer
					 $mail = new PHPMailer();
					 //chamada par envio de email via smtp
					 $mail->Mailer = "smtp";
					 //habilita o envio de email HTML
					 $mail->IsHTML(true);
					 //Remetente do e-mail
					 $mail->From = $email;
					 //nome do remetente do email
					 $mail->FromName = $nome;
					 //endereco de destino do email
					 $mail->AddAddress($rsus['email']); //O destino do email | senha do email: p8&97xA7y
					 //assunto do email
					 $mail->Subject = $assunto;
					 //texto da mensagem
					 $mail->Body = $body;
					 //você poderá concatenar o texto para enviar mais de um assunto
					 //$mail->Body .= "mais de um assunto";
					 //coloque aqui o seu servidor de saída de emails (SMTP)
					 $mail->Host = "localhost";
					 //habilita a autenticação smtp
					 $mail->SMTPAuth = "true"; // Habilitar a autenticação email
					 //usuário SMTP
					 $mail->Username = "loc@atualizarinformatica.com.br";
					 //senha do usuário SMTP
					 $mail->Password = "eE8il70@9";
					 //verifica se está tudo ok e envia a mensagem
					 if(!$mail->Send()){
						echo "Ocorreu erros ao enviar o e-mail. Informe o login e senha manualmente ao usuario.";
						exit; //sai do script sem executar o codigo
					 }else{
					 	echo "<script>alert('A senha foi enviada para o email cadastrado em nosso sistema!');</script>";
						echo "<script>window.location='/index.php';</script>";

					 }

				//==========================================================
			} else {
				echo "Erro ao validar: " . $query . "<br>" . mysqli_error($conn);
				exit;
			}
			//=====================================

		}else{
			echo "<script>alert('Usuario não encontrado com o email digitado!');</script>";
			echo "<script>window.location='reset.php';</script>";
		}
		unset($SQLus);
		unset($resus);
		unset($rsus);
		unset($registrosus);



?>
