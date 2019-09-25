<?php
include_once("Dao/BaseDao.php");
class ArtefatoDao extends BaseDao
{
    Protected $tableName = "ARTEFATO";

    Protected $columns = array ("dscArtefato"   => array("column" =>"DSC_ARTEFATO", "typeColumn" =>"S"));

    Protected $columnKey = array("codArtefato"=> array("column" =>"COD_ARTEFATO", "typeColumn" => "I"));

    Public Function ArtefatoDao() {
        $this->conect();
    }

    Public Function ListarArtefato() {
        return $this->MontarSelect();
    }

    Public Function ListarArtefatoCombo(){
        $sql = 'SELECT COD_ARTEFATO,
                       DSC_ARTEFATO
                  FROM ARTEFATO
                 WHERE COD_ARTEFATO NOT IN (SELECT COD_ARTEFATO
                                              FROM ATIVIDADE_ARTEFATO
                                             WHERE COD_DISCIPLINA_ATIVIDADE = '.$this->Populate('codDisciplinaAtividade', 'I').')
                 ORDER BY DSC_ARTEFATO';
        return $this->selectDB($sql, false);
    }

    Public Function ListarArtefatoPorDisciplinaAtividadeCombo(){
        $sql = 'SELECT AA.COD_ATIVIDADE_ARTEFATO,
                       A.COD_ARTEFATO,
                       DSC_ARTEFATO
                  FROM ARTEFATO A
                 INNER JOIN ATIVIDADE_ARTEFATO AA ON A.COD_ARTEFATO = AA.COD_ARTEFATO
                 WHERE COD_DISCIPLINA_ATIVIDADE = '.$this->Populate('codDisciplinaAtividade', 'I').'
                 ORDER BY DSC_ARTEFATO';
        return $this->selectDB($sql, false);
    }
    
    Public Function UpdateArtefato(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertArtefato(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}