<?php
include_once("Model/BaseModel.php");
include_once("Dao/Artefato/ArtefatoDao.php");
class ArtefatoModel extends BaseModel
{
    public function ArtefatoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarArtefato($Json=true) {
        $dao = new ArtefatoDao();
        $lista = $dao->ListarArtefato();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function ListarArtefatoCombo($Json=true) {
        $dao = new ArtefatoDao();
        $lista = $dao->ListarArtefatoCombo();
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i]['COD_ARTEFATO'];
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

    Public Function ListarArtefatoPorDisciplinaAtividadeCombo($Json=true) {
        $dao = new ArtefatoDao();
        $lista = $dao->ListarArtefatoPorDisciplinaAtividadeCombo();
        $campo = $dao->Populate('dscCampo', 'S');
        if ($campo==''){
            $campo = 'COD_ATIVIDADE_ARTEFATO';
        }
        $return[0] = false;
        $return[1][0]['ID'] = "-1";        
        $return[1][0]['DSC'] = "(Selecione)";
        if ($lista[0]){
            $return[0] = true;
            $c = count($lista[1]);
            for ($i=0;$i<$c;$i++){
                $return[1][$i+1]['ID'] = $lista[1][$i][$campo];
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

    Public Function InsertArtefato() {
        $dao = new ArtefatoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertArtefato($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateArtefato() {
        $dao = new ArtefatoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateArtefato($this->objRequest);
        return json_encode($result);
    }
    
}

