<?php
include_once("Dao/BaseDao.php");
class ExecucaoDao extends BaseDao
{
    Protected $tableName = "EXECUCAO";

    Protected $columns = array ("codOf"   => array("column" =>"COD_OF", "typeColumn" =>"S"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "indStatus"   => array("column" =>"IND_STATUS", "typeColumn" =>"S"),
                                "nroMesReferencia"   => array("column" =>"NRO_MES_REFERENCIA", "typeColumn" =>"I"),
                                "nroAnoReferencia"   => array("column" =>"NRO_ANO_REFERENCIA", "typeColumn" =>"I"),
                                "nroOrdemContratacao"   => array("column" =>"NRO_ORDEM_CONTRATACAO", "typeColumn" =>"I"));

    Protected $columnKey = array("codExecucao"=> array("column" =>"COD_EXECUCAO", "typeColumn" => "I"));

    Public Function ExecucaoDao() {
        $this->conect();
    }

    Public Function ListarExecucao($codUsuario) {
        $sql = ' SELECT COD_EXECUCAO, COD_OF, NRO_ORDEM_CONTRATACAO, SUM(QTD_PONTOS_TOTAL) as QTD_PONTOS_TOTAL, IND_STATUS, NRO_MES_REFERENCIA, NRO_ANO_REFERENCIA, PERIODO_REFERENCIA
                   FROM (SELECT E.COD_EXECUCAO,
                                E.COD_OF,
                                E.NRO_ORDEM_CONTRATACAO,
                                COALESCE(CC.QTD_PONTOS*(COUNT(EA.COD_EXECUCAO_ARQUIVO)),0) AS QTD_PONTOS_TOTAL,
                                CASE E.IND_STATUS WHEN "E" THEN "Em execução"
                                                  WHEN "F" THEN "Finalizada"
                                END AS IND_STATUS,
                                E.NRO_MES_REFERENCIA,
                                E.NRO_ANO_REFERENCIA,
                                CONCAT(E.NRO_MES_REFERENCIA,\'/\',E.NRO_ANO_REFERENCIA) AS PERIODO_REFERENCIA
                           FROM EXECUCAO E
                           LEFT JOIN EXECUCAO_COMPLEXIDADE EC ON E.COD_EXECUCAO = EC.COD_EXECUCAO
                           LEFT JOIN EXECUCAO_ARQUIVOS EA ON EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                           LEFT JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                           LEFT JOIN ARTEFATO_COMPLEXIDADE AC ON CC.COD_ARTEFATO_COMPLEXIDADE = AC.COD_ARTEFATO_COMPLEXIDADE
                           LEFT JOIN ATIVIDADE_ARTEFATO AA ON AC.COD_ATIVIDADE_ARTEFATO = AA.COD_ATIVIDADE_ARTEFATO
                           LEFT JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                           LEFT JOIN COMPONENTE CM ON CC.COD_COMPONENTE = CM.COD_COMPONENTE
                           LEFT JOIN COMPLEXIDADE CX ON AC.COD_COMPLEXIDADE = CX.COD_COMPLEXIDADE
                           LEFT JOIN ARTEFATO ART ON AA.COD_ARTEFATO = ART.COD_ARTEFATO
                           LEFT JOIN ATIVIDADE ATV ON DA.COD_ATIVIDADE = ATV.COD_ATIVIDADE
                           LEFT JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                           WHERE E.COD_USUARIO = '.$codUsuario.'
                           GROUP BY E.COD_EXECUCAO, CC.QTD_PONTOS) X 
                  group by COD_EXECUCAO
                  order by COD_EXECUCAO DESC';
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarExecucaoPorOf() {
        $sql = ' SELECT EC.COD_EXECUCAO_COMPLEXIDADE,
                        CC.COD_COMPLEXIDADE_COMPONENTE,
                        AC.COD_ARTEFATO_COMPLEXIDADE,
                        AA.COD_ATIVIDADE_ARTEFATO,
                        DA.COD_DISCIPLINA_ATIVIDADE,
                        EC.DTA_REGISTRO,
                        D.COD_DISCIPLINA,            
                        D.DSC_DISCIPLINA,
                        ATV.DSC_ATIVIDADE,
                        ART.DSC_ARTEFATO,
                        CX.DSC_COMPLEXIDADE,
                        CM.DSC_COMPONENTE,
                        CC.QTD_PONTOS,
                        EC.QTD_PONTOS*(COUNT(EA.COD_EXECUCAO_ARQUIVO)) AS QTD_PONTOS_TOTAL
                   FROM EXECUCAO E
                  INNER JOIN EXECUCAO_COMPLEXIDADE EC ON E.COD_EXECUCAO = EC.COD_EXECUCAO
                   LEFT JOIN EXECUCAO_ARQUIVOS EA ON EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                  INNER JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                  INNER JOIN ARTEFATO_COMPLEXIDADE AC ON CC.COD_ARTEFATO_COMPLEXIDADE = AC.COD_ARTEFATO_COMPLEXIDADE
                  INNER JOIN ATIVIDADE_ARTEFATO AA ON AC.COD_ATIVIDADE_ARTEFATO = AA.COD_ATIVIDADE_ARTEFATO
                  INNER JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                  INNER JOIN COMPONENTE CM ON CC.COD_COMPONENTE = CM.COD_COMPONENTE
                  INNER JOIN COMPLEXIDADE CX ON AC.COD_COMPLEXIDADE = CX.COD_COMPLEXIDADE
                  INNER JOIN ARTEFATO ART ON AA.COD_ARTEFATO = ART.COD_ARTEFATO
                  INNER JOIN ATIVIDADE ATV ON DA.COD_ATIVIDADE = ATV.COD_ATIVIDADE
                  INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                  WHERE E.COD_EXECUCAO = \''.$this->Populate('codExecucao','S').'\'
                  GROUP BY EC.COD_EXECUCAO_COMPLEXIDADE,
                           D.DSC_DISCIPLINA,
                           ATV.DSC_ATIVIDADE,
                           ART.DSC_ARTEFATO,
                           CX.DSC_COMPLEXIDADE,
                           CM.DSC_COMPONENTE,
                           CC.QTD_PONTOS ';
        return $this->selectDB($sql, false);
    }

    Public Function UpdateExecucao(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertExecucao(stdClass $obj) {
        return $this->MontarInsert($obj);
    }

    Public Function DeleteExecucao(stdClass $obj) {
        $sql = 'DELETE FROM EXECUCAO_ARQUIVOS WHERE COD_EXECUCAO_COMPLEXIDADE IN (SELECT COD_EXECUCAO_COMPLEXIDADE FROM EXECUCAO_COMPLEXIDADE WHERE COD_EXECUCAO = '.$this->Populate('codExecucao', 'I').')';
        $this->insertDB($sql);
        $sql = 'DELETE FROM EXECUCAO_COMPLEXIDADE WHERE COD_EXECUCAO = '.$this->Populate('codExecucao', 'I');
        $this->insertDB($sql);
        $sql = 'DELETE FROM EXECUCAO WHERE COD_EXECUCAO = '.$this->Populate('codExecucao', 'I');
        return $this->insertDB($sql);
        
    }
}