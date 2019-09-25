<?php
include_once("Model/BaseModel.php");
include_once("Dao/Componente/ComponenteDao.php");
include_once("Resources/php/FuncoesArray.php");
class ComponenteModel extends BaseModel
{
    public function ComponenteModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarComponente($Json=true) {
        $dao = new ComponenteDao();
        $lista = $dao->ListarComponente();
        if ($lista[0] && $lista[1]>0){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
        }
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }
    
    Public Function ListarComponenteCombo($Json=true) {
        $dao = new ComponenteDao();
        $lista = $dao->ListarComponenteCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_COMPONENTE'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_COMPONENTE'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }
    
    Public Function ListarComponentePorArtefatoComplexidadeCombo($Json=true) {
        $dao = new ComponenteDao();
        $lista = $dao->ListarComponentePorArtefatoComplexidadeCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_COMPONENTE'];
                $return[1][$i+1]['DSC'] = $lista[1][$i]['DSC_COMPONENTE'];
            }
        }
        $lista = $return;
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertComponente() {
        $dao = new ComponenteDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertComponente($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateComponente() {
        $dao = new ComponenteDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateComponente($this->objRequest);
        return json_encode($result);
    }
    
}

