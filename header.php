<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets\images\logo-sm.png" alt="" height="42">
                    </span>
                    <span class="logo-lg">
                        <img src="assets\images\logo-dark.png" alt="" height="40">
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets\images\logo-sm.png" alt="" height="42">
                    </span>
                    <span class="logo-lg">
                        <img src="assets\images\logo-light.png" alt="" height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

           

            <div class="dropdown d-inline-block language-switch">&nbsp;</div>

            <div class="dropdown d-none d-lg-inline-block ms-1">&nbsp;</div>

            <div class="dropdown d-none d-lg-inline-block ms-1">&nbsp;</div>

            <? include('header_notificacoes.php');?>

            <div class="dropdown d-inline-block">
                <?
                $SQLus="select * from tbfuncionarios where id=".$idx."   ";
                $resus = mysqli_query($conn,$SQLus);
                $rsus = mysqli_fetch_array($resus);
                $registrosus =mysqli_num_rows($resus);
                if ($registrosus>0){
                    if ($rsus['foto']!=''){
                        $caminhofoto ='fotos/'.$rsus['foto'];
                    }else{
                        $caminhofoto ="assets/images/user.png";
                    }
                ?>
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<? echo $caminhofoto?>" >
                    <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><? echo $nomex?></span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <?
                }
                unset($SQLus);
                unset($resus);
                unset($rsus);
                unset($registrosus);?>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="painel.php?go=perfil"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Perfil</span></a>
                    <a class="dropdown-item" href="close.php"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sair</span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">&nbsp;</div>

        </div>
    </div>
</header>
