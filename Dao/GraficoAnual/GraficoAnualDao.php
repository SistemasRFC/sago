<?php

include_once("Dao/BaseDao.php");

class GraficoAnualDao extends BaseDao{
    
    Protected $tableName = "";

    Protected $columns = array ("codUsuario"            => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "nroAnoReferencia"      => array("column" =>"NRO_ANO_REFERENCIA", "typeColumn" =>"I"));

    Protected $columnKey = array();

    Public Function ListarGraficoAnual(stdClass $obj){
        $sql = ' SELECT NRO_MES_REFERENCIA,
                        SUM(QTD_TOTAL_PONTOS) AS QTD_TOTAL_PONTOS
                   FROM (SELECT E.NRO_MES_REFERENCIA,
                                        EC.COD_EXECUCAO_COMPLEXIDADE,
                                        CC.QTD_PONTOS*COUNT(EA.COD_EXECUCAO_ARQUIVO) AS QTD_TOTAL_PONTOS
                                   FROM EXECUCAO E
                                  INNER JOIN EXECUCAO_COMPLEXIDADE EC ON E.COD_EXECUCAO = EC.COD_EXECUCAO
                                  INNER JOIN EXECUCAO_ARQUIVOS EA ON EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                                  INNER JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                                  WHERE NRO_ANO_REFERENCIA = '.$obj->nroAnoReferencia.'
                                    AND COD_USUARIO = '.$obj->codUsuario.'
                                  GROUP BY E.NRO_MES_REFERENCIA, EC.COD_EXECUCAO_COMPLEXIDADE) AS X
                  GROUP BY NRO_MES_REFERENCIA
                  ORDER BY NRO_MES_REFERENCIA';
        return $this->selectDB($sql, false);
    }
}
