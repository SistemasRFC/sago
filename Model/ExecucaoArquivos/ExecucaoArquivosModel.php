<?php
include_once("Model/BaseModel.php");
include_once("Model/ExecucaoComplexidade/ExecucaoComplexidadeModel.php");
include_once("Dao/ExecucaoArquivos/ExecucaoArquivosDao.php");
class ExecucaoArquivosModel extends BaseModel
{
    public function ExecucaoArquivosModel() {
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarExecucaoArquivos($Json=true) {
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $lista = $dao->ListarExecucaoArquivos($this->objRequest);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;
        }
    }

    Public Function InsertExecucaoArquivos() {
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->InsertExecucaoArquivos($this->objRequest);
        return json_encode($result);
    }

    Public Function InsertMultiploExecucaoArquivos() {
        $dao = new ExecucaoArquivosDao();
        $modelExecucaoComplexidade = new ExecucaoComplexidadeModel();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $listaArquivos = $dao->Populate("listaArquivos", "S");
        $duplicados = "";
        // var_dump($listaArquivos);
        $arrArquivos = explode('*-*', $listaArquivos);
        // var_dump($arrArquivos);die;
        for($i = 0; $i < count($arrArquivos); $i++) {
            $partes = explode(';', $arrArquivos[$i]);
            if(count($partes)==2){
                $retorno = $this->VerificaArquivoExistenteP($partes[0], $partes[1]);
            } else {
                $retorno = $this->VerificaArquivoExistenteP($partes[0], '');
            }
            if($retorno[0]) {
                if(!isset($this->objRequest->codExecucaoComplexidade) || trim($this->objRequest->codExecucaoComplexidade) == '') {
                    $complexidade = $modelExecucaoComplexidade->InsertExecucaoComplexidade(false);
                    $this->objRequest->codExecucaoComplexidade = $complexidade[2];
                }
                $result = $dao->InsertExecucaoArquivos($this->objRequest);
            } else {
                $duplicados .= "- ".$retorno[1]. "\n";
            }
        }
        $result[3] = $duplicados;

        // $result = $dao->InsertMultiploExecucaoArquivos($this->objRequest);
        return json_encode($result);
    }
    
    Private Function VerificaArquivoExistenteP($nmeArquivo, $txtJustificativa){
        $dao = new ExecucaoArquivosDao();
        $this->objRequest->codExecucao = $dao->Populate("codExecucao", "I");
        $this->objRequest->nmeArquivo = $nmeArquivo;
        $this->objRequest->txtDescricaoJustificativa = $txtJustificativa;
        $result = $dao->VerificaArquivoExistente($this->objRequest);
        if ($result[0]){
            if ($result[1][0]['QTD']>0){
                $result[0] = false;
                $result[1] = $nmeArquivo;
            }
        }
        return $result;
    }

    Public Function DeleteExecucaoArquivos() {
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $result = $dao->DeleteExecucaoArquivos($this->objRequest);
        return json_encode($result);
    }
    
    Public Function VerificaArquivoExistente(){
        $dao = new ExecucaoArquivosDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $this->objRequest->codExecucao = $dao->Populate("codExecucao", "I");
        if (!isset($this->objRequest->nmeArquivo) || trim($this->objRequest->nmeArquivo) == ''){
            $result[0]=false;
            $result[1]="Nenhum arquivo foi informado!";
            return json_encode($result);
        }
        if (!isset($this->objRequest->txtDescricaoJustificativa)){
            $this->objRequest->txtDescricaoJustificativa='';
        }
        $result = $dao->VerificaArquivoExistente($this->objRequest);
        if ($result[0]){
            if ($result[1][0]['QTD']>0){
                $result[0]=false;
                $result[1]="Já existe este mesmo artefato nesta OF!";
            }
        }
        return json_encode($result);
    }
    
}

