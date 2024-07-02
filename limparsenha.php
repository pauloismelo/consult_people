<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Loc Pop Brasil | Gestão de Contratos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Gestão de Contratos" name="description">
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
    
    <script>
		 function ConfereSenha(){
			const senha = document.querySelector('input[name=senha]');
			const senha2 = document.querySelector('input[name=senha2]');
			
			if (senha.value === senha2.value){
				senha2.setCustomValidity('');
			}else{
				senha2.setCustomValidity('As senhas nao coincidem');
			}
		 }
	</script>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="../assets/images/logo-dark.png"alt="" height="82" class="logo logo-dark">
                                <img src="../assets/images/logo-light.png" alt="" height="82" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Esse é o seu primeiro acesso !</h5>
                                    <p class="text-muted text-danger">É necessário que você altere sua senha abaixo</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="auth2.php" method="post">
                                    	<input type="hidden" name="id" value="<? echo $_POST['id']?>">
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Digite a nova senha</label>
                                            <input type="password" class="form-control" name="senha" required onChange="ConfereSenha();">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                &nbsp;
                                            </div>
                                            <label class="form-label" for="userpassword">Repita a nova senha</label>
                                            <input type="password" class="form-control" name="senha2"  required onChange="ConfereSenha();">
                                        </div>

                                        <div class="form-check">
                                            &nbsp;
                                        </div>

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Entrar</button>
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

                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> Loc Pop Brasil. Desenvolvido por <i class="mdi mdi-heart text-danger"></i> <a href="https://atualizarinformatica.com.br" target="_blank">Atualizar Tecnologia</a></p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
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

    </body>
</html>
