<?php
$authorization = "Authorization: Bearer ".$token;
	
$post2 = json_encode(array('cnpj' => $doc, 'valorOperacao' => $valor, 'politica' => '1', 'codTipoVenda' => '1', 'dataOperacao'=>date('Y-m-d'), 'informacoesAdicionais' => array('anotacoesCompletas'=>'true', 'consultasDetalhadasSerasa'=>'true', 'quadroSocietarioMaisCompleto'=>'true', 'faturamentoEstimado'=>'true', 'historicoPagamentoComercial'=>'true', 'historicoPagamentoFinanceiroBasico'=>'true')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}else
{
    $server_output = curl_exec($ch);	
    //print_r($server_output);
    
    $retorno=json_decode($server_output);
    
    $tipo='PJ';
    $nome = $retorno->data->razaoSocial;
    $numproposta = $retorno->data->numeroProposta;
    $codnivelrisco = $retorno->data->codNivelRisco;
    $limite_recomendado = $retorno->data->valorLimiteRecomendado;
    $faixarendaestimada = $retorno->data->faturamentoEstimado;
    $mensagemrendaestimada = $retorno->data->mensagemFaturamentoEstimado;
    $score = $retorno->data->score->serasaScore;
    $mensagemscore = $retorno->data->mensagemScore;

    $situacaocadastral = $retorno->data->identificacaoCadastral->situacaoCadastral;
    $dnasc=date_create($retorno->data->identificacaoCadastral->dataFundacao);
    $datanascimento = date_format($dnasc,"Y-m-d");
    $genero = '';
    $nomeMae = '';
    $razaosocial = $retorno->data->identificacaoCadastral->razaosocial;


    $quadroSocietario = $retorno->data->quadroSocietarioCompleto;
    foreach ($quadroSocietario as $quad){
        $SQL="select id from tb_analises_quadrosocietario order by id desc   ";
        $res = mysqli_query($conn,$SQL);
        $rs = mysqli_fetch_array($res);
        $registros =mysqli_num_rows($res);
        if ($registros==0){
            $idq=1;
        }else{
            $idq=$rs['id']+1;
        }
        unset($SQL);
        unset($res);
        unset($rs);
        unset($registros);
        
        $date=date_create($quad->entradaSociedade);
        $date2=date_create($quad->inicioMandato);
        $date3=date_create($quad->fimMandato);
    
        $query ="insert into tb_analises_quadrosocietario (id, id_analise, valorCapitalSocial, valorCapitalRealizado, descOrigem, descNacionalidade, junta, descNatureza, nome, documento, tipoDocumento, vinculo, entradaSociedade, capitalVotante, capitalTotal, telefone, fundacao, identidade, estadoCivil, naturalidade, nacionalidade, cargo, inicioMandato, fimMandato) values (".$idq.", ".$ida.", '".$quad->valorCapitalSocial."', '".$quad->valorCapitalRealizado."', '".$quad->descOrigem."', '".$quad->descNacionalidade."', '".$quad->junta."', '".$quad->descNatureza."', '".$quad->nome."', '".$quad->documento."', '".$quad->tipoDocumento."', '".$quad->vinculo."', '".date_format($date,"Y-m-d")."', '".$quad->capitalVotante."', '".$quad->capitalTotal."', '".$quad->telefone."', '".$quad->fundacao."', '".$quad->identidade."', '".$quad->estadoCivil."', '".$quad->naturalidade."', '".$quad->nacionalidade."', '".$quad->cargo."', '".date_format($date2,"Y-m-d")."', '".date_format($date3,"Y-m-d")."')";
        if (mysqli_query($conn, $query)) {
            
            $endereco = $quad->endereco;
            foreach ($endereco as $end){
                $queryend ="insert into tb_analises_quadrosocietario_endereco (id_analise, id_socio, logradouro, bairro, cidade, uf, cep) values ( ".$ida.", ".$idq.", '".$end->logradouro."', '".$anots->bairro."', '".$end->cidade."', '".$end->uf."', '".$end->cep."')";
                if (mysqli_query($conn, $queryend)) {
                    
                } else {
                    echo "Erro: " . $queryend . "<br>" . mysqli_error($conn);
                    exit;
                }
            }
            //=======================================================================
            $anotacoesNegativassocios = $quad->anotacoesNegativas;
            foreach ($anotacoesNegativassocios as $anots){
                $queryanots ="insert into tb_analises_quadrosocietario_anotacoesnegativas (id_analise, id_socio, quantidadeTotalFalencia, valorTotalFalencia, quantidadeTotalChequeSemFundos, valorTotalChequeSemFundos, quantidadeTotalDividaVencida, valorTotalDividaVencida, quantidadeTotalAcao, valorTotalAcao, quantidadeTotalProtesto, valorTotalProtesto) values (".$ida.", ".$idq.", '".$anots->quantidadeTotalFalencia."', '".$anots->valorTotalFalencia."', '".$anots->quantidadeTotalChequeSemFundos."', '".$anots->valorTotalChequeSemFundos."', '".$anots->quantidadeTotalDividaVencida."', '".$anots->valorTotalDividaVencida."', '".$anots->quantidadeTotalAcao."', '".$anots->valorTotalAcao."', '".$anots->quantidadeTotalProtesto."', '".$anots->valorTotalProtesto."')";
                if (mysqli_query($conn, $queryanots)) {
                    
                } else {
                    echo "Erro: " . $queryanots . "<br>" . mysqli_error($conn);
                    exit;
                }
            }

        } else {
            echo "Erro: " . $query . "<br>" . mysqli_error($conn);
            exit;
        }
        
    }
    $anotacoesNegativas = $retorno -> data -> anotacoesNegativas ;
    foreach ( $anotacoesNegativas as $anot ){
	    $vlr_dividasvencidas = $anot -> valorTotalDividaVencida;
        $qtd_dividasvencidas = $anot -> quantidadeTotalDividaVencida;
        
        $dividasvencidas= $anot ->dividasVencidas;
        if ($dividasvencidas!=''){
            foreach($dividasvencidas as $div){
                
                $date=date_create($div->data);
                $query ="insert into tb_analises_dividasvencidas (id_analise, data, modalidade, valor, contrato, origem) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$div->modalidade."', '".$div->valor."', '".$div->contrato."', '".$div->origem."')";
                if (mysqli_query($conn, $query)) {
                    
                } else {
                    echo "Erro: " . $query . "<br>" . mysqli_error($conn);
                    exit;
                }
                	
            }
        }  

        $vlr_protestos= $anot ->valorTotalProtesto;
        $qtd_protestos= $anot ->quantidadeTotalProtesto;
        $protestos= $anot ->protestos;
        foreach($protestos as $prot){
            $date=date_create($prot->dataOcorrencia);
            $query ="insert into tb_analises_protestos (id_analise, data, valor, cartorio, cidade) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$prot->valor."', '".$prot->cartorio."', '".$prot->cidade."')";
            if (mysqli_query($conn, $query)) {
                
            } else {
                echo "Erro: " . $query . "<br>" . mysqli_error($conn);
                exit;
            }	
        }
        
        
    }

    
    
    
    
    $chequesDevolvidos= $retorno -> data -> chequesDevolvidos ;
    foreach($chequesDevolvidos as $che){
        //$vlr_chequesDevolvidos= $che ->valorTotalChequeSemFundos;
        //$qtd_chequesDevolvidos= $che ->quantidadeChequeSemFundos;
        $chequesSemFundos= $che ->chequesSemFundos;
        foreach($chequesSemFundos as $cheq){
            $date=date_create($cheq->dataOcorrencia);
            $queryche ="insert into tb_analises_chequessemfundos (id_analise, banco, agencia, cidade, uf, numcheque, alinea, quantidade, data, valor ) values (".$ida.", '".$cheq->banco."', '".$cheq->agencia."', '".$cheq->cidade."', '".$cheq->uf."', '".$cheq->numCheque."', '".$cheq->alinea."', '".$cheq->quantidade."', '".date_format($date,"Y-m-d")."', '".$cheq->valor."')";
            if (mysqli_query($conn, $queryche)) {
                
            } else {
                echo "Erro: " . $queryche . "<br>" . mysqli_error($conn);
                exit;
            }
        }

        $chequesSustados= $che ->chequesSustados;
        foreach($chequesSustados as $cheqs){
            $queryches ="insert into tb_analises_chequessustados (id_analise, banco, agencia, contacorrente, chequeinicial, chequefinal, motivosustado, informe) values (".$ida.", '".$cheqs->banco."', '".$cheqs->agencia."', '".$cheqs->contaCorrente."', '".$cheqs->chequeInicial."', '".$cheqs->chequeFinal."', '".$cheqs->motivoSustado."', '".$cheqs->informe."')";
            if (mysqli_query($conn, $queryches)) {
                
            } else {
                echo "Erro: " . $queryches . "<br>" . mysqli_error($conn);
                exit;
            }
        }
    }
    

    $anotcompletas= $retorno -> data -> anotacoesCompletas;
    foreach($anotcompletas as $anotcom){
        $qtd_acoesjudiciais= $anotcom -> acao -> quantidadeTotalAcao;
        $vlr_acoesjudiciais= $anotcom -> acao -> valorTotalAcao;
        $acoesjudiciais= $anotcom ->acoesJudiciais;
        foreach($acoesjudiciais as $acoes){
            $date=date_create($acoes->dataOcorrencia);
            $query ="insert into tb_analises_acoesjudiciais (id_analise, data, valor, distribuidor, vara, cidade, uf, principal, tipomoeda, qtdeOcorrencia) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$acoes->valor."', '".$acoes->distribuidor."', '".$acoes->vara."', '".$acoes->cidade."', '".$acoes->uf."', '".$acoes->principal."', '".$acoes->tipoMoeda."', ".$acoes->qtdeOcorrencia.")";
            if (mysqli_query($conn, $query)) {
                
            } else {
                echo "Erro: " . $query . "<br>" . mysqli_error($conn);
                exit;
            }
        } 
        
        $qtd_falencias= $anotcom ->quantidadeTotalFalencia;
        $falencias= $anotcom ->falencias;
        foreach($falencias as $fac){
            $date=date_create($fac->dataOcorrencia);
            $queryfal ="insert into tb_analises_falencias (id_analise, data, tipoocorrencia, totalocorrencia, cnpj, empresa, qualificacao) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$fac->tipoOcorrencia."', '".$fac->totalOcorrencia."', '".$fac->cnpj."', '".$fac->empresa."', '".$fac->qualificacao."')";
            if (mysqli_query($conn, $queryfal)) {
                
            } else {
                echo "Erro: " . $queryfal . "<br>" . mysqli_error($conn);
                exit;
            }
        }
    }
}
curl_close($ch);
?>