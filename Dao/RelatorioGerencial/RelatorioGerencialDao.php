<?php

include_once("Dao/BaseDao.php");

class RelatorioGerencialDao extends BaseDao{
    
    Protected $tableName = "";

    Protected $columns = array ("codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"));

    Protected $columnKey = array();

    Public Function ListarRelatorioGerencial(){
        $sql = ' SELECT E.COD_EXECUCAO,
                        E.COD_OF,
                        U.NME_USUARIO_COMPLETO
                   FROM EXECUCAO E
                  INNER JOIN SE_USUARIO U ON E.COD_USUARIO = U.COD_USUARIO';
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarRelatorioGerencialPorUsuario(stdClass $obj){
        $sql = ' SELECT E.COD_EXECUCAO,
                        E.COD_OF,
                        U.NME_USUARIO_COMPLETO
                   FROM EXECUCAO E
                  INNER JOIN SE_USUARIO U ON E.COD_USUARIO = U.COD_USUARIO
                  WHERE E.COD_USUARIO = '.$obj->codUsuario;
        return $this->selectDB($sql, false);
    }
}
