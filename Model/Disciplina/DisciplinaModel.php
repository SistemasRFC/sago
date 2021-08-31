<?php
include_once("Model/BaseModel.php");
include_once("Dao/Disciplina/DisciplinaDao.php");
include_once("Resources/php/FuncoesArray.php");
class DisciplinaModel extends BaseModel
{
    public function DisciplinaModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarDisciplina($Json=true) {
        $dao = new DisciplinaDao();
        $lista = $dao->ListarDisciplina();
        if ($lista[0] && $lista[1]>0){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
        }
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarDisciplinaCombo($Json=true) {
        $dao = new DisciplinaDao();
        $lista = $dao->ListarDisciplina();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_DISCIPLINA'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_DISCIPLINA'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }


    Public Function ListarDisciplinaAtivaCombo($Json=true) {
        $dao = new DisciplinaDao();
        $lista = $dao->ListarDisciplinaAtiva();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_DISCIPLINA'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_DISCIPLINA'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertDisciplina() {
        $dao = new DisciplinaDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertDisciplina($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateDisciplina() {
        $dao = new DisciplinaDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateDisciplina($this->objRequest);
        return json_encode($result);
    }
    
}

