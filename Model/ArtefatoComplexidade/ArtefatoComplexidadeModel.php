<?php
include_once("Model/BaseModel.php");
include_once("Dao/ArtefatoComplexidade/ArtefatoComplexidadeDao.php");
class ArtefatoComplexidadeModel extends BaseModel
{
    public function ArtefatoComplexidadeModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarArtefatoComplexidade($Json=true) {
        $dao = new ArtefatoComplexidadeDao();
        $lista = $dao->ListarArtefatoComplexidade();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarArtefatoComplexidadePorAtividadeArtefato($Json=true) {
        $dao = new ArtefatoComplexidadeDao();
        $lista = $dao->ListarArtefatoComplexidadePorAtividadeArtefato();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertArtefatoComplexidade() {
        $dao = new ArtefatoComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertArtefatoComplexidade($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateArtefatoComplexidade() {
        $dao = new ArtefatoComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateArtefatoComplexidade($this->objRequest);
        return json_encode($result);
    }
    
}

