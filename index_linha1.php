<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <?
                $dtini= Date('Y-m-d');
                $total = 0;
                for ($i=0; $i<=11; $i++){
                    
                    //echo $i.'='.date('d/m/Y',strtotime('-'.$i.' month',strtotime( $dtini))).'-';
                    
                    $SQLda="select count(id) as total from tb_analises where id_conta=".$idx." and month(datareg)='".date('m',strtotime('-'.$i.' month',strtotime( $dtini)))."' and year(datareg)='".date('Y',strtotime('-'.$i.' month',strtotime( $dtini)))."' ";
                    //echo $SQLda.'<br>';
                    $resda = mysqli_query($conn,$SQLda);
                    $rsda = mysqli_fetch_array($resda);
                    //$registrosda =mysqli_num_rows($resda);
                    //echo $rsda['total'].'<br>';
                    $total = ($total + intval($rsda['total']));
                    if(isset($dados)){
                        //echo 'cheio';

                        $dados = $dados.','.$rsda['total'];
                        $meses = $meses.',"'.date('m',strtotime('-'.$i.' month',strtotime( $dtini))).'/01/'.date('Y',strtotime('-'.$i.' month',strtotime( $dtini))).'"';
                        
                    }else{
                        //echo 'vazio';
                        
                        $dados = $rsda['total'];
                        $meses = '"'.date('m',strtotime('-'.$i.' month',strtotime( $dtini))).'/01/'.date('Y',strtotime('-'.$i.' month',strtotime( $dtini))).'"';
                    }
                    unset($rsda);
                    unset($resda);
                    unset($SQLda);
                
                }
                
                
                
                
                //echo 'Dados: '.$dados.'<br>';
                //echo 'Meses: '.$meses.'<br>';
                ?>
                <div class="mt-1">
                    <ul class="list-inline main-chart mb-0">
                        <li class="list-inline-item chart-border-left me-0 border-0">
                            <h3 class="text-primary"><span data-plugin="counterup"><? echo $total?></span><span class="text-muted d-inline-block font-size-15 ms-3">Análises nos últimos 12 meses</span></h3>
                        </li>

                    </ul>
                </div>

                <div class="mt-3">
                    <div id="sales-analytics-chart" data-colors='["--bs-primary", "#dfe2e6", "--bs-warning"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-4">
        
                        
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                </div>
                <?
                $SQLde="select count(id) as total from tb_analises where id_conta=".$idx." ";
                //echo $SQLda.'<br>';
                $resde = mysqli_query($conn,$SQLde);
                $rsde = mysqli_fetch_array($resde);
                $totaldeanalises=$rsde['total'];?>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup"><? echo $totaldeanalises?></span></h4>
                    <p class="text-muted mb-0">Total Análises</p>
                </div>
                <?
                unset($SQLde);
                unset($resde);
                unset($rsde);
                ?>
            </div>
        </div>
                        
        

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Tipos de Análises</h4>

                <?
                $SQLde="select count(id) as total from tb_analises where id_conta=".$idx." and tipo='PF' ";
                //echo $SQLda.'<br>';
                $resde = mysqli_query($conn,$SQLde);
                $rsde = mysqli_fetch_array($resde);
                if($rsde['total']!=0){
                    $porc_pf=(100/$totaldeanalises)*$rsde['total'];
                }else{
                    $porc_pf=0;
                }
                ?>
                <div class="row align-items-center g-0 mt-3">
                    <div class="col-sm-6">
                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> Pessoa Física </p>
                    </div>

                    <div class="col-sm-6">
                        <div class="progress mt-1" style="height: 6px;">
                            <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: <? echo $porc_pf?>%" aria-valuenow="<? echo $porc_pf?>" aria-valuemin="0" aria-valuemax="<? echo $porc_pf?>">
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->
                <?
                unset($SQLde);
                unset($resde);
                unset($rsde);
                
                
                
                $SQLde="select count(id) as total from tb_analises where id_conta=".$idx." and tipo='PJ' ";
                //echo $SQLda.'<br>';
                $resde = mysqli_query($conn,$SQLde);
                $rsde = mysqli_fetch_array($resde);
                
                if($rsde['total']!=0){
                    $porc_pj=(100/$totaldeanalises)*$rsde['total'];
                }else{
                    $porc_pj=0;
                }
                ?>
                

                <div class="row align-items-center g-0 mt-3">
                    <div class="col-sm-6">
                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-info me-2"></i> Pessoa Jurídica </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="progress mt-1" style="height: 6px;">
                            <div class="progress-bar progress-bar bg-info" role="progressbar" style="width: <? echo $porc_pj?>%" aria-valuenow="<? echo $porc_pj?>" aria-valuemin="0" aria-valuemax="<? echo $porc_pj?>">
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->
                <?
                unset($SQLde);
                unset($resde);
                unset($rsde);
                ?>
            </div> <!-- end card-body-->
        </div> <!-- end card-->

        <div class="card bg-secondary">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <p class="text-white font-size-18">Você tem <b><? echo number_format($saldox, 2, ',', '');?></b> em créditos <i class="mdi mdi-arrow-right"></i></p>
                        <div class="mt-4">
                            <a href="painel.php?go=extrato" class="btn btn-primary waves-effect waves-light">Confira seu extrato</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <img src="assets\images\setup-analytics-amico.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->

        
    </div> <!-- end Col -->
</div> <!-- end row-->
