<?php
include_once("Model/BaseModel.php");
include_once("Dao/DisciplinaAtividade/DisciplinaAtividadeDao.php");
class DisciplinaAtividadeModel extends BaseModel
{
    public function DisciplinaAtividadeModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarDisciplinaAtividade($Json=true) {
        $dao = new DisciplinaAtividadeDao();
        $lista = $dao->ListarDisciplinaAtividade();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarDisciplinaAtividadePorDisciplina($Json=true) {
        $dao = new DisciplinaAtividadeDao();
        $lista = $dao->ListarDisciplinaAtividadePorDisciplina();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarDisciplinaAtividadeCombo($Json=true) {
        $dao = new DisciplinaAtividadeDao();
        $lista = $dao->ListarDisciplinaAtividadeCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_DISCIPLINA_ATIVIDADE'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_ATIVIDADE'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertDisciplinaAtividade() {
        $dao = new DisciplinaAtividadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertDisciplinaAtividade($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateDisciplinaAtividade() {
        $dao = new DisciplinaAtividadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateDisciplinaAtividade($this->objRequest);
        return json_encode($result);
    }
    
}

