<?php
include_once("Dao/BaseDao.php");
class DisciplinaAtividadeDao extends BaseDao
{
    Protected $tableName = "DISCIPLINA_ATIVIDADE";

    Protected $columns = array ("codDisciplina"   => array("column" =>"COD_DISCIPLINA", "typeColumn" =>"I"),
                                "codAtividade"   => array("column" =>"COD_ATIVIDADE", "typeColumn" =>"I"));

    Protected $columnKey = array("codDisciplinaAtividade"=> array("column" =>"COD_DISCIPLINA_ATIVIDADE", "typeColumn" => "I"));

    Public Function DisciplinaAtividadeDao() {
        $this->conect();
    }

    Public Function ListarDisciplinaAtividade() {
        return $this->MontarSelect();
    }

    Public Function ListarDisciplinaAtividadePorDisciplina() {
        $sql = 'SELECT DA.COD_DISCIPLINA, 
                       DA.COD_ATIVIDADE,
                       DA.COD_DISCIPLINA_ATIVIDADE,
                       D.DSC_DISCIPLINA,
                       A.DSC_ATIVIDADE
                  FROM '.$this->tableName.' DA
                 INNER JOIN ATIVIDADE A ON DA.COD_ATIVIDADE = A.COD_ATIVIDADE
                 INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                 WHERE DA.COD_DISCIPLINA = '.$this->Populate("codDisciplina", 'I');
        return $this->selectDB($sql, false);
    }

    Public Function ListarDisciplinaAtividadeCombo() {
        $sql = 'SELECT DA.COD_DISCIPLINA, 
                       DA.COD_ATIVIDADE,
                       DA.COD_DISCIPLINA_ATIVIDADE,
                       CONCAT(D.DSC_DISCIPLINA, \'/\', A.DSC_ATIVIDADE) AS DSC_ATIVIDADE
                  FROM '.$this->tableName.' DA
                 INNER JOIN ATIVIDADE A ON DA.COD_ATIVIDADE = A.COD_ATIVIDADE
                 INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA';
        return $this->selectDB($sql, false);
    }

    Public Function UpdateDisciplinaAtividade(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertDisciplinaAtividade(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}