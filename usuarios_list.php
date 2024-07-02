<?php
include ('db.php');
if (isset($_POST['remover'])){
	if($_POST['remover']!=''){
        if($_POST['remover']=='ok'){
            $query = "delete from tbfuncionarios where id=".$_POST['id']." ";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Usuario removido com sucesso!');</script>";
                echo "<script>window.location='painel.php?go=usuario_list';</script>";
            }else{
                echo "Erro ao validar: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Consultar Usuários</h4>
                <p class="card-title-desc"></p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Celular</th>
                        <th>Tipo</th>
                        <th>Data de Registro</th>
                        <? if($departamentox=='DIRETORIA'){?>
                            <th>Edição</th>
                            <th>Remover</th>
                        <? }?>
                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $SQLus="select * from tbfuncionarios   ";
                    $resus = mysqli_query($conn,$SQLus);
                    //$rsus = mysqli_fetch_array($resus);
                    $registrosus =mysqli_num_rows($resus);
                    if ($registrosus==0){
                     ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum usuário encontrado!</td>
                    </tr>
                    <?}else{
                      while($rsus = mysqli_fetch_array($resus)){?>
                        <tr>
                            <td><?php echo $rsus['NOME']; ?></td>
                            <td><?php echo $rsus['email']; ?></td>
                            <td><?php echo $rsus['documento']; ?></td>
                            <td><?php echo $rsus['celular']; ?></td>
                            <td><?php echo $rsus['departamento']; ?></td>
                            <td>
                                <? $date=date_create($rsus['datareg']);
                                 echo date_format($date,"d/m/Y")?>
                            </td>
                            <? if($departamentox=='DIRETORIA'){?>
                                <td class="text-center">
                                    <form action="painel.php?go=usuario_edit" method="post">
                                        <input type="hidden" name="id" value="<?php echo $rsus['id']; ?>"> 
                                        <input type="hidden" name="remover" value="ok"> 
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="painel.php?go=usuario_list" method="post">
                                        <input type="hidden" name="id" value="<?php echo $rsus['id']; ?>"> 
                                        <input type="hidden" name="remover" value="ok"> 
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            <? }?>
                        </tr>
                    <?}
                  }?>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
