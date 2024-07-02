<?php

$SQL="select * from dados order by id desc   ";
$res = mysqli_query($conn,$SQL);
$rs = mysqli_fetch_array($res);
$registros =mysqli_num_rows($res);
if ($registros>0){
    ?>
<form action="end_config.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="acao" value="editar">
<input type="hidden" name="id" value="<? echo $rs['id']?>">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Método de Pagamento</h4>
                <p class="card-title-desc">Insira as informaçoes do gateway/split de pagamento</p>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="example-text-input" name="payment_email"  value="<? echo $rs['payment_email']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Senha</label>
                    <div class="col-md-10">
                        <input class="form-control" type="password" id="example-text-input" name="payment_senha"  value="<? echo $rs['payment_senha']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Token</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="example-text-input" name="payment_token"  value="<? echo $rs['payment_token']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Layout</h4>
                <p class="card-title-desc">Configure abaixo a visuação da página de análises</p>
                <div class="mb-3 row">
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="formrow-customCheck" name="layoutx" <? if($rs['layout']=='colorida'){ echo 'checked';} ?> value='colorida'>

                            <label class="form-check-label" for="formRadios1">
                                Colorida
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="formrow-customCheck" name="layoutx" <? if($rs['layout']=='preto'){ echo 'checked';} ?> value='preto'>

                            <label class="form-check-label">
                                Preto e Branco
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Consulta</h4>
                <p class="card-title-desc">Configure aqui as informaçoes de acesso de acordo com a fonte de dados escolhida
                </p>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Serasa</h5>
                        <label for="example-text-input" class="col-md-2 col-form-label">Login</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="example-text-input" name="serasa_login" value="<? echo $rs['serasa_login']?>">
                        </div>
                        <br>
                        <label for="example-text-input" class="col-md-2 col-form-label">Senha</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" id="example-text-input" name="serasa_senha" value="<? echo $rs['serasa_senha']?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Configurações Gerais</h4>
                <p class="card-title-desc">Essa tela é exclusiva para os administradores da plataforma.<br>
                    Nela consta configurações referentes ao funcionamento da mesma. 
                </p>

                
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Fonte dos dados</label>
                    <div class="col-md-10">
                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="formrow-customCheck" name="fonte" <? if($rs['fonte']=='serasa'){ echo 'checked';} ?> value="serasa">
                        <label class="form-check-label" for="formrow-customCheck">Serasa</label>
                        </div>
                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="formrow-customCheck2" name="fonte" <? if($rs['fonte']=='outros'){ echo 'checked';} ?> value="outros">
                        <label class="form-check-label" for="formrow-customCheck2">Outros</label>
                        </div>
                    </div>
                    
                </div>

                
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Valor por consulta</label>
                    <div class="col-md-2">
                        <input class="form-control input-mask" type="text" name="vlr_consulta" id="example-text-input" value="<? echo $rs['vlr_consulta']?>" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'" im-insert="true" >
                    </div>
                </div>

                <? if( $rs['contrato']!=''){?>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Contrato atual</label>
                    <div class="col-md-10">
                        <a href="docs/<?echo $rs['contrato']?>" target="_blank"><i class="fas fa-file fa-2x"></i></a>
                    </div>
                </div>
                <? }?>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Contrato</label>
                    <div class="col-md-10">
                        <input class="form-control" type="file" name="arquivo" multiple id="example-text-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Salvar</button>
                </div>
 
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
</form>
<?
}
unset($SQL);
unset($registros);
unset($res);
unset($rs);
?>