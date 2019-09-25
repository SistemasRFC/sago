<?php
include_once("Model/BaseModel.php");
include_once("Dao/ComplexidadeComponente/ComplexidadeComponenteDao.php");
class ComplexidadeComponenteModel extends BaseModel
{
    public function ComplexidadeComponenteModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarComplexidadeComponente($Json=true) {
        $dao = new ComplexidadeComponenteDao();
        $lista = $dao->ListarComplexidadeComponente();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }
    Public Function ListarComplexidadeComponentePorArtefatoComplexidade($Json=true) {
        $dao = new ComplexidadeComponenteDao();
        $lista = $dao->ListarComplexidadeComponentePorArtefatoComplexidade();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertComplexidadeComponente() {
        $dao = new ComplexidadeComponenteDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertComplexidadeComponente($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateComplexidadeComponente() {
        $dao = new ComplexidadeComponenteDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateComplexidadeComponente($this->objRequest);
        return json_encode($result);
    }
    
}

