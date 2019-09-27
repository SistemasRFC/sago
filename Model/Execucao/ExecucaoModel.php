<?php
include_once("Model/BaseModel.php");
include_once("Resources/php/FuncoesData.php");
include_once("Dao/Execucao/ExecucaoDao.php");
include_once("Dao/ExecucaoArquivos/ExecucaoArquivosDao.php");
class ExecucaoModel extends BaseModel
{
    public function ExecucaoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarExecucao($Json=true) {
        $dao = new ExecucaoDao();
        $codUsuario = $dao->Populate('codUsuario', 'I');
        
        if ($codUsuario<=0){
            $codUsuario=$_SESSION['cod_usuario'];
        }
        
        $lista = $dao->ListarExecucao($codUsuario);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarExecucaoPorOf($Json=true) {
        $dao = new ExecucaoDao();
        $listaArquivosDao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $lista = $dao->ListarExecucaoPorOf();
        if ($lista[0]){
            $lista = FuncoesData::AtualizaDataInArray($lista, 'DTA_REGISTRO', true);
            $total = count($lista[1]);
            for ($i=0;$i<$total;$i++){
                $this->objRequest->codExecucaoComplexidade=$lista[1][$i]['COD_EXECUCAO_COMPLEXIDADE'];
                $listaArquivos = $listaArquivosDao->ListarExecucaoArquivos($this->objRequest);
                $lista[1][$i]['cd'.$lista[1][$i]['COD_EXECUCAO_COMPLEXIDADE']] = $listaArquivos[1];
            }
        }
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertExecucao() {
        $dao = new ExecucaoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->codUsuario = $_SESSION['cod_usuario'];
        $result = $dao->InsertExecucao($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateExecucao() {
        $dao = new ExecucaoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateExecucao($this->objRequest);
        return json_encode($result);
    }

    Public Function DeleteExecucao() {
        $dao = new ExecucaoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->DeleteExecucao($this->objRequest);
        return json_encode($result);
    }
    
}

