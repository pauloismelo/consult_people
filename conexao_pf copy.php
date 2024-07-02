<?php
$authorization = "Authorization: Bearer ".$token;
	
$post2 = json_encode(array('cpf' => $doc, 'valorOperacao' => $valor, 'politica' => '1', 'codTipoVenda' => '1', 'informacoesAdicionais' => array('anotacoesCompletas'=>'true','consultasDetalhadasSerasa'=>'true','participacaoSocietaria'=>'true', 'historicoPagamentoPF'=>'true','rendaEstimada'=>'true')));

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
    
    
    $tipo='PF';
    $nome = $retorno->data->nome;
    $numproposta = $retorno->data->numeroProposta;
    $codnivelrisco = $retorno->data->codNivelRisco;
    $limite_recomendado = $retorno->data->valorLimiteRecomendado;
    $faixarendaestimada = $retorno->data->faixaRendaEstimada;
    $mensagemrendaestimada = $retorno->data->mensagemRendaEstimada;
    $score = $retorno->data->score->serasaScore;
    $mensagemscore = $retorno->data->mensagemScore;

    $situacaocadastral = $retorno->data->identificacao->situacaoCPF;
    $dnasc=date_create($retorno->data->identificacao->dataNascimento);
    $datanascimento = date_format($dnasc,"Y-m-d");
    $genero = $retorno->data->identificacao->genero;
    $nomeMae = $retorno->data->identificacao->nomeMae;
    $razaosocial = '';



    $endereco = $retorno->data->enderecoPessoal;
    foreach ($endereco as $end){
        
        $queryend ="insert into tb_analises_endereco (id_analise, endereco, numero, complemento, bairro, cidade, estado, cep, dddtelefone, telefone) values (".$ida.", '".$end->endereco."', '".$end->numeroCasa."', '".$end->complemento."', '".$end->bairro."', '".$end->cidade."', '".$end->estado."', '".$end->cep."', '".$end->dddTelefone."', '".$end->telefone."')";
        if (mysqli_query($conn, $queryend)) {
            
        } else {
            echo "Erro: " . $queryend . "<br>" . mysqli_error($conn);
            exit;
        }
        
    }


    $participacaosocietaria = $retorno->data->participacoesSocietaria;
    foreach ($participacaosocietaria as $part){
            
        $date=date_create($part->dataInicio);
        $date2=date_create($part->dataUltimaAtualizacao);
        $query ="insert into tb_analises_participacoessocietarias (id_analise, empresa, cnpj, porcentagem, estado, situacao, datainicio, dataultimaatualizacao, restricao) values (".$ida.", '".$part->empresa."', '".$part->cnpj."', '".$part->porcentagem."', '".$part->estado."', '".$part->situacao."', '".date_format($date,"Y-m-d")."', '".date_format($date2,"Y-m-d")."', '".$part->restricao."')";
        if (mysqli_query($conn, $query)) {
            
        } else {
            echo "Erro: " . $query . "<br>" . mysqli_error($conn);
            exit;
        }
        
    }
    $anotacoesNegativas = $retorno -> data -> anotacoesNegativas ;
    foreach ( $anotacoesNegativas as $anot ){
	    $vlr_dividasvencidas = $anot -> valorTotalDividasVencidas;
        $qtd_dividasvencidas = $anot -> quantidadeTotalDividasVencidas;
        
        $dividasvencidas= $anot ->dividasVencidas;
        foreach($dividasvencidas as $div){
            $date=date_create($div->dataOcorrencia);
            $query ="insert into tb_analises_dividasvencidas (id_analise, data, modalidade, valor, titulo, origem) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$div->modalidade."', '".$div->valor."', '".$div->titulo."', '".$div->origem."')";
            if (mysqli_query($conn, $query)) {
                
            } else {
                echo "Erro: " . $query . "<br>" . mysqli_error($conn);
                exit;
            }
        }

        $vlr_protestos= $anot ->valorTotalProtesto;
        $qtd_protestos= $anot ->quantidadeTotalProtesto;
        $protestos= $anot ->protestos;
        foreach($protestos as $prot){
            $date=date_create($prot->dataOcorrencia);
            $query ="insert into tb_analises_protestos (id_analise, data, valor, cartorio, cidade) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$prot->valor."', '".$prot->cartorio."', '".$prot->cidade."')";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
            } else {
                echo "Erro: " . $query . "<br>" . mysqli_error($conn);
                exit;
            }	
        }
        
        
    }

    
    
    
    
    $chequesDevolvidos= $retorno -> data -> chequesDevolvidos ;
    foreach($chequesDevolvidos as $che){
        $vlr_chequesSemfundos= $che ->valorTotalChequeSemFundos;
        $qtd_chequesSemfundos= $che ->quantidadeChequeSemFundos;
        
        $chequesSemFundos= $che ->chequesSemFundos;
        foreach($chequesSemFundos as $cheq){
            $date=date_create($cheq->dataOcorrencia);
            $queryche ="insert into tb_analises_chequessemfundos (id_analise, data, numcheque, alinea, quantidade, tipomoeda, valor, banco, agencia, cidade, uf, qtdeOcorrencia, tipoconta, conta ) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$cheq->numCheque."', '".$cheq->alinea."', '".$cheq->quantidade."', '".$cheq->tipoMoeda."', '".$cheq->valor."', '".$cheq->banco."', '".$cheq->agencia."', '".$cheq->cidade."', '".$cheq->uf."', '".$cheq->qtdeOcorrencia."', '".$cheq->tipoConta."', '".$cheq->conta."')";
            if (mysqli_query($conn, $queryche)) {
                
            } else {
                echo "Erro: " . $queryche . "<br>" . mysqli_error($conn);
                exit;
            }
        }

        $qtd_chequesSustados= $che ->quantidadeTotalChequeSustado;

        $chequesSustado= $che ->chequesSustados;
        foreach($chequesSustado as $cheqs){
            $date=date_create($cheqs->dataOcorrencia);
            $queryches ="insert into tb_analises_chequessustados (id_analise, data, banco, agencia, contacorrente, chequeinicial, chequefinal, motivosustado, qtdeocorrencia) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$cheqs->banco."', '".$cheqs->agencia."', '".$cheqs->contaCorrente."', '".$cheqs->chequeInicial."', '".$cheqs->chequeFinal."', '".$cheqs->motivoSustado."', '".$cheqs->qtdeOcorrencia."')";
            if (mysqli_query($conn, $queryches)) {
                
            } else {
                echo "Erro: " . $queryches . "<br>" . mysqli_error($conn);
                exit;
            }
        }

    }
    

    $anotcompletas= $retorno -> data -> anotacoesCompletas;
    foreach($anotcompletas as $anotcom){
        $qtd_acoesjudiciais= $anotcom ->quantidadeTotalAcaoJudicial;
        $vlr_acoesjudiciais= $anotcom ->valorTotalAcaoJudicial;
        $acoesjudiciais= $anotcom ->acoesJudiciais;
        foreach($acoesjudiciais as $acoes){
            $date=date_create($acoes->dataOcorrencia);
            $query ="insert into tb_analises_acoesjudiciais (id_analise, data, natureza, valor, distribuidor, vara, cidade, uf, principal, tipomoeda, qtdeOcorrencia) values (".$ida.", '".date_format($date,"Y-m-d")."', '".$acoes->natureza."', '".$acoes->valor."', '".$acoes->distribuidor."', '".$acoes->vara."', '".$acoes->cidade."', '".$acoes->uf."', '".$acoes->principal."', '".$acoes->tipoMoeda."', ".$acoes->qtdeOcorrencia.")";
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
//exit;
?>