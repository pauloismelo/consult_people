<%					sch = "http://schemas.microsoft.com/cdo/configuration/"
					Set cdoConfig = Server.CreateObject("CDO.Configuration")
					'servidor_smtp = "mail.lulanna.com.br" 
					'email_autentica = "noreply@lulanna.com.br" 
					'senha_autentica = "Mail409-"
					servidor_smtp = "mail.atualizarinformatica.com.br" 
					email_autentica = "lulanna@atualizarinformatica.com.br" 
					senha_autentica = "Mail409-"
					cdoConfig.Fields.Item(sch & "sendusing") = 2
					cdoConfig.Fields.Item(sch & "smtpauthenticate") = 1
					cdoConfig.Fields.Item(sch & "smtpserver") = servidor_smtp
					cdoConfig.Fields.Item(sch & "smtpserverport") = 587
					cdoConfig.Fields.Item(sch & "smtpconnectiontimeout") = 30
					cdoConfig.Fields.Item(sch & "sendusername") = email_autentica
					cdoConfig.Fields.Item(sch & "sendpassword") = senha_autentica
					cdoConfig.fields.update
					
					Set myMail=CreateObject("CDO.Message") 
					Set myMail.Configuration = cdoConfig
				     myMail.Subject="Notificação não autorizada - arquivo retorno"
					
					myMail.From="Atualizar Informatica<"&email_autentica&">"
					myMail.To="contato@atualizarinformatica.com.br"
								
						
					myMail.HTMLBody="<table width=100% border=0 cellpadding=4 cellspacing=4 bgcolor=#000000><tr><td bgcolor=#FFFFFF></td></tr><tr>  <td><font color=#FFFFFF size=2 face=Arial><b>Atualizar Informatica Aplicativos Online</b></font></td></tr><tr><td bgcolor=#FFFFFF><FONT FACE=arial SIZE=2><br>Post de Notificação não Autorizado - Nº: "&request("notificationCode")&"</FONT></td></tr></table>"
					
					myMail.Send 
					
					set myMail=nothing 
					Set cdoConfig = Nothing
					%>