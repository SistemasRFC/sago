<?php
include_once("Dao/BaseDao.php");
class AtividadeDao extends BaseDao
{
    Protected $tableName = "ATIVIDADE";

    Protected $columns = array ("dscAtividade"  => array("column" =>"DSC_ATIVIDADE", "typeColumn" =>"S"),
                                "indAtivo"      => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));

    Protected $columnKey = array("codAtividade" => array("column" =>"COD_ATIVIDADE", "typeColumn" => "I"));

    Public Function AtividadeDao() {
        $this->conect();
    }

    Public Function ListarAtividade() {
        return $this->MontarSelect();
    }
    
    Public Function ListarAtividadeCombo() {
        $sql = "SELECT COD_ATIVIDADE,
                       DSC_ATIVIDADE
                  FROM ATIVIDADE
                 WHERE COD_ATIVIDADE NOT IN (SELECT COD_ATIVIDADE
                                               FROM DISCIPLINA_ATIVIDADE
                                              WHERE COD_DISCIPLINA = ".$this->Populate('codDisciplina', 'I').")
                   AND IND_ATIVO = 'S'";
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarAtividadeComboPorDisciplina() {
        $sql = 'SELECT DA.COD_DISCIPLINA_ATIVIDADE,
                       A.DSC_ATIVIDADE
                  FROM ATIVIDADE A
                 INNER JOIN DISCIPLINA_ATIVIDADE DA ON A.COD_ATIVIDADE = DA.COD_ATIVIDADE
                 WHERE DA.COD_DISCIPLINA =  '.$this->Populate('codDisciplina', 'I').'
                   AND A.IND_ATIVO = "S"
                   AND DA.IND_ATIVO= "S"';
        return $this->selectDB($sql, false);
    }

    Public Function UpdateAtividade(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertAtividade(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}