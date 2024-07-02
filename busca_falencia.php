<?php

$link='http://bancofalencia.tst.jus.br/';

$ch = curl_init($link);
curl_setopt($ch, CURLOPT_REFERER, $link);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$retorno = curl_exec($ch);

echo $retorno;

curl_close($ch);

?>