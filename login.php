<!doctype html>
<?php include('db.php'); ?>
<html lang="pt-BR">

    <head>

        <meta charset="utf-8">
        <title>Login | Loc Pop Consultas</title>
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
                            <a href="index.php" class="mb-5 d-block auth-logo">
                                <img src="assets\images\logo-dark.png" alt="" height="42" class="logo logo-dark">
                                <img src="assets\images\logo-light.png" alt="" height="42" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Bem vindo !</h5>
                                    <p class="text-muted">&nbsp;</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="auth.php" method="post">

                                        <div class="mb-3">
                                            <label class="form-label" for="username">Login</label>
                                            <input type="text" name="login" class="form-control" id="username" placeholder="Informe seu email de login">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="reset.php" class="text-muted">Esqueceu sua senha?</a>
                                            </div>
                                            <label class="form-label" for="userpassword">Senha</label>
                                            <input type="password" name="senha" class="form-control" id="userpassword" placeholder="Informe sua Senha">
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
                                            <p class="mb-0">Não tem cadastro ? <a href="cadastrar.php" class="fw-medium text-primary"> Crie agora! </a> </p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> Loc Pop Consultas. </p>
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
