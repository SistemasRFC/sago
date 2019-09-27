<?php
include_once("Model/BaseModel.php");
include_once("Dao/AtividadeArtefato/AtividadeArtefatoDao.php");
class AtividadeArtefatoModel extends BaseModel
{
    public function AtividadeArtefatoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarAtividadeArtefato($Json=true) {
        $dao = new AtividadeArtefatoDao();
        $lista = $dao->ListarAtividadeArtefato();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarAtividadeArtefatoPorDisciplinaAtividade($Json=true) {
        $dao = new AtividadeArtefatoDao();
        $lista = $dao->ListarAtividadeArtefatoPorDisciplinaAtividade();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }
    
    Public Function ListarDisciplinaAtividadeArtefatoCombo($Json=true) {
        $dao = new AtividadeArtefatoDao();
        $lista = $dao->ListarDisciplinaAtividadeArtefatoCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_ATIVIDADE_ARTEFATO'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_ARTEFATO'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertAtividadeArtefato() {
        $dao = new AtividadeArtefatoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertAtividadeArtefato($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateAtividadeArtefato() {
        $dao = new AtividadeArtefatoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateAtividadeArtefato($this->objRequest);
        return json_encode($result);
    }
    
}

