<?php
include_once("Dao/BaseDao.php");
class ComplexidadeComponenteDao extends BaseDao
{
    Protected $tableName = "COMPLEXIDADE_COMPONENTE";

    Protected $columns = array ("codArtefatoComplexidade"   => array("column" =>"COD_ARTEFATO_COMPLEXIDADE", "typeColumn" =>"I"),
                                "codComponente"   => array("column" =>"COD_COMPONENTE", "typeColumn" =>"I"),
                                "qtdPontos"   => array("column" =>"QTD_PONTOS", "typeColumn" =>"F"));

    Protected $columnKey = array("codComplexidadeComponente"=> array("column" =>"COD_COMPLEXIDADE_COMPONENTE", "typeColumn" => "I"));

    Public Function ComplexidadeComponenteDao() {
        $this->conect();
    }

    Public Function ListarComplexidadeComponente() {
        return $this->MontarSelect();
    }

    Public Function ListarComplexidadeComponentePorArtefatoComplexidade() {
        $sql = 'SELECT AC.COD_ARTEFATO_COMPLEXIDADE,
                       AC.COD_ATIVIDADE_ARTEFATO,
                       AC.COD_COMPLEXIDADE,
                       D.COD_DISCIPLINA,
                       DA.COD_DISCIPLINA_ATIVIDADE,
                       CC.COD_COMPLEXIDADE_COMPONENTE,
                       AT.COD_ARTEFATO,
                       D.DSC_DISCIPLINA,
                       A.DSC_ATIVIDADE,
                       AT.DSC_ARTEFATO,
                       C.DSC_COMPLEXIDADE,
                       CM.DSC_COMPONENTE,
                       CM.COD_COMPONENTE,
                       CC.QTD_PONTOS
                  FROM COMPLEXIDADE_COMPONENTE CC
                 INNER JOIN ARTEFATO_COMPLEXIDADE AC ON CC.COD_ARTEFATO_COMPLEXIDADE = AC.COD_ARTEFATO_COMPLEXIDADE
                 INNER JOIN ATIVIDADE_ARTEFATO AA ON AC.COD_ATIVIDADE_ARTEFATO = AA.COD_ATIVIDADE_ARTEFATO
                 INNER JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                 INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                 INNER JOIN ATIVIDADE A ON DA.COD_ATIVIDADE = A.COD_ATIVIDADE
                 INNER JOIN ARTEFATO AT ON AA.COD_ARTEFATO = AT.COD_ARTEFATO
                 INNER JOIN COMPLEXIDADE C ON AC.COD_COMPLEXIDADE = C.COD_COMPLEXIDADE
                 INNER JOIN COMPONENTE CM ON CC.COD_COMPONENTE = CM.COD_COMPONENTE
                 WHERE CC.COD_ARTEFATO_COMPLEXIDADE = '.$this->Populate('codArtefatoComplexidade', 'I');
        return $this->selectDB($sql, false);
    }

    Public Function UpdateComplexidadeComponente(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertComplexidadeComponente(stdClass $obj) {
        return $this->MontarInsert($obj);
    }
}