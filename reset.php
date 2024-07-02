<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Recuperar senha | Loc Pop Consultas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema de Consultas Loc Pop Brasil" name="description">
        <meta content="Atualizar Tecnologia" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets\css\bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets\css\app.min.css" id="app-style" rel="stylesheet" type="text/css">

    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="../assets/images/logo-dark.png"alt="" height="122" class="logo logo-dark">
                                <img src="../assets/images/logo-light.png" alt="" height="122" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-12 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Recupere a sua senha</h5>
                                    <p class="text-muted">Preencha os campos abaixo para receber sua nova senha</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="end_reset.php" method="post">

                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email do usuário</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>

                                        <div class="form-check">
                                            &nbsp;
                                        </div>

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Enviar</button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            &nbsp;
                                        </div>
                                        <div class="mt-4 text-center">
                                            &nbsp;
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-12 mt-5 text-center">
                    	<p>© <script>document.write(new Date().getFullYear())</script> Loc Consultas. Desenvolvido por <i class="mdi mdi-heart text-danger"></i> <a href="https://atualizarinformatica.com.br" target="_blank">Atualizar Tecnologia</a></p>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets\libs\jquery\jquery.min.js"></script>
        <script src="assets\libs\bootstrap\js\bootstrap.bundle.min.js"></script>
        <script src="assets\libs\metismenu\metisMenu.min.js"></script>
        <script src="assets\libs\simplebar\simplebar.min.js"></script>
        <script src="assets\libs\node-waves\waves.min.js"></script>
        <script src="assets\libs\waypoints\lib\jquery.waypoints.min.js"></script>
        <script src="assets\libs\jquery.counterup\jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="assets\js\app.js"></script>

        <script>
		function Mascara(tipo, campo, teclaPress) {
			if (window.event)
			{
				var tecla = teclaPress.keyCode;
			} else {
				tecla = teclaPress.which;
			}

			var s = new String(campo.value);
			// Remove todos os caracteres à seguir: ( ) / - . e espaço, para tratar a string denovo.
			s = s.replace(/(\.|\(|\)|\/|\-| )+/g,'');

			tam = s.length + 1;

			if ( tecla != 9 && tecla != 8 ) {
				switch (tipo)
				{
				case 'CPF' :
					if (tam > 3 && tam < 7)
						campo.value = s.substr(0,3) + '.' + s.substr(3, tam);
					if (tam >= 7 && tam < 10)
						campo.value = s.substr(0,3) + '.' + s.substr(3,3) + '.' + s.substr(6,tam-6);
					if (tam >= 10 && tam < 12)
						campo.value = s.substr(0,3) + '.' + s.substr(3,3) + '.' + s.substr(6,3) + '-' + s.substr(9,tam-9);
				break;

				case 'CNPJ' :

					if (tam > 2 && tam < 6)
						campo.value = s.substr(0,2) + '.' + s.substr(2, tam);
					if (tam >= 6 && tam < 9)
						campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,tam-5);
					if (tam >= 9 && tam < 13)
						campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,3) + '/' + s.substr(8,tam-8);
					if (tam >= 13 && tam < 15)
						campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,3) + '/' + s.substr(8,4)+ '-' + s.substr(12,tam-12);
				break;

				case 'TEL' :
					if (tam > 2 && tam < 4)
						campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,tam);
					if (tam >= 7 && tam < 11)
						campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,4) + '-' + s.substr(6,tam-6);
				break;


				case 'DATA' :
					if (tam > 2 && tam < 4)
						campo.value = s.substr(0,2) + '/' + s.substr(2, tam);
					if (tam > 4 && tam < 11)
						campo.value = s.substr(0,2) + '/' + s.substr(2,2) + '/' + s.substr(4,tam-4);
				break;

				case 'CEP' :
					if (tam > 5 && tam < 7)
						campo.value = s.substr(0,5) + '-' + s.substr(5, tam);

				break;
				}
			}
		}
		</script>

    </body>
</html>
