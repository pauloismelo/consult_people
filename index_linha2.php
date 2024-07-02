<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Últimas Análises</h4>
                <div class="table-responsive">
                    <?php
                    $SQLus="select * from tb_analises order by id desc limit 10   ";
                    $resus = mysqli_query($conn,$SQLus);
                    //$rsus = mysqli_fetch_array($resus);
                    $registrosus =mysqli_num_rows($resus);
                    
                    ?>
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Status</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            if ($registrosus==0){
                            ?>
                            <tr>
                                <td colspan="6" align="center"> Nenhuma análise encontrada!</td>
                            </tr>

                            <?
                            }else{
                                while ($rsus = mysqli_fetch_array($resus)){?>
                            <tr>
                                <td>
                                    <?
                                    $data=date_create($rsus['datareg']);
                                    echo date_format($data,"d/mY");?>
                                </td>
                                <td><? echo $rsus['nome']?></td>
                                <td>
                                    Finalizado
                                </td>
                                
                                <td>
                                    
                                    <form action="painel.php?go=view" method="post">
                                        <input type="hidden" name="id" value="<?php echo $rsus['id']; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            Visualizar
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            <?
                                } 
                            }?>
                            


                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
