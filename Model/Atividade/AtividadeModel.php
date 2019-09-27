<?php
include_once("Model/BaseModel.php");
include_once("Dao/Atividade/AtividadeDao.php");
include_once("Resources/php/FuncoesArray.php");
class AtividadeModel extends BaseModel
{
    public function AtividadeModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarAtividade($Json=true) {
        $dao = new AtividadeDao();
        $lista = $dao->ListarAtividade();
        if ($lista[0] && $lista[1]>0){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
        }
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarAtividadeCombo($Json=true) {
        $dao = new AtividadeDao();
        $lista = $dao->ListarAtividadeCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_ATIVIDADE'];
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

    Public Function ListarAtividadeComboPorDisciplina($Json=true) {
        $dao = new AtividadeDao();
        $lista = $dao->ListarAtividadeComboPorDisciplina();
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

    Public Function InsertAtividade() {
        $dao = new AtividadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertAtividade($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateAtividade() {
        $dao = new AtividadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateAtividade($this->objRequest);
        return json_encode($result);
    }
    
}

