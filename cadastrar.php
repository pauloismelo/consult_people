<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Cadastrar | Loc Consultas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
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
                                <img src="assets\images\logo-dark.png" alt="" height="22" class="logo logo-dark">
                                <img src="assets\images\logo-light.png" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Criar Conta</h5>
                                    <p class="text-muted">Faça o seu cadastro agora!.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="end_cadastrar.php" method="post">

                                        <div class="mb-3">
                                            <label class="form-label" for="username">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="username" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" name="email" class="form-control input-mask" data-inputmask="'alias': 'email'" im-insert="true" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="username">CPF</label>
                                            <input type="text" name="documento" class="form-control input-mask"  data-inputmask="'mask': '999.999.999-99'" im-insert="true" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="username">Celular</label>
                                            <input type="text" name="celular" class="form-control input-mask"  data-inputmask="'mask': '(99)99999-9999'" im-insert="true" required>
                                        </div>




                                        <div class="mt-3 text-end">
                                            <button type="submit" class="btn btn-primary w-sm waves-effect waves-light" type="submit">cadastrar</button>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> Minible. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
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

        <script src="assets\libs\inputmask\min\jquery.inputmask.bundle.min.js"></script>
        <script src="assets\js\pages\form-mask.init.js"></script>
        <!-- App js -->
        <script src="assets\js\app.js"></script>

    </body>
</html>
