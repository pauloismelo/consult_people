<?php
$SQL="select * from tb_analises where id=".$_POST['id']."  ";
$res = mysqli_query($conn,$SQL);
$rs = mysqli_fetch_array($res);
$registros =mysqli_num_rows($res);
if ($registros>0){
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Visualizar Análise</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Análises</a></li>
                    <li class="breadcrumb-item active"><? echo $rs['nome']?></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<?
if ($rs['tipo']=='PF'){
    if($layout=='preto'){
        include('view_pf2.php');
    }else{
        include('view_pf3.php');
    }
    
}elseif ($rs['tipo']=='PJ'){

}
}
unset($SQL);
unset($res);
unset($rs);
unset($registros);
?>