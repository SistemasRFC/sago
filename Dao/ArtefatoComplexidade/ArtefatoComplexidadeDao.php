<?php
include_once("Dao/BaseDao.php");
class ArtefatoComplexidadeDao extends BaseDao
{
    Protected $tableName = "ARTEFATO_COMPLEXIDADE";

    Protected $columns = array ("codAtividadeArtefato"   => array("column" =>"COD_ATIVIDADE_ARTEFATO", "typeColumn" =>"I"),
                                "codComplexidade"   => array("column" =>"COD_COMPLEXIDADE", "typeColumn" =>"I"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));

    Protected $columnKey = array("codArtefatoComplexidade"=> array("column" =>"COD_ARTEFATO_COMPLEXIDADE", "typeColumn" => "I"));

    Public Function ArtefatoComplexidadeDao() {
        $this->conect();
    }

    Public Function ListarArtefatoComplexidade() {
        return $this->MontarSelect();
    }

    Public Function ListarArtefatoComplexidadePorAtividadeArtefato() {
        $sql = 'SELECT AC.COD_ARTEFATO_COMPLEXIDADE,
                       AC.COD_ATIVIDADE_ARTEFATO,
                       AC.COD_COMPLEXIDADE,
                       D.DSC_DISCIPLINA,
                       A.DSC_ATIVIDADE,
                       AT.DSC_ARTEFATO,
                       C.DSC_COMPLEXIDADE,
                       AC.IND_ATIVO
                  FROM ARTEFATO_COMPLEXIDADE AC
                 INNER JOIN ATIVIDADE_ARTEFATO AA ON AC.COD_ATIVIDADE_ARTEFATO = AA.COD_ATIVIDADE_ARTEFATO
                 INNER JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                 INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                 INNER JOIN ATIVIDADE A ON DA.COD_ATIVIDADE = A.COD_ATIVIDADE
                 INNER JOIN ARTEFATO AT ON AA.COD_ARTEFATO = AT.COD_ARTEFATO
                 INNER JOIN COMPLEXIDADE C ON AC.COD_COMPLEXIDADE = C.COD_COMPLEXIDADE
                 WHERE AC.COD_ATIVIDADE_ARTEFATO = '.$this->Populate('codAtividadeArtefato', 'I');
        return $this->selectDB($sql, false);
    }

    Public Function UpdateArtefatoComplexidade(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertArtefatoComplexidade(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}