<?php
include_once("Dao/BaseDao.php");
class ComplexidadeDao extends BaseDao
{
    Protected $tableName = "COMPLEXIDADE";

    Protected $columns = array ("dscComplexidade"   => array("column" =>"DSC_COMPLEXIDADE", "typeColumn" =>"S"));

    Protected $columnKey = array("codComplexidade"=> array("column" =>"COD_COMPLEXIDADE", "typeColumn" => "I"));

    Public Function ComplexidadeDao() {
        $this->conect();
    }

    Public Function ListarComplexidade() {
        return $this->MontarSelect();
    }

    Public Function ListarComplexidadeCombo() {
        $sql = 'SELECT C.COD_COMPLEXIDADE,
                       C.DSC_COMPLEXIDADE
                  FROM COMPLEXIDADE C
                 WHERE C.COD_COMPLEXIDADE NOT IN (SELECT COD_COMPLEXIDADE
                                                    FROM ARTEFATO_COMPLEXIDADE
                                                   WHERE COD_ATIVIDADE_ARTEFATO = '.$this->Populate('codAtividadeArtefato', 'I').')';
        return $this->selectDB($sql, false);
    }

    Public Function ListarComplexidadePorAtividadeArtefatoCombo() {
        $sql = 'SELECT AC.COD_ARTEFATO_COMPLEXIDADE AS COD_COMPLEXIDADE,
                       C.DSC_COMPLEXIDADE
                  FROM COMPLEXIDADE C
                 INNER JOIN ARTEFATO_COMPLEXIDADE AC ON C.COD_COMPLEXIDADE = AC.COD_COMPLEXIDADE
                 WHERE AC.COD_ATIVIDADE_ARTEFATO = '.$this->Populate('codAtividadeArtefato', 'I');
        return $this->selectDB($sql, false);
    }

    Public Function UpdateComplexidade(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertComplexidade(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}