<?php
include_once("Model/BaseModel.php");
include_once("Dao/ExecucaoArquivos/ExecucaoArquivosDao.php");
class ExecucaoArquivosModel extends BaseModel
{
    public function ExecucaoArquivosModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarExecucaoArquivos($Json=true) {
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $lista = $dao->ListarExecucaoArquivos($this->objRequest);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertExecucaoArquivos() {
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertExecucaoArquivos($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateExecucaoArquivos() {
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateExecucaoArquivos($this->objRequest);
        return json_encode($result);
    }

    Public Function DeleteExecucaoArquivos() {
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->DeleteExecucaoArquivos($this->objRequest);
        return json_encode($result);
    }
    
    Public Function VerificaArquivoExistente(){
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->codExecucao = $dao->Populate("codExecucao", "I");
        if (!isset($this->objRequest->nmeArquivo) || trim($this->objRequest->nmeArquivo) == ''){
            $result[0]=false;
            $result[1]="Nenhum arquivo foi informado!";
            return json_encode($result);
        }
        if (!isset($this->objRequest->txtDescricaoJustificativa)){
            $this->objRequest->txtDescricaoJustificativa='';
        }
        $result = $dao->VerificaArquivoExistente($this->objRequest);
        if ($result[0]){
            if ($result[1][0]['QTD']>0){
                $result[0]=false;
                $result[1]="Já existe este mesmo artefato nesta OF!";
            }
        }
        return json_encode($result);
    }
    
}

