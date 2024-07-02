<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Análise de <? echo $rs['nome']?></h4>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                            <span class="d-block "><i class="fas fa-user-check"></i></span>
                            <span class="d-none d-sm-block">Informações Pessoais</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                            <span class="d-block"><i class="fas fa-dollar-sign"></i></span>
                            <span class="d-none d-sm-block">Financeiro</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                            <span class="d-block"><i class="fas fa-balance-scale"></i></span>
                            <span class="d-none d-sm-block">Antecedentes Judiciais</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#historico1" role="tab">
                            <span class="d-block"><i class="uil uil-bag"></i></span>
                            <span class="d-none d-sm-block">Histórico Profissional</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#servidores1" role="tab">
                            <span class="d-block"><i class="fas fa-user-shield"></i></span>
                            <span class="d-none d-sm-block">Servidores Públicos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#enderecos1" role="tab">
                            <span class="d-block"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="d-none d-sm-block">Endereços</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                        <p class="mb-0">
                            <div class="row mt-4">
                                <div class="col-4">
                                    <strong>CPF: </strong><? echo $rs['documento']?>
                                </div>
                                <div class="col-4">
                                    <strong>Nome: </strong><? echo $rs['nome']?>
                                </div>
                                <div class="col-4">
                                    <strong>Status: </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Data de Nascimento: </strong>
                                </div>
                                <div class="col-4">
                                    <strong>Gênero: </strong>
                                </div>
                                <div class="col-4">
                                    <strong>Nacionalidade: </strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="card border border-secondary">
                                    <div class="card-header bg-transparent border-secondary">
                                        <h5 class="my-0 text-secondary"><i class="fas fa-users"></i> Relacionamentos</h5>
                                    </div><!-- end card-header -->
                                    <div class="card-body">
                                        <h5 class="card-title">card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="card border border-secondary">
                                    <div class="card-header bg-transparent border-secondary">
                                        <h5 class="my-0 text-secondary"><i class="fas fa-phone-alt"></i> Histórico de telefones</h5>
                                    </div><!-- end card-header -->
                                    <div class="card-body">
                                        <h5 class="card-title">card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="tab-pane" id="profile1" role="tabpanel">
                        <p class="mb-0">
                            
                            <div class="row mt-4">
                                <div class="card border border-danger">
                                    <div class="card-header bg-transparent border-danger">
                                        <h5 class="my-0 text-danger"> Score<br>
                                            
                                    </h5>
                                    </div><!-- end card-header -->
                                    <div class="card-body">
                                        <h3 class="text-danger"><? echo $rs['score']?></h3>
                                        <p class="">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: <? echo $rs['score']?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </p>
                                        <p class="card-text"><? echo $rs['mensagemscore']?></p>
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="card border border-secondary">
                                        <div class="card-header bg-transparent border-secondary">
                                            <h5 class="my-0 text-secondary"> Estimativa de Renda mensal<br>   
                                        </h5>
                                        </div><!-- end card-header -->
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><? echo $rs['rendaestimada']?></strong></h5>
                                            <p class="card-text"><? echo $rs['msg_rendaestimada']?></p>
                                        </div><!-- end card-body -->
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card border border-secondary">
                                        <div class="card-header bg-transparent border-secondary">
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
                                <div class="col-4">
                                    <div class="card border border-secondary">
                                        <div class="card-header bg-transparent border-secondary">
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
                                <div class="col-4">
                                    <div class="card border border-secondary">
                                        <div class="card-header bg-transparent border-secondary">
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
                                <div class="col-4">
                                    <div class="card border border-secondary">
                                        <div class="card-header bg-transparent border-secondary">
                                            <h5 class="my-0 text-secondary"> Cheques Devolvidos<br>
                                                
                                        </h5>
                                        </div><!-- end card-header -->
                                        <div class="card-body">
                                            <h5 class="card-title">R$ <? echo $rs['vlr_chequesDevolvidos']?></h5>
                                            <p class="card-text"><? echo $rs['qtd_chequesDevolvidos']?> registros encontrados</p>
                                        </div><!-- end card-body -->
                                    </div>
                                </div>
                            </div>
                            
                        </p>
                    </div>
                    
                    <div class="tab-pane" id="settings1" role="tabpanel">
                        <p class="mb-0">
                            <div class="row mt-4">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><i class="fas fa-balance-scale"></i> Antecedentes Judiciais</h5>
                                        <p class="card-text text-primary"> <? echo $rs['qtd_acoesjudiciais']?> registros encontrados</p>
                                    </div><!-- end card-header -->
                                    <div class="card-body">
                                        <!-- Lista de Processos-->
                                        <?
                                        $SQLac="select * from tb_analises_acoesjudiciais where id_analise=".$_POST['id']."  ";
                                        $resac = mysqli_query($conn,$SQLac);
                                        //$rsac = mysqli_fetch_array($resac);
                                        $registrosac =mysqli_num_rows($resac);
                                        if ($registrosac>0){
                                        while($rsac = mysqli_fetch_array($resac)){?>
                                        <div class="card border border-secondary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <h4>
                                                    <strong><? echo $rsac['natureza'];?></strong>
                                                    </h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Valor: </strong></div>
                                                    <div class="col-6"><? echo $rsac['valor'];?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Data:</strong> </div>
                                                    <div class="col-6">
                                                        <? $date=date_create($rsac['data']);
                                                         echo date_format($date,"d/m/Y")?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Vara: </strong></div>
                                                    <div class="col-6"><? echo $rsac['vara'];?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Cidade: </strong></div>
                                                    <div class="col-6">
                                                        <? if ($rsac['cidade']=='BHE'){
                                                            echo 'Belo Horizonte';
                                                        }else{
                                                            echo $rsac['cidade'];
                                                        }?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>UF:</strong> </div>
                                                    <div class="col-6"><? echo $rsac['uf'];?></div>
                                                </div>
                                                
                                            </div><!-- end card-body -->
                                        </div>
                                        <?
                                        }
                                        }
                                        unset($SQLac);
                                        unset($resac);
                                        unset($registrosac);
                                        unset($rsac);?>
                                        
                                        <!-- Fim lista de processos-->
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="tab-pane" id="historico1" role="tabpanel">
                        <p class="mb-0">
                            <div class="row mt-4">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><i class="uil uil-bag"></i> Histórico Profissional</h5>
                                        <p class="card-text text-primary">4 registros encontrados</p>
                                    </div><!-- end card-header -->
                                    <div class="card-body">
                                        <!-- Lista de Processos-->
                                        <div class="card border border-secondary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>
                                                        <strong>Atualizar Informática Ltda</strong>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>CNPJ: </strong></div>
                                                    <div class="col-6">34.160.812/0001-67</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Setor:</strong> </div>
                                                    <div class="col-6">Privado - 6462000 - HOLDINGS DE INSTITUICOES NAO FINANCEIRAS</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Vínculo </strong></div>
                                                    <div class="col-6">Empreendedor/PRoprietário</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Data de Admissão </strong></div>
                                                    <div class="col-6">01/10/2019</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Data da Demissão:</strong> </div>
                                                    <div class="col-6">Não encontrado</div>
                                                </div>
                                            </div><!-- end card-body -->
                                        </div>
                                        <!-- -->
                                        <div class="card border border-secondary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>
                                                        <strong>Atualizar Informática Ltda</strong>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>CNPJ: </strong></div>
                                                    <div class="col-6">34.160.812/0001-67</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Setor:</strong> </div>
                                                    <div class="col-6">Privado - 6462000 - HOLDINGS DE INSTITUICOES NAO FINANCEIRAS</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Vínculo </strong></div>
                                                    <div class="col-6">Empreendedor/PRoprietário</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Data de Admissão </strong></div>
                                                    <div class="col-6">01/10/2019</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><strong>Data da Demissão:</strong> </div>
                                                    <div class="col-6">Não encontrado</div>
                                                </div>
                                            </div><!-- end card-body -->
                                        </div>
                                        <!-- Fim lista de processos-->
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="tab-pane" id="servidores1" role="tabpanel">
                    <p class="mb-0">
                            
                            <div class="row mt-4">
                                <div class="col-4">
                                    <div class="card border border-secondary">
                                        <div class="card-body">
                                            <p class="card-text">Total de profissões encontradas</p>
                                            <h5 class="card-title">0</h5>   
                                        </div><!-- end card-body -->
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card border border-secondary">
                                        <div class="card-body">
                                            <p class="card-text">Profissões atualmente em exercício</p>
                                            <h5 class="card-title">0</h5>
                                        </div><!-- end card-body -->
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card border border-secondary">
                                        <div class="card-body">
                                            <p class="card-text">Renda Total identificada</p>    
                                            <h5 class="card-title">R$ 0,00</h5> 
                                        </div><!-- end card-body -->
                                    </div>
                                </div>
                            </div>
                            
                        </p>
                    </div>
                    <div class="tab-pane" id="enderecos1" role="tabpanel">
                        <p class="mb-0">
                            <div class="row mt-4">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><i class="fas fa-map-marker-alt"></i> Endereços</h5>
                                        <p class="card-text text-primary">2 registros encontrados</p>
                                    </div><!-- end card-header -->
                                    <div class="card-body">
                                        <!-- Lista de Processos-->
                                        <div class="card border border-secondary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>
                                                        <strong>Av Olegario Maciel Santo Agostinho - 2146 - MG - Belo Horizonte - 30180-122</strong>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="button" class="btn btn-secondary waves-effect waves-light">Trabalho</button>
                                                    </div>
                                                </div>
                                                
                                            </div><!-- end card-body -->
                                        </div>
                                        <!-- -->
                                        <div class="card border border-secondary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>
                                                        <strong>R Claudio Manoel Savassi - 602 - MG - Belo Horizonte - 30140-105</strong>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="button" class="btn btn-secondary waves-effect waves-light">Trabalho</button>
                                                    </div>
                                                </div>
                                                
                                            </div><!-- end card-body -->
                                        </div>
                                        <!-- Fim lista de processos-->
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                        </p>
                    </div>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row -->