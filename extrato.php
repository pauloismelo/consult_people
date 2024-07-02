<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title float-begin">Extrato</h4>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Comprar créditos</button>
                
                <p class="card-title-desc"> </p>

                <table class="table mb-0 mt-4" >
                    <thead class="table-light">
                    <tr>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Usuario</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $SQLus="select * from tb_extrato where id_conta=".$idx." order by id desc   ";
                    $resus = mysqli_query($conn,$SQLus);
                    //$rsus = mysqli_fetch_array($resus);
                    $registrosus =mysqli_num_rows($resus);
                    if ($registrosus==0){
                     ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum registro encontrado!</td>
                    </tr>
                    <?}else{
                      while($rsus = mysqli_fetch_array($resus)){?>
                        <tr>
                            <td>
                                <?php
                                $date=date_create($rsus['datareg']);
                                echo date_format($date,"d/m/Y H:i"); 
                                ?>
                            </td>
                            <td><?php echo $rsus['status']; ?></td>
                            <td><?php echo $rsus['descricao']; ?></td>
                            <td><?php echo number_format($rsus['valor'], 2, ',', ''); ?></td>
                            <td><?php echo $rsus['userreg']; ?></td>
                        </tr>
                    <?}
                  }?>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
