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
        $this->objRequest->codUsuario = $_SESSION['cod_usuario'];
        $lista = $dao->GetDadosRelatorioSumarizado($this->objRequest);
        if ($lista[0]){
            $nomeArquivo='orcamento'.$_SESSION['cod_usuario'].'T'.time().'.txt';
            $arquivo = fopen('Resources/arquivos/'.$nomeArquivo,'w');
            if ($arquivo == false){
                die('Não foi possível criar o arquivo.');
            }
            $totalRegistros = count($lista[1]);
            $nl=chr(10);
            for ($i=0;$i<$totalRegistros;$i++){
                $texto = $lista[1][$i]['COD_TAREFA'].' '.
                         $lista[1][$i]['DISCIPLINA'].' '.
                         $lista[1][$i]['ATIVIDADE'].' '.
                         $lista[1][$i]['ARTEFATO'].' '.
                         $lista[1][$i]['COMPLEXIDADE'].' '.
                         $lista[1][$i]['TOTAL'].$nl;
                fwrite($arquivo, $texto, strlen($texto));
            }
            fclose($arquivo);
        }
        return $nomeArquivo;
    }  
    
    Public Function GerarArquivosOrcamento(){
        $dao = new RelatorioGerencialDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->codUsuario = $_SESSION['cod_usuario'];
        $lista = $dao->GerarArquivosOrcamento($this->objRequest);
        if ($lista[0]){
            $nomeArquivo='orcamentoArquivo'.$_SESSION['cod_usuario'].'T'.time().'.txt';
            $arquivo = fopen('Resources/arquivos/'.$nomeArquivo,'w');
            if ($arquivo == false){
                die('Não foi possível criar o arquivo.');
            }
            $totalRegistros = count($lista[1]);
            $nl=chr(10);
            for ($i=0;$i<$totalRegistros;$i++){
                $texto = $lista[1][$i]['NME_ARQUIVO'].$nl;
                fwrite($arquivo, $texto, strlen($texto));
            }
            fclose($arquivo);
        }
        return $nomeArquivo;
    }    
}
