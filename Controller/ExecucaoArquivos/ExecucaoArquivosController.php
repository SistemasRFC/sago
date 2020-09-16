<?php
include_once("Controller/BaseController.php");
include_once("Model/ExecucaoArquivos/ExecucaoArquivosModel.php");
class ExecucaoArquivosController extends BaseController
{
    /**
     * Redireciona para a Tela de  de ExecucaoArquivos
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarExecucaoArquivos() {
        $ExecucaoArquivosModel = new ExecucaoArquivosModel();
        echo $ExecucaoArquivosModel->ListarExecucaoArquivos();
    }
    
    Public Function InsertExecucaoArquivos() {
        $ExecucaoArquivosModel = new ExecucaoArquivosModel();
        echo $ExecucaoArquivosModel->InsertExecucaoArquivos();
    }

    Public Function UpdateExecucaoArquivos() {
        $ExecucaoArquivosModel = new ExecucaoArquivosModel();
        echo $ExecucaoArquivosModel->UpdateExecucaoArquivos();
    }

    Public Function DeleteExecucaoArquivos() {
        $ExecucaoArquivosModel = new ExecucaoArquivosModel();
        echo $ExecucaoArquivosModel->DeleteExecucaoArquivos();
    }
    
    Public Function VerificaArquivoExistente(){
        $ExecucaoArquivosModel = new ExecucaoArquivosModel();
        echo $ExecucaoArquivosModel->VerificaArquivoExistente();
    }
}