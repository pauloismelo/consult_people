<?php
$SQLus="select * from tbfuncionarios where id=".$idx."   ";
$resus = mysqli_query($conn,$SQLus);
$rsus = mysqli_fetch_array($resus);
$registrosus =mysqli_num_rows($resus);
if ($registrosus>0){
?>
<div class="row mb-4">
    <div class="col-xl-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <div class="clearfix"></div>
                    <form action="end_perfil.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<? echo $idx?>">
                        <div>
                            <img src="fotos/<? echo $rsus['foto']?>" alt="" class="avatar-lg rounded-circle img-thumbnail">
                        </div>
                        <h5 class="mt-3 mb-1">Alterar foto
                        </h5>
                        <p class="text-muted">
                        <input class="form-control" type="file" name="arquivo" multiple required id="example-text-input">
                        </p>
                        <p class="text-muted">
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Enviar</button>
                        </p>
                    </form>

                    
                </div>

                <hr class="my-4">

                
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card mb-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                        <i class="uil uil-user-circle font-size-20"></i>
                        <span class="d-none d-sm-block">Dados</span> 
                    </a>
                </li>
                
            </ul>
            <!-- Tab content -->
            <div class="tab-content p-4">
                <div class="tab-pane active" id="about" role="tabpanel">
                    <div>
                        <div>
                            <div class="text-muted">
                                <div class="table-responsive mt-4">
                                    <div>
                                        <p class="mb-1">Nome :</p>
                                        <h5 class="font-size-16"><? echo $rsus['NOME']?></h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Telefone :</p>
                                        <h5 class="font-size-16"><? echo $rsus['telefone']?></h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Celular :</p>
                                        <h5 class="font-size-16"><? echo $rsus['celular']?></h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Email :</p>
                                        <h5 class="font-size-16"><? echo $rsus['email']?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?}
unset($SQLus);
unset($rsus);
unset($registrosus);
?>