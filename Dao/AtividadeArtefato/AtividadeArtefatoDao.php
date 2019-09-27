<?php
include_once("Dao/BaseDao.php");
class AtividadeArtefatoDao extends BaseDao
{
    Protected $tableName = "ATIVIDADE_ARTEFATO";

    Protected $columns = array ("codDisciplinaAtividade"   => array("column" =>"COD_DISCIPLINA_ATIVIDADE", "typeColumn" =>"I"),
                                "codArtefato"   => array("column" =>"COD_ARTEFATO", "typeColumn" =>"I"),
                                "codTarefa"   => array("column" =>"COD_TAREFA", "typeColumn" =>"S"));

    Protected $columnKey = array("codAtividadeArtefato"=> array("column" =>"COD_ATIVIDADE_ARTEFATO", "typeColumn" => "I"));

    Public Function AtividadeArtefatoDao() {
        $this->conect();
    }

    Public Function ListarAtividadeArtefato() {
        return $this->MontarSelect();
    }

    Public Function ListarAtividadeArtefatoPorDisciplinaAtividade() {
        $sql = "SELECT AA.COD_ATIVIDADE_ARTEFATO,
                       AA.COD_DISCIPLINA_ATIVIDADE,
                       AA.COD_ARTEFATO,
                       D.COD_DISCIPLINA,
                       D.DSC_DISCIPLINA,
                       A.DSC_ATIVIDADE,
                       AT.DSC_ARTEFATO,
                       COALESCE(AA.COD_TAREFA,'') AS COD_TAREFA
                  FROM ATIVIDADE_ARTEFATO AA
                 INNER JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                 INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                 INNER JOIN ATIVIDADE A ON DA.COD_ATIVIDADE = A.COD_ATIVIDADE
                 INNER JOIN ARTEFATO AT ON AA.COD_ARTEFATO = AT.COD_ARTEFATO
                 WHERE AA.COD_DISCIPLINA_ATIVIDADE = ".$this->Populate("codDisciplinaAtividade", "I");
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarDisciplinaAtividadeArtefatoCombo() {
        $sql = "SELECT AA.COD_ATIVIDADE_ARTEFATO,
                       AT.DSC_ARTEFATO
                  FROM ATIVIDADE_ARTEFATO AA
                 INNER JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                 INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                 INNER JOIN ATIVIDADE A ON DA.COD_ATIVIDADE = A.COD_ATIVIDADE
                 INNER JOIN ARTEFATO AT ON AA.COD_ARTEFATO = AT.COD_ARTEFATO
                 WHERE AA.COD_DISCIPLINA_ATIVIDADE = ".$this->Populate("codDisciplinaAtividade", "I");
        return $this->selectDB($sql, false);
    }

    Public Function UpdateAtividadeArtefato(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertAtividadeArtefato(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}