<?php
include_once("Dao/BaseDao.php");
class ExecucaoArquivosDao extends BaseDao
{
    Protected $tableName = "EXECUCAO_ARQUIVOS";

    Protected $columns = array ("nmeArquivo"   => array("column" =>"NME_ARQUIVO", "typeColumn" =>"S"),
                                "codExecucaoComplexidade"   => array("column" =>"COD_EXECUCAO_COMPLEXIDADE", "typeColumn" =>"I"));

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
}