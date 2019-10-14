<?php

include_once("Model/BaseModel.php");
include_once("Dao/RelatorioPontuacaoUsuario/RelatorioPontuacaoUsuarioDao.php");

class RelatorioPontuacaoUsuarioModel extends BaseModel{
    
    Public Function ListarRelatorioPontuacaoUsuario(){
        $dao = new RelatorioPontuacaoUsuarioDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $lista = $dao->ListarRelatorioPontuacaoUsuario($this->objRequest);
        return json_encode($lista);
    }
}
