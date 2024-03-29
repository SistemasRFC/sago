<?php

include_once("Model/BaseModel.php");
include_once("Dao/RelatorioGerencial/RelatorioGerencialDao.php");
include_once("Dao/ExecucaoComplexidade/ExecucaoComplexidadeDao.php");
include_once("Dao/ExecucaoArquivos/ExecucaoArquivosDao.php");
include_once("Resources/php/FuncoesData.php");

class RelatorioGerencialModel extends BaseModel{
    
    Public Function ListarRelatorioGerencial(){
        $dao = new RelatorioGerencialDao();
        $ECDao = new ExecucaoComplexidadeDao();
        $EADao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        if (!isset($this->objRequest->codUsuario)){
            $this->objRequest->codUsuario=$_SESSION['cod_usuario'];
        }
        if ($this->objRequest->codUsuario>0){
            $lista = $dao->ListarRelatorioGerencialPorUsuario($this->objRequest);   
        }else{
            $lista = $dao->ListarRelatorioGerencial($this->objRequest);
        }
        if ($lista[0]){
            $totalRegistros = count($lista[1]);
            for ($i=0;$i<$totalRegistros;$i++){
                $this->objRequest->codExecucao = $lista[1][$i]['COD_EXECUCAO'];
                $listaComplexidade = $ECDao->ListarExecucaoComplexidadePorExecucao($this->objRequest);
                if ($listaComplexidade[0]){
                    $listaComplexidade = FuncoesData::AtualizaDataInArray($listaComplexidade, 'DTA_REGISTRO', true);
                    $totalRegistrosComplexidade = count($listaComplexidade[1]);
                    $lista[1][$i]['LEC'.$this->objRequest->codExecucao] = $listaComplexidade[1];
                    for ($j=0;$j<$totalRegistrosComplexidade;$j++){
                        $this->objRequest->codExecucaoComplexidade = $listaComplexidade[1][$j]['COD_EXECUCAO_COMPLEXIDADE'];
                        $listaArquivos = $EADao->ListarExecucaoArquivos($this->objRequest);
                        $lista[1][$i]['LEC'.$this->objRequest->codExecucao][$j]['LEA'.$this->objRequest->codExecucaoComplexidade] = $listaArquivos[1];
                        $lista[1][$i]['LEC'.$this->objRequest->codExecucao][$j]['QTD_TOTAL_PONTOS'] = count($listaArquivos[1])*$lista[1][$i]['LEC'.$this->objRequest->codExecucao][$j]['QTD_PONTOS'];
                    }
                }
                
            }
        }
        return json_encode($lista);
    }
    
    Public Function GerarExcelSumarizado(){
        $dao = new RelatorioGerencialDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $listaOfs = $dao->ListarRelatorioGerencial($this->objRequest);
        $pasta = 'Resources/arquivos/'.$this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'/ofs/';
        if (!is_dir($pasta)){
            mkdir($pasta, 0777, true);
        }
        if ($listaOfs[0]){
            $zip = new ZipArchive();
            $nomeArquivoZip = $this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'_ofs.zip';
            if($zip->open($pasta.$nomeArquivoZip, ZIPARCHIVE::CREATE) == TRUE){
                $totalRegistrosOf = count($listaOfs[1]);
                for ($i=0;$i<$totalRegistrosOf;$i++){  
                    if ($listaOfs[1][$i]['IND_STATUS']=='F'){
                        $this->objRequest->codExecucao = $listaOfs[1][$i]['COD_EXECUCAO'];
                        $lista = $dao->GetDadosRelatorioSumarizado($this->objRequest);
                        if ($lista[0]){
                            $nomeUsuario = str_replace(" ", "", $listaOfs[1][$i]['NME_USUARIO_COMPLETO']);
                            $nomeArquivo='projeto_'.$this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'_'.$nomeUsuario.'_'.$listaOfs[1][$i]['COD_OF'].'.txt';
                            $nomeArquivo = str_replace('(', '', $nomeArquivo);
                            $nomeArquivo = str_replace(')', '', $nomeArquivo);
                            $nomeArquivo = str_replace(' ', '_', $nomeArquivo);
                            $nomeArquivo = str_replace('/', '_', $nomeArquivo);
                            $arquivo = fopen($pasta.$nomeArquivo,'w');
                            if ($arquivo == false){
                                die('Não foi possível criar o arquivo.');
                            }
                            $totalRegistros = count($lista[1]);
                            $nl=chr(10);
                            for ($j=0;$j<$totalRegistros;$j++){
                                $texto = $lista[1][$j]['COD_TAREFA'].' '.
                                         $lista[1][$j]['DISCIPLINA'].' '.
                                         $lista[1][$j]['ATIVIDADE'].' '.
                                         $lista[1][$j]['ARTEFATO'].' '.
                                         $lista[1][$j]['COMPLEXIDADE'].' '.
                                         $lista[1][$j]['TOTAL'].$nl;
                                fwrite($arquivo, $texto, strlen($texto));
                            }
                            fclose($arquivo);
                        }
                        $zip->addFile($pasta.$nomeArquivo,$nomeArquivo);
                    }
                }
            }
        }
        return json_encode(array(true, array('nomeArquivo'=> $nomeArquivoZip, 'pasta'=> $pasta)));
    }  
    
    Public Function GerarArquivosOrcamento(){
        $dao = new RelatorioGerencialDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $listaOfs = $dao->ListarRelatorioGerencial($this->objRequest);
        $pasta = 'Resources/arquivos/'.$this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'/arquivos/';
        if (!is_dir($pasta)){
            mkdir($pasta, 0777, true);
        }
        if ($listaOfs[0]){
            $zip = new ZipArchive();
            $nomeArquivoZip = $this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'_arquivos.zip';
            if($zip->open($pasta.$nomeArquivoZip, ZIPARCHIVE::CREATE) == TRUE){
                $totalRegistrosOf = count($listaOfs[1]);
                for ($i=0;$i<$totalRegistrosOf;$i++){ 
                    if ($listaOfs[1][$i]['IND_STATUS']=='F'){
                        $this->objRequest->codExecucao = $listaOfs[1][$i]['COD_EXECUCAO'];
                        $lista = $dao->GerarArquivosOrcamento($this->objRequest);
                        if ($lista[0]){
                            $nomeUsuario = str_replace(" ", "", $listaOfs[1][$i]['NME_USUARIO_COMPLETO']);
                            $nomeArquivo='projeto_'.$this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'_'.$nomeUsuario.'_'.$listaOfs[1][$i]['COD_OF'].'.txt';
                            $nomeArquivo = str_replace('(', '', $nomeArquivo);
                            $nomeArquivo = str_replace(')', '', $nomeArquivo);
                            $nomeArquivo = str_replace(' ', '_', $nomeArquivo);
                            $nomeArquivo = str_replace('/', '_', $nomeArquivo);
                            $arquivo = fopen($pasta.$nomeArquivo,'w');
                            if ($arquivo == false){
                                die('Não foi possível criar o arquivo.');
                            }
                            $totalRegistros = count($lista[1]);
                            $nl=chr(10);
                            for ($j=0;$j<$totalRegistros;$j++){
                                $texto = $lista[1][$j]['NME_ARQUIVO'];
                                if ($lista[1][$j]['TXT_DESCRICAO_JUSTIFICATIVA']!=null){
                                    $texto .= ';'.$lista[1][$j]['TXT_DESCRICAO_JUSTIFICATIVA'];
                                }
                                $texto .= $nl;
                                fwrite($arquivo, $texto, strlen($texto));
                            }
                            fclose($arquivo);
                        }
                        $zip->addFile($pasta.$nomeArquivo,$nomeArquivo);
                    }
                }
            }
        }
        return json_encode(array(true, array('nomeArquivo'=> $nomeArquivoZip, 'pasta'=> $pasta)));
    }     
    
    Public Function GerarJson(){
        $dao = new RelatorioGerencialDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $listaOfs = $dao->ListarRelatorioGerencial($this->objRequest);
        $pasta = 'Resources/arquivos/'.$this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'/arquivos/';
        if (!is_dir($pasta)){
            mkdir($pasta, 0777, true);
        }
        if ($listaOfs[0]){
            $zip = new ZipArchive();
            $nomeArquivoZip = $this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'_json.zip';
            if($zip->open($pasta.$nomeArquivoZip, ZIPARCHIVE::CREATE) == TRUE){
                $totalRegistrosOf = count($listaOfs[1]);
                $retorno = "";
                for ($i=0;$i<$totalRegistrosOf;$i++){ 
                    if ($listaOfs[1][$i]['IND_STATUS']=='F'){
                        $retorno='{"chave":"'.$listaOfs[1][$i]['COD_CHAVE'].'",
                                   "numeroOF":"'.$listaOfs[1][$i]['COD_OF'].'",
                                   "numeroOrdemContratacao":"'.$listaOfs[1][$i]['NRO_ORDEM_CONTRATACAO'].'",
                                   "valorOF":'.$listaOfs[1][$i]['QTD_TOTAL'].',
                                   "entregas":[';
                        $this->objRequest->codExecucao = $listaOfs[1][$i]['COD_EXECUCAO'];
                        $lista = $dao->GerarArquivosOrcamento($this->objRequest);
                        if ($lista[0]){
                            $nomeUsuario = str_replace(" ", "", $listaOfs[1][$i]['NME_USUARIO_COMPLETO']);
                            $nomeArquivo='projeto_'.$this->objRequest->nroMesReferencia.$this->objRequest->nroAnoReferencia.'_'.$nomeUsuario.'_'.$listaOfs[1][$i]['COD_OF'].'.json';
                            $nomeArquivo = str_replace('(', '', $nomeArquivo);
                            $nomeArquivo = str_replace(')', '', $nomeArquivo);
                            $nomeArquivo = str_replace(' ', '_', $nomeArquivo);
                            $nomeArquivo = str_replace('/', '_', $nomeArquivo);
                            $arquivo = fopen($pasta.$nomeArquivo,'w');
                            if ($arquivo == false){
                                die('Não foi possível criar o arquivo.');
                            }
                            $totalRegistros = count($lista[1]);
                            $nl=chr(10);
                            $valorOf=0;
                            $codTarefaAnterior=0;
                            for ($j=0;$j<$totalRegistros;$j++){
                                if ($codTarefaAnterior!=$lista[1][$j]['COD_TAREFA']){
                                    if ($codTarefaAnterior!=0){
                                        $retorno = substr($retorno, 0, strlen($retorno)-1);
                                        $retorno .="]
                                                },";
                                    }
                                    $retorno .= "{";
                                    $retorno .= '"itemGuia":"'.$lista[1][$j]['COD_TAREFA'].'",
                                                 "complexidade":"Padrão",
                                                 "itens": [';
                                    
                                }
                                $retorno.='{"artefato":"'.$lista[1][$j]['NME_ARQUIVO'].'",';
                                $retorno.=' "descricao":"'.$lista[1][$j]['TXT_DESCRICAO_JUSTIFICATIVA'].'"},';
                                $valorOf+=$lista[1][$j]['QTD_PONTOS'];
                                $codTarefaAnterior = $lista[1][$j]['COD_TAREFA'];       
                            }
                            $retorno = substr($retorno, 0, strlen($retorno)-1);
                            $retorno .="]}";                            
                            $retorno .= "]}
                                    ";                            
                            fwrite($arquivo, $retorno, strlen($retorno));
                            fclose($arquivo);
                        }
                        $zip->addFile($pasta.$nomeArquivo,$nomeArquivo);
                    }
                }

            }
        }
        return json_encode(array(true, array('nomeArquivo'=> $nomeArquivoZip, 'pasta'=> $pasta)));
    }    
}
