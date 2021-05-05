<?php

include_once("Model/BaseModel.php");
include_once("Dao/RelatorioPontuacaoUsuario/RelatorioPontuacaoUsuarioDao.php");

class RelatorioPontuacaoUsuarioModel extends BaseModel{
    
    Public Function ListarRelatorioPontuacaoUsuario(){
        $dao = new RelatorioPontuacaoUsuarioDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $lista = $dao->ListarRelatorioPontuacaoUsuario($this->objRequest);
        if ($lista[0]){
            $total = 0;
            for ($i=0;$i<count($lista[1]);$i++){
                $total += $lista[1][$i]['QTD_TOTAL_PONTOS'];
            }
            $lista[2] = $total;
        }
        return json_encode($lista);
    }
}
