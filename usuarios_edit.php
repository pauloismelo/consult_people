<?php
include ('db.php');
if (isset($_POST['editar'])){
	if($_POST['editar']!=''){
        if($_POST['editar']=='ok'){
            $query = "update tbfuncionarios set NOME='".$_POST['nome']."', email='".$_POST['email']."', documento='".$_POST['documento']."', celular='".$_POST['celular']."', departamento='".$_POST['departamento']."'  where id=".$_POST['id']." ";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Usuario editado com sucesso!');</script>";
                echo "<script>window.location='painel.php?go=usuario_list';</script>";
            }else{
                echo "Erro ao validar: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    }
}


$SQLus="select * from tbfuncionarios  where id=".$_POST['id']." ";
$resus = mysqli_query($conn,$SQLus);
$rsus = mysqli_fetch_array($resus);
$registrosus =mysqli_num_rows($resus);
if ($registrosus>0){?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Editar Usuário</h4>
                <p class="card-title-desc">Preencha os camposa abaixo para editar o usuário abaixo</p>

                <form action="painel.php?go=usuario_edit" method="post">
                <input type="hidden" name="id" value="<? echo $rsus['id'];?>">
                <input type="hidden" name="editar" value="ok">
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nome</label>
                    <div class="col-md-10">
                        <input class="form-control" name="nome" value="<? echo $rsus['NOME'];?>" type="text" id="example-text-input" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-search-input" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input class="form-control input-mask" name="email" value="<? echo $rsus['email'];?>" type="email" required data-inputmask="'alias': 'email'" im-insert="true">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-email-input" class="col-md-2 col-form-label">CPF</label>
                    <div class="col-md-10">
                        <input type="text" name="documento" value="<? echo $rsus['documento'];?>" class="form-control input-mask"  data-inputmask="'mask': '999.999.999-99'" im-insert="true" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-url-input" class="col-md-2 col-form-label">Celular</label>
                    <div class="col-md-10">
                        <input type="text" name="celular" value="<? echo $rsus['celular'];?>" id="example-url-input" required class="form-control input-mask"  data-inputmask="'mask': '(99)99999-9999'" im-insert="true">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Tipo de Usuário</label>
                    <div class="col-md-10">
                        <select class="form-select" name="departamento" required>
                            <option value="">Selecione...</option>
                            <option value="CLIENTE" <? if ($rsus['departamento']=='CLIENTE') { echo 'selected';}?>>CLIENTE</option>
                            <option value="DIRETORIA" <? if ($rsus['departamento']=='DIRETORIA') { echo 'selected';}?>>DIRETORIA</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Cadastrar</button>
                    </div>
                </div>
              </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>
<?
}
unset($SQLus);
unset($resus);
unset($rsus);
unset($registrosus);?>