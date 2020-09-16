<?php
include_once("Model/BaseModel.php");
include_once("Dao/Projeto/ProjetoDao.php");
include_once("Resources/php/FuncoesArray.php");
class ProjetoModel extends BaseModel
{
    public function ProjetoModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarProjeto($Json=true) {
        $dao = new ProjetoDao();
        $lista = $dao->ListarProjeto();
        if ($lista[0] && $lista[1]>0){
            $lista = FuncoesArray::AtualizaBooleanInArray($lista, 'IND_ATIVO', 'ATIVO');
        }        
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertProjeto() {
        $dao = new ProjetoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertProjeto($this->objRequest);
        return json_encode($result);
    }

    Public Function UpdateProjeto() {
        $dao = new ProjetoDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->UpdateProjeto($this->objRequest);
        return json_encode($result);
    }

    Public Function ListarProjetoAtivo($Json=true) {
        $dao = new ProjetoDao();
        $lista = $dao->ListarProjeto();  
        $retorno[1][0]=array('ID' => '-1', 'DSC'=>'(Selecione)');
        for($i=0; $i<count($lista[1]);$i++){
            $retorno[1][$i+1]['ID']=$lista[1][$i]['COD_PROJETO'];
            $retorno[1][$i+1]['DSC']=$lista[1][$i]['DSC_PROJETO'];
        }
        $retorno[0]=true;
        if ($Json){
            return json_encode($retorno);
        }else{
            return $retorno;
        }
    }
    
}

