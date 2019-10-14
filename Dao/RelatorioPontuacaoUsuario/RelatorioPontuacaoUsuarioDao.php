<?php

include_once("Dao/BaseDao.php");

class RelatorioPontuacaoUsuarioDao extends BaseDao{
    
    Protected $tableName = "";

    Protected $columns = array ("nroMesReferencia"      => array("column" =>"NRO_MES_REFERENCIA", "typeColumn" =>"I"),
                                "nroAnoReferencia"      => array("column" =>"NRO_ANO_REFERENCIA", "typeColumn" =>"I"));

    Protected $columnKey = array();

    Public Function ListarRelatorioPontuacaoUsuario(stdClass $obj){
        $sql = ' SELECT NME_USUARIO_COMPLETO,
                        SUM(QTD_TOTAL_PONTOS) AS QTD_TOTAL_PONTOS
                   FROM (SELECT U.COD_USUARIO,
                                U.NME_USUARIO_COMPLETO,
                                        EC.COD_EXECUCAO_COMPLEXIDADE,
                                        CC.QTD_PONTOS*COUNT(EA.COD_EXECUCAO_ARQUIVO) AS QTD_TOTAL_PONTOS
                                   FROM EXECUCAO E
                                  INNER JOIN EXECUCAO_COMPLEXIDADE EC ON E.COD_EXECUCAO = EC.COD_EXECUCAO
                                  INNER JOIN EXECUCAO_ARQUIVOS EA ON EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                                  INNER JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                                  INNER JOIN SE_USUARIO U ON E.COD_USUARIO = U.COD_USUARIO
                                  WHERE E.NRO_MES_REFERENCIA = '.$obj->nroMesReferencia.'
                                    AND E.NRO_ANO_REFERENCIA = '.$obj->nroAnoReferencia.'
                                  GROUP BY E.NRO_MES_REFERENCIA, EC.COD_EXECUCAO_COMPLEXIDADE, U.COD_USUARIO) AS X
                  GROUP BY NME_USUARIO_COMPLETO            
                  ORDER BY QTD_TOTAL_PONTOS';
        return $this->selectDB($sql, false);
    }
}
