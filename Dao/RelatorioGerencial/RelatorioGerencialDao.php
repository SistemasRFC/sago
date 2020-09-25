<?php

include_once("Dao/BaseDao.php");

class RelatorioGerencialDao extends BaseDao{
    
    Protected $tableName = "";

    Protected $columns = array ("codUsuario"            => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "nroMesReferencia"      => array("column" =>"NRO_MES_REFERENCIA", "typeColumn" =>"I"),
                                "nroAnoReferencia"      => array("column" =>"NRO_ANO_REFERENCIA", "typeColumn" =>"I"));

    Protected $columnKey = array();

    Public Function ListarRelatorioGerencial(stdClass $obj){
        $sql = ' SELECT E.COD_EXECUCAO,
                        E.COD_OF,
                        U.NME_USUARIO_COMPLETO,
                        E.IND_STATUS
                   FROM EXECUCAO E
                  INNER JOIN SE_USUARIO U ON E.COD_USUARIO = U.COD_USUARIO
                  WHERE E.NRO_MES_REFERENCIA = '.$obj->nroMesReferencia.'
                    AND E.NRO_ANO_REFERENCIA = '.$obj->nroAnoReferencia;
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarRelatorioGerencialPorUsuario(stdClass $obj){
        $sql = ' SELECT E.COD_EXECUCAO,
                        E.COD_OF,
                        U.NME_USUARIO_COMPLETO
                   FROM EXECUCAO E
                  INNER JOIN SE_USUARIO U ON E.COD_USUARIO = U.COD_USUARIO
                  WHERE E.COD_USUARIO = '.$obj->codUsuario.'
                    AND E.NRO_MES_REFERENCIA = '.$obj->nroMesReferencia.'
                    AND E.NRO_ANO_REFERENCIA = '.$obj->nroAnoReferencia;
        return $this->selectDB($sql, false);
    }
    
    Public Function GetDadosRelatorioSumarizado(stdClass $obj){
        $sql = 'SELECT COALESCE(AA.COD_TAREFA, \'\') AS COD_TAREFA,
                       CONCAT(\'Disciplina: \', D.DSC_DISCIPLINA) as DISCIPLINA,
                       CONCAT(\'Atividade: \', ATV.DSC_ATIVIDADE) as ATIVIDADE,
                       CONcAT(\'Artefato: \', ART.DSC_ARTEFATO) as ARTEFATO,
                       CONCAT(\'Complexidade: \', CPX.DSC_COMPLEXIDADE) as COMPLEXIDADE,
                       EC.COD_EXECUCAO_COMPLEXIDADE,
                       COUNT(EA.COD_EXECUCAO_ARQUIVO) as TOTAL
                   FROM EXECUCAO_COMPLEXIDADE EC
                  INNER JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                  INNER JOIN COMPONENTE CMP ON CC.COD_COMPONENTE = CMP.COD_COMPONENTE
                  INNER JOIN ARTEFATO_COMPLEXIDADE AC ON CC.COD_ARTEFATO_COMPLEXIDADE = AC.COD_ARTEFATO_COMPLEXIDADE
                  INNER JOIN COMPLEXIDADE CPX ON AC.COD_COMPLEXIDADE = CPX.COD_COMPLEXIDADE
                  INNER JOIN ATIVIDADE_ARTEFATO AA ON AC.COD_ATIVIDADE_ARTEFATO = AA.COD_ATIVIDADE_ARTEFATO
                  INNER JOIN ARTEFATO ART ON AA.COD_ARTEFATO = ART.COD_ARTEFATO
                  INNER JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                  INNER JOIN ATIVIDADE ATV ON DA.COD_ATIVIDADE = ATV.COD_ATIVIDADE
                  INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                  INNER JOIN EXECUCAO_ARQUIVOS EA on EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                  INNER JOIN EXECUCAO E on EC.COD_EXECUCAO = E.COD_EXECUCAO
                  WHERE E.NRO_ANO_REFERENCIA = '.$obj->nroAnoReferencia.' 
                    AND E.NRO_MES_REFERENCIA = '.$obj->nroMesReferencia.'
                    AND E.COD_EXECUCAO = '.$obj->codExecucao.'
                    AND E.IND_STATUS = \'F\'
                  group by AA.COD_TAREFA, D.DSC_DISCIPLINA, ATV.DSC_ATIVIDADE,
                  ART.DSC_ARTEFATO, CPX.DSC_COMPLEXIDADE
                  ORDER by AA.COD_TAREFA, D.DSC_DISCIPLINA, ATV.DSC_ATIVIDADE,
                  ART.DSC_ARTEFATO, CPX.DSC_COMPLEXIDADE';
        return $this->selectDB($sql, false);
    }
    
    Public Function GerarArquivosOrcamento(stdClass $obj){
        $sql = 'SELECT EA.NME_ARQUIVO,
                       EA.TXT_DESCRICAO_JUSTIFICATIVA
                   FROM EXECUCAO_COMPLEXIDADE EC
                  INNER JOIN COMPLEXIDADE_COMPONENTE CC ON EC.COD_COMPLEXIDADE_COMPONENTE = CC.COD_COMPLEXIDADE_COMPONENTE
                  INNER JOIN COMPONENTE CMP ON CC.COD_COMPONENTE = CMP.COD_COMPONENTE
                  INNER JOIN ARTEFATO_COMPLEXIDADE AC ON CC.COD_ARTEFATO_COMPLEXIDADE = AC.COD_ARTEFATO_COMPLEXIDADE
                  INNER JOIN COMPLEXIDADE CPX ON AC.COD_COMPLEXIDADE = CPX.COD_COMPLEXIDADE
                  INNER JOIN ATIVIDADE_ARTEFATO AA ON AC.COD_ATIVIDADE_ARTEFATO = AA.COD_ATIVIDADE_ARTEFATO
                  INNER JOIN ARTEFATO ART ON AA.COD_ARTEFATO = ART.COD_ARTEFATO
                  INNER JOIN DISCIPLINA_ATIVIDADE DA ON AA.COD_DISCIPLINA_ATIVIDADE = DA.COD_DISCIPLINA_ATIVIDADE
                  INNER JOIN ATIVIDADE ATV ON DA.COD_ATIVIDADE = ATV.COD_ATIVIDADE
                  INNER JOIN DISCIPLINA D ON DA.COD_DISCIPLINA = D.COD_DISCIPLINA
                  INNER JOIN EXECUCAO_ARQUIVOS EA on EC.COD_EXECUCAO_COMPLEXIDADE = EA.COD_EXECUCAO_COMPLEXIDADE
                  INNER JOIN EXECUCAO E on EC.COD_EXECUCAO = E.COD_EXECUCAO
                  WHERE E.NRO_ANO_REFERENCIA = '.$obj->nroAnoReferencia.' 
                    AND E.NRO_MES_REFERENCIA = '.$obj->nroMesReferencia.'
                    AND E.COD_EXECUCAO = '.$obj->codExecucao.'
                    AND E.IND_STATUS = \'F\'
                  ORDER by AA.COD_TAREFA, D.DSC_DISCIPLINA, ATV.DSC_ATIVIDADE,
                  ART.DSC_ARTEFATO, CPX.DSC_COMPLEXIDADE';
        return $this->selectDB($sql, false);
    }
}
