<?php
include_once("Model/BaseModel.php");
include_once("Dao/ExecucaoComplexidade/ExecucaoComplexidadeDao.php");
class ExecucaoComplexidadeModel extends BaseModel
{
    public function ExecucaoComplexidadeModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarExecucaoComplexidade($Json=true) {
        $dao = new ExecucaoComplexidadeDao();
        $lista = $dao->ListarExecucaoComplexidade();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertExecucaoComplexidade() {
        $dao = new ExecucaoComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertExecucaoComplexidade($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateExecucaoComplexidade() {
        $dao = new ExecucaoComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateExecucaoComplexidade($this->objRequest);
        return json_encode($result);
    }

    Public Function ClonarDados() {
        $dao = new ExecucaoComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->ClonarDados($this->objRequest);
        return json_encode($result);
    }

    Public Function DeleteExecucaoComplexidade() {
        $dao = new ExecucaoComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->DeleteExecucaoComplexidade($this->objRequest);
        return json_encode($result);
    }
    
}

