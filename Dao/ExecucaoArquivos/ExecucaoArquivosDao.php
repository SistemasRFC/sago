<?php
include_once("Dao/BaseDao.php");
class ExecucaoArquivosDao extends BaseDao
{
    Protected $tableName = "EXECUCAO_ARQUIVOS";

    Protected $columns = array ("nmeArquivo"                => array("column" => "NME_ARQUIVO",                 "typeColumn" => "S"),
                                "codExecucaoComplexidade"   => array("column" => "COD_EXECUCAO_COMPLEXIDADE",   "typeColumn" => "I"),
                                "txtDescricaoJustificativa" => array("column" => "TXT_DESCRICAO_JUSTIFICATIVA", "typeColumn" => "S"),
                                "txtReferenciaAtividade"    => array("column" => "TXT_REFERENCIA_ATIVIDADE",    "typeColumn" => "S"));

    Protected $columnKey = array("codExecucaoArquivo"=> array("column" =>"COD_EXECUCAO_ARQUIVO", "typeColumn" => "I"));

    Public Function ExecucaoArquivosDao() {
        $this->conect();
    }

    Public Function ListarExecucaoArquivos(stdClass $obj) {
        return $this->MontarSelect("WHERE COD_EXECUCAO_COMPLEXIDADE = ".$obj->codExecucaoComplexidade);
    }

    Public Function UpdateExecucaoArquivos(stdClass $obj) {
        return $this->MontarUpdate($obj);
    }

    Public Function InsertExecucaoArquivos(stdClass $obj) {
        return $this->MontarInsert($obj);
    }

    Public Function DeleteExecucaoArquivos(stdClass $obj) {
        $sql = 'DELETE FROM EXECUCAO_ARQUIVOS WHERE COD_EXECUCAO_ARQUIVO = '.$this->Populate('codExecucaoArquivo', 'I');
        return $this->insertDB($sql);
    }

    Public Function VerificaArquivoExistente(stdClass $obj) {
        $sql = "SELECT COUNT(*) AS QTD 
                  FROM EXECUCAO_ARQUIVOS EA
                 INNER JOIN EXECUCAO_COMPLEXIDADE EC 
                    ON EA.COD_EXECUCAO_COMPLEXIDADE=EC.COD_EXECUCAO_COMPLEXIDADE
                 INNER JOIN EXECUCAO E 
                    ON EC.COD_EXECUCAO = E.COD_EXECUCAO
                 WHERE EA.NME_ARQUIVO='".$obj->nmeArquivo."'
                   AND COALESCE(EA.TXT_DESCRICAO_JUSTIFICATIVA,'')= '".$obj->txtDescricaoJustificativa."' 
                   AND E.COD_EXECUCAO=".$obj->codExecucao;
        return $this->selectDB($sql, false);
                
    }
}