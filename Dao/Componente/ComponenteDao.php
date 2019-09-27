<?php
include_once("Dao/BaseDao.php");
class ComponenteDao extends BaseDao
{
    Protected $tableName = "COMPONENTE";

    Protected $columns = array ("dscComponente"     => array("column" =>"DSC_COMPONENTE", "typeColumn" =>"S"),
                                "indAtivo"          => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));

    Protected $columnKey = array("codComponente"    => array("column" =>"COD_COMPONENTE", "typeColumn" => "I"));

    Public Function ComponenteDao() {
        $this->conect();
    }

    Public Function ListarComponente() {
        return $this->MontarSelect();
    }

    Public Function ListarComponenteCombo() {
        $sql = ' SELECT C.COD_COMPONENTE,
                        C.DSC_COMPONENTE
                   FROM COMPONENTE C
                  WHERE C.COD_COMPONENTE NOT IN (SELECT COD_COMPONENTE
                                                   FROM COMPLEXIDADE_COMPONENTE
                                                  WHERE COD_ARTEFATO_COMPLEXIDADE = '.$this->Populate('codArtefatoComplexidade', 'I').')
                    AND C.IND_ATIVO = "S"';
        return $this->selectDB($sql, false);
    }

    Public Function ListarComponentePorArtefatoComplexidadeCombo() {
        $sql = ' SELECT CC.COD_COMPLEXIDADE_COMPONENTE,
                        C.COD_COMPONENTE,
                        C.DSC_COMPONENTE
                   FROM COMPONENTE C
                  INNER JOIN COMPLEXIDADE_COMPONENTE CC ON C.COD_COMPONENTE = CC.COD_COMPONENTE
                  WHERE COD_ARTEFATO_COMPLEXIDADE = '.$this->Populate('codArtefatoComplexidade', 'I').'
                    AND C.IND_ATIVO = "S"';
        return $this->selectDB($sql, false);
    }

    Public Function UpdateComponente(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertComponente(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}