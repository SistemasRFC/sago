<?php
include_once("Controller/BaseController.php");
include_once("Model/Execucao/ExecucaoModel.php");
class ExecucaoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Execucao
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->ListarExecucao();
    }

    Public Function ListarExecucaoPorOf() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->ListarExecucaoPorOf();
    }
    
    Public Function InsertExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->InsertExecucao();
    }

    Public Function UpdateExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->UpdateExecucao();
    }

    Public Function DeleteExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->DeleteExecucao();
    }
}