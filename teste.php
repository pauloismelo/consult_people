<?php include('db.php'); 

               
$SQL="select * from tb_analises where id=".$_GET['id']."  ";
$res = mysqli_query($conn,$SQL);
$rs = mysqli_fetch_array($res);
$registros=mysqli_num_rows($res);
    if ($registros>0){

        //print_r('<pre>');
        //print_r( $rs['retorno_serasa']);
        print_r (explode("{",$rs['retorno_serasa']));
        //print_r('</pre>');
        
        $retorno2=explode("{",$rs['retorno_serasa']);
        $retorno=json_decode($rs['retorno_serasa'], false);
        echo '<br><br>';
        echo $retorno2[28].'<br>';
        
        $anotacoesNegativas=explode(",",$retorno2[28]);
        echo $anotacoesNegativas[38];

    

    }
?>          