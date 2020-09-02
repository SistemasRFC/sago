<?php
include_once("Dao/BaseDao.php");
class ExecucaoComplexidadeDao extends BaseDao
{
    Protected $tableName = "EXECUCAO_COMPLEXIDADE";

    Protected $columns = array ("codExecucao"   => array("column" =>"COD_EXECUCAO", "typeColumn" =>"I"),
                                "codComplexidadeComponente"   => array("column" =>"COD_COMPLEXIDADE_COMPONENTE", "typeColumn" =>"I"),
                                "dtaRegistro"   => array("column" =>"DTA_REGISTRO", "typeColumn" =>"D"));

    Protected $columnKey = array("codExecucaoComplexidade"=> array("column" =>"COD_EXECUCAO_COMPLEXIDADE", "typeColumn" => "I"));

    Public Function ExecucaoComplexidadeDao() {
        $this->conect();
    }

    Public Function ListarExecucaoComplexidade() {
        return $this->MontarSelect();
    }

    Public Function ListarExecucaoComplexidadePorExecucao(stdClass $obj) {
        $sql = ' SELECT EC.COD_EXECUCAO_COMPLEXIDADE,
                        EC.DTA_REGISTRO,
                        CC.QTD_PONTOS,
                        CMP.DSC_COMPONENTE,
                        CPX.DSC_COMPLEXIDADE,
                        COALESCE(AA.COD_TAREFA, \'\') AS COD_TAREFA,
                        ART.DSC_ARTEFATO,
                        ATV.DSC_ATIVIDADE,
                        D.DSC_DISCIPLINA
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
                  WHERE COD_EXECUCAO = '.$obj->codExecucao.'
				  ORDER BY EC.DTA_REGISTRO';
        return $this->selectDB($sql, false);
    }

    Public Function UpdateExecucaoComplexidade(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertExecucaoComplexidade(stdClass $obj) {
        $codigo = $this->CatchUltimoCodigo($this->tableName, $this->columnKey[key($this->columnKey)]['column']);
        $sql = "INSERT INTO EXECUCAO_COMPLEXIDADE (COD_EXECUCAO_COMPLEXIDADE, COD_EXECUCAO, COD_COMPLEXIDADE_COMPONENTE, DTA_REGISTRO)
                VALUES (".$codigo.",
                        ".$obj->codExecucao.",
                        ".$obj->codComplexidadeComponente.",
                        NOW())";
        $result = $this->insertDB($sql);
        $result[2] = $codigo;
        return $result;
    }

    Public Function ClonarDados(stdClass $obj) {
        $codigo = $this->CatchUltimoCodigo('EXECUCAO_COMPLEXIDADE', 'COD_EXECUCAO_COMPLEXIDADE');
        
        $sql = 'INSERT INTO EXECUCAO_COMPLEXIDADE 
                SELECT '.$codigo.',
                       COD_EXECUCAO,
                       COD_COMPLEXIDADE_COMPONENTE,
                       NOW()
                  FROM EXECUCAO_COMPLEXIDADE
                 WHERE COD_EXECUCAO_COMPLEXIDADE = '.$this->Populate('codExecucaoComplexidade', 'I');
        return $this->insertDB($sql);
    }

    Public Function DeleteExecucaoComplexidade(stdClass $obj) {
        $sql = 'DELETE FROM EXECUCAO_ARQUIVOS WHERE COD_EXECUCAO_COMPLEXIDADE = '.$this->Populate('codExecucaoComplexidade', 'I');
        $this->insertDB($sql);
        $sql = 'DELETE FROM EXECUCAO_COMPLEXIDADE WHERE COD_EXECUCAO_COMPLEXIDADE = '.$this->Populate('codExecucaoComplexidade', 'I');
        return $this->insertDB($sql);
    }
}