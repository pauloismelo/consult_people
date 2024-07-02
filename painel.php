<!doctype html>
<html lang="pt-BR">

    <?php include('head.php'); ?>

    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <?php include('header.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('sidebar.php'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                      <? if ($_GET['go']=='usuario_adc'){
                        include('usuarios_adc.php');
                      }elseif($_GET['go']=='usuario_edit'){
                        include('usuarios_edit.php');
                      }elseif($_GET['go']=='usuario_list'){
                        include('usuarios_list.php');
					            }elseif($_GET['go']=='extrato'){
                        include('extrato.php');
					            }elseif($_GET['go']=='credito'){
                        include('credito.php');
                      }elseif($_GET['go']=='view'){
                        include('view.php');	
                      }elseif($_GET['go']=='analise'){
                        include('analise.php');	
                      }elseif($_GET['go']=='perfil'){
                        include('perfil.php');	
                      }elseif($_GET['go']=='config'){
                        include('config.php');	

                      }?>

                      <script>
                        function EscolheTipo(x){
                          if (x=='PF'){
                              document.getElementById('btn_PF').setAttribute("class","btn btn-primary waves-effect waves-light");
                              document.getElementById('btn_PF').innerHTML='Pessoa Física <i class="uil uil-check ms-2"></i>';

                              document.getElementById('btn_PJ').setAttribute("class","btn btn-light waves-effect waves-light");
                              document.getElementById('btn_PJ').innerHTML='Pessoa Jurídica';

                              document.getElementById('tipo').value='PF';

                              //Campo documento
                              document.getElementById('campo_PJ').style.display='none';
                              document.getElementById('campo_PF').style.display='block';

                              /*
                              document.getElementById('campo_PJ').removeAttribute("required");
                              document.getElementById('campo_PF').setAttribute("required","required");
                              */                              
                          
                          }else if (x=='PJ'){
                            
                            //botoes
                            document.getElementById('btn_PJ').setAttribute("class","btn btn-primary waves-effect waves-light");
                            document.getElementById('btn_PJ').innerHTML='Pessoa Jurídica <i class="uil uil-check ms-2"></i>';

                            document.getElementById('btn_PF').setAttribute("class","btn btn-light waves-effect waves-light");
                            document.getElementById('btn_PF').innerHTML='Pessoa Física';

                            document.getElementById('tipo').value='PJ';

                            //Campo documento
                            document.getElementById('campo_PF').style.display='none';
                            document.getElementById('campo_PJ').style.display='block';

                            /*
                            document.getElementById('campo_PF').removeAttribute("required");
                            document.getElementById('campo_PJ').setAttribute("required","required");
                            */


                          } 

                        }

                        function Envia(x){
                          
                          if (x=='PF'){
                            if (document.getElementById('campo_PF').value==''){
                              alert('Informe o CPF!');
                              document.getElementById('campo_PF').focus();
                            }else{
                              document.getElementById('rodape').innerHTML='<img src="assets/images/loading.gif" alt="">';
                              document.getElementById('formX').submit();
                            }
                          }else if (x=='PJ'){
                            if (document.getElementById('campo_PJ').value==''){
                              alert('Informe o CNPJ!');
                              document.getElementById('campo_PJ').focus();
                            }else{
                              document.getElementById('rodape').innerHTML='<img src="assets/images/loading.gif" alt="">';
                              document.getElementById('formX').submit();
                            }
                          }

                        }
                      </script>
                      <!-- modal nova análise -->
                      <form action="conexao.php" method="post" id="formX">
                      <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Nova Análise</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                  <h5 class="font-size-16">Tipo de Análise</h5>
                                    <div class="row">
                                      <div class="col-6">
                                        <button type="button" id="btn_PF" onclick="EscolheTipo('PF');" class="btn btn-primary waves-effect waves-light">
                                            Pessoa Física <i class="uil uil-check ms-2"></i> 
                                        </button>
                                      </div>
                                      <div class="col-6">
                                        <button type="button"  id="btn_PJ" onclick="EscolheTipo('PJ');" class="btn btn-light waves-effect waves-light">
                                            Pessoa Jurídica 
                                        </button>
                                      </div>
                                    </div>
                                  </h5>  
                                  <input type="hidden" name="tipo" id="tipo" value="PF">
                                  
                                    
                                  <h5 class="font-size-16 mt-4">Documento</h5>
                                  <p>
                                    <input id="campo_PF" type="text" class="form-control input-mask" name="campo_PF" data-inputmask="'mask': '999.999.999-99'" required>

                                    <input id="campo_PJ" style="display:none;" type="text" class="form-control input-mask" name="campo_PJ" data-inputmask="'mask': '99.999.999/9999-99'">
                                  </p>
                                </div>
                                <div class="modal-footer" id="rodape">
                                  
                                  <button type="button" onclick="Envia(document.getElementById('tipo').value);" class="btn btn-primary waves-effect waves-light">
                                      Consultar <i class="uil uil-arrow-right ms-2"></i> 
                                  </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    </form>
                    <!-- /. modal nova análise -->

                    <!-- /////////////////////////////////////// -->
                    <!-- modal compra de creditos -->
                    
                      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-success" id="myModalLabel">Seu saldo é <strong>R$ <? echo number_format($saldox, 2, ',', '');?></strong></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                <? include('checkout_index.php')?>
                                </div>
                                
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <!-- /. modal compra de creditos -->




                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <? include('footer.php');?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right Sidebar -->
        <?php include('right_sidebar.php') ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets\libs\jquery\jquery.min.js"></script>
        <script src="assets\libs\bootstrap\js\bootstrap.bundle.min.js"></script>
        <script src="assets\libs\metismenu\metisMenu.min.js"></script>
        <script src="assets\libs\simplebar\simplebar.min.js"></script>
        <script src="assets\libs\node-waves\waves.min.js"></script>
        <script src="assets\libs\waypoints\lib\jquery.waypoints.min.js"></script>
        <script src="assets\libs\jquery.counterup\jquery.counterup.min.js"></script>

        <!-- apexcharts -->
        <script src="assets\libs\apexcharts\apexcharts.min.js"></script>

        <script src="assets\js\pages\dashboard.init.js"></script>

        <script src="assets\libs\inputmask\min\jquery.inputmask.bundle.min.js"></script>
        <script src="assets\js\pages\form-mask.init.js"></script>

        <!-- App js -->
        <script src="assets\js\app.js"></script>





    </body>

</html>
