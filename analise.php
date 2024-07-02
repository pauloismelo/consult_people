<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Análises</h4>
                <? if ($saldox<$vlr_consulta){?>
                    <div class="alert alert-danger float-end text-right" role="alert">
                    <i class="uil uil-exclamation-octagon me-3"></i> Você não tem saldo suficiente para novas análises!<br>Compre créditos através do menu Extrato
                    </div>
                <?}else{?>
                <h4 class="float-end">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Nova Análise</button>
                </h4>
                <? }?>
                <p class="card-title-desc"></p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>status</th>
                        <th>Visualizar</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $SQLus="select * from tb_analises order by id desc  ";
                    $resus = mysqli_query($conn,$SQLus);
                    //$rsus = mysqli_fetch_array($resus);
                    $registrosus =mysqli_num_rows($resus);
                    if ($registrosus==0){
                     ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma análise encontrado!</td>
                    </tr>
                    <?}else{
                      while($rsus = mysqli_fetch_array($resus)){?>
                        <tr>
                            <td><?php echo $rsus['datareg']; ?></td>
                            <td><?php echo $rsus['nome']; ?></td>
                            <td><? //php echo $rsus['status']; ?></td>
                            <td>
                                <form action="painel.php?go=view" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rsus['id']; ?>">
                                    <button type="submit" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        Visualizar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?}
                  }?>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
