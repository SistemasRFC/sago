<?php
include_once("Model/BaseModel.php");
include_once("Dao/Complexidade/ComplexidadeDao.php");
class ComplexidadeModel extends BaseModel
{
    public function ComplexidadeModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarComplexidade($Json=true) {
        $dao = new ComplexidadeDao();
        $lista = $dao->ListarComplexidade();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }
    
    Public Function ListarComplexidadeCombo($Json=true) {
        $dao = new ComplexidadeDao();
        $lista = $dao->ListarComplexidadeCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_COMPLEXIDADE'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_COMPLEXIDADE'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }
    
    Public Function ListarComplexidadePorAtividadeArtefatoCombo($Json=true) {
        $dao = new ComplexidadeDao();
        $lista = $dao->ListarComplexidadePorAtividadeArtefatoCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_COMPLEXIDADE'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_COMPLEXIDADE'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }
    
    Public Function InsertComplexidade() {
        $dao = new ComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertComplexidade($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateComplexidade() {
        $dao = new ComplexidadeDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateComplexidade($this->objRequest);
        return json_encode($result);
    }
    
}

