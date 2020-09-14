<?php
include_once("Dao/BaseDao.php");
class ProjetoDao extends BaseDao
{
    Protected $tableName = "PROJETO";

    Protected $columns = array ("dscProjeto"   => array("column" =>"DSC_PROJETO", "typeColumn" =>"S"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));

    Protected $columnKey = array("codProjeto"=> array("column" =>"COD_PROJETO", "typeColumn" => "I"));

    Public Function ProjetoDao() {
        $this->conect();
    }

    Public Function ListarProjeto() {
        return $this->MontarSelect();
    }

    Public Function UpdateProjeto(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertProjeto(stdClass $obj) {
        return $this->MontarInsert($obj);
    }

    Public Function ListarProjetoAtivo() {
        return $this->MontarSelect("WHERE IND_ATIVO='S'");
    }
}