<?php
include_once("Dao/BaseDao.php");
class DisciplinaDao extends BaseDao
{
    Protected $tableName = "DISCIPLINA";

    Protected $columns = array ("dscDisciplina"   => array("column" =>"DSC_DISCIPLINA", "typeColumn" =>"S"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));

    Protected $columnKey = array("codDisciplina"=> array("column" =>"COD_DISCIPLINA", "typeColumn" => "I"));

    Public Function DisciplinaDao() {
        $this->conect();
    }

    Public Function ListarDisciplina() {
        return $this->MontarSelect();
    }

    Public Function ListarDisciplinaAtiva() {
        return $this->MontarSelect("WHERE IND_ATIVO = 'S'");
    }

    Public Function UpdateDisciplina(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertDisciplina(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}