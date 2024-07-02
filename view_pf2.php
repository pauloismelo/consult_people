<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                <i class="fas fa-user-check fa-2x"></i> <strong style="margin-left:10px">Informações Pessoais</strong> 
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted">
                                <p class="mb-0">
                                    <div class="row mt-4">
                                        <div class="col-4">
                                            <strong>CPF: </strong><? echo $rs['documento']?>
                                        </div>
                                        <div class="col-4">
                                            <strong>Nome: </strong><? echo $rs['nome']?>
                                        </div>
                                        <div class="col-4">
                                            <strong>Situação Cadastral: <? echo $rs['situacaocadastral']?> </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <strong>Data de Nascimento: 
                                                <? $datanascimento=date_create($rs['datanascimento']);
                                                echo date_format($datanascimento,"d/m/Y");?></strong>
                                        </div>
                                        <div class="col-4">
                                            <strong>Gênero: 
                                                <? if ($rs['genero']=='M'){
                                                    echo 'Masculino';
                                                }else{
                                                    echo 'Feminino';
                                                }?>
                                            </strong>
                                        </div>
                                        <div class="col-4">
                                            <strong>Nome da mãe: <? echo $rs['nomeMae']?></strong>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"><i class="fas fa-users"></i> Relacionamentos</h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <p class="card-text">Nenhum registro encontrado!</p>
                                                </div><!-- end card-body -->
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"><i class="fas fa-phone-alt"></i> Histórico de telefones</h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <p class="card-text">Nenhum registro encontrado!</p>
                                                </div><!-- end card-body -->
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <i class="fas fa-dollar-sign fa-2x"></i> <strong style="margin-left:10px">Restrições Financeiras</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted">
                                <p class="mb-0">
                                
                                    <div class="row mt-4">
                                        <div class="card bg-danger border-danger text-white-50">
                                            <div class="card-header bg-transparent border-danger">
                                                <h5 class="my-0 text-white"> Score<br>
                                                    
                                            </h5>
                                            </div><!-- end card-header -->
                                            <div class="card-body">
                                                <h3 class="text-white"><? echo $rs['score']?></h3>
                                                <p class="">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <? echo $rs['score']?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </p>
                                                <p class="card-text"><? echo $rs['mensagemscore']?></p>
                                            </div><!-- end card-body -->
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"> Estimativa de Renda mensal<br>   
                                                </h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <h5 class="card-title"><strong><? echo $rs['faixarendaestimada']?></strong></h5>
                                                    <p class="card-text"><? echo $rs['mensagemrendaestimada']?></p>
                                                </div><!-- end card-body -->
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"> Estimativa de patrimônio<br>
                                                        
                                                </h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <h5 class="card-title"><strong></strong></h5>
                                                    <p class="card-text"></p>
                                                </div><!-- end card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"> Dívidas Vencidas<br>   
                                                </h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <h5 class="card-title">R$ <? echo $rs['vlr_dividasvencidas']?></h5>
                                                    <p class="card-text"><? echo $rs['qtd_dividasvencidas']?> registros encontrados</p>
                                                </div><!-- end card-body -->
                                                <?
                                                $SQLdi="select * from tb_analises_dividasvencidas where id_analise=".$_POST['id']."  ";
                                                $resdi = mysqli_query($conn,$SQLdi);
                                                //$rsdi = mysqli_fetch_array($resdi);
                                                $registrosdi =mysqli_num_rows($resdi);
                                                if ($registrosdi>0){
                                                ?>
                                                <div class="card-footer">
                                                    <? while($rsdi = mysqli_fetch_array($resdi)){?>
                                                        <div class="row">
                                                            <div class="col-4"><strong>Data: </strong><? echo $rsdi['data']?> </div>
                                                            <div class="col-4"><strong>Modalidade: </strong><? echo $rsdi['modalidade']?> </div>
                                                            <div class="col-4"><strong>Valor: </strong>R$ <? echo $rsdi['valor']?> </div>
                                                        </div>
                                                    <?
                                                    }?>

                                                </div>
                                                <?
                                                }
                                                unset($SQLdi);
                                                unset($resdi);
                                                unset($rsdi);
                                                unset($registrosdi);?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"> Protestos<br>   
                                                </h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <h5 class="card-title">R$ <? echo $rs['vlr_protestos']?></h5>
                                                    <p class="card-text"><? echo $rs['qtd_protestos']?> registros encontrados</p>
                                                </div><!-- end card-body -->
                                                <?
                                                $SQLdi="select * from tb_analises_protestos where id_analise=".$_POST['id']."  ";
                                                $resdi = mysqli_query($conn,$SQLdi);
                                                //$rsdi = mysqli_fetch_array($resdi);
                                                $registrosdi =mysqli_num_rows($resdi);
                                                if ($registrosdi>0){
                                                ?>
                                                <div class="card-footer">
                                                    <? while($rsdi = mysqli_fetch_array($resdi)){?>
                                                        <div class="row">
                                                            <div class="col-4"><strong>Data: </strong><br>
                                                                <? $date=date_create($rsdi['data']);
                                                                echo date_format($date,"d/m/Y")?>
                                                            </div>
                                                            <div class="col-4"><strong>Cidade: </strong><br>
                                                                <? if ($rsdi['cidade']=='BHE'){
                                                                    echo 'Belo Horizonte';
                                                                }else{
                                                                    echo $rsdi['cidade'];
                                                                }?>
                                                            </div>
                                                            <div class="col-4"><strong>Valor: </strong><br>
                                                            R$ <? echo number_format($rsdi['valor'],2,',','.') ?> </div>
                                                        </div>
                                                    <?
                                                    }?>

                                                </div>
                                                <?
                                                }
                                                unset($SQLdi);
                                                unset($resdi);
                                                unset($rsdi);
                                                unset($registrosdi);?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"> Cheques Sem fundos<br>
                                                        
                                                </h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        R$ <? echo $rs['vlr_chequesSemfundos']?></h5>
                                                    <p class="card-text"><? echo $rs['qtd_chequesSemfundos']?> registros encontrados</p>
                                                </div><!-- end card-body -->
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="card border border-light">
                                                <div class="card-header bg-transparent border-light">
                                                    <h5 class="my-0 text-secondary"> Cheques Sustados<br>
                                                        
                                                </h5>
                                                </div><!-- end card-header -->
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        R$ <? echo $rs['vlr_chequesSustados']?></h5>
                                                    <p class="card-text"><? echo $rs['qtd_chequesSustados']?> registros encontrados</p>
                                                </div><!-- end card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <i class="fas fa-balance-scale fa-2x"></i>  <strong style="margin-left:10px">Antecedentes Judiciais</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted">
                                <?
                                $SQLdi="select * from tb_analises_acoesjudiciais where id_analise=".$_POST['id']."  ";
                                $resdi = mysqli_query($conn,$SQLdi);
                                //$rsdi = mysqli_fetch_array($resdi);
                                $registrosdi =mysqli_num_rows($resdi);
                                if ($registrosdi>0){
                                while($rsdi = mysqli_fetch_array($resdi)){?>
                                    <div class="card border border-light">
                                        <div class="card-header bg-transparent border-light">
                                            <h5 class="my-0 text-dark
                                            "><i class="uil uil-exclamation-octagon me-3"></i>
                                            <? if ($rsdi['cidade']=='BHE'){
                                                echo 'Belo Horizonte';   
                                            }else{
                                                echo $rsdi['cidade'];
                                            }
                                            ?> / <? echo $rsdi['uf'];?>
                                            </h5>
                                        </div><!-- end card-header -->
                                        <div class="card-body">
                                            <h5 class="card-title"><? echo $rsdi['vara']?>ª vara</h5>
                                            <p class="card-text">Natureza: <? echo $rsdi['natureza'];?><br>
                                            Data: <? $date=date_create($rsdi['data']);
                                                    echo date_format($date,"d/m/Y")?>
                                            </p>
                                        </div><!-- end card-body -->
                                    </div>
                                <?}
                                }
                                unset($SQLdi);
                                unset($resdi);
                                unset($registrosdi);?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <i class="fas fa-briefcase fa-2x"></i>  <strong style="margin-left:10px">Histórico Profissional</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted text-center">Nenhum registro encontrado!
                            </div>
                        </div>
                        
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                <i class="fas fa-user-shield fa-2x"></i>  <strong style="margin-left:10px">Servidores Públicos</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted text-center">Nenhum registro encontrado!
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                <i class="fas fa-map-marker-alt fa-2x"></i>  <strong style="margin-left:10px">Endereços</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted">

                            <?
                                $SQLdi="select * from tb_analises_endereco where id_analise=".$_POST['id']."  ";
                                $resdi = mysqli_query($conn,$SQLdi);
                                $rsdi = mysqli_fetch_array($resdi);
                                $registrosdi =mysqli_num_rows($resdi);
                                if ($registrosdi>0){
                                ?>
                                    <div class="card border border-light">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <h5>CEP: </h5><? echo $rsdi['cep']?><br>
                                                <h5>Endereco: </h5><? echo $rsdi['endereco']?><br>
                                                <h5>Número: </h5><? echo $rsdi['numero']?><br>
                                                <h5>Complemento: </h5><? echo $rsdi['complemento']?><br>
                                                <h5>Bairro: </h5><? echo $rsdi['bairro']?><br>
                                                <h5>Cidade: </h5><? echo $rsdi['cidade']?><br>
                                                <h5>Estado: </h5><? echo $rsdi['estado']?><br>
                                            </p>
                                        </div><!-- end card-body -->
                                    </div>
                                <?
                                }
                                unset($SQLdi);
                                unset($resdi);
                                unset($registrosdi);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->