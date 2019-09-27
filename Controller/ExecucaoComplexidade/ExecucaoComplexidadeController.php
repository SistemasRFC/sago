<?php
include_once("Controller/BaseController.php");
include_once("Model/ExecucaoComplexidade/ExecucaoComplexidadeModel.php");
class ExecucaoComplexidadeController extends BaseController
{
    /**
     * Redireciona para a Tela de  de ExecucaoComplexidade
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarExecucaoComplexidade() {
        $ExecucaoComplexidadeModel = new ExecucaoComplexidadeModel();
        echo $ExecucaoComplexidadeModel->ListarExecucaoComplexidade();
    }
    
    Public Function InsertExecucaoComplexidade() {
        $ExecucaoComplexidadeModel = new ExecucaoComplexidadeModel();
        echo $ExecucaoComplexidadeModel->InsertExecucaoComplexidade();
    }

    Public Function UpdateExecucaoComplexidade() {
        $ExecucaoComplexidadeModel = new ExecucaoComplexidadeModel();
        echo $ExecucaoComplexidadeModel->UpdateExecucaoComplexidade();
    }

    Public Function ClonarDados() {
        $ExecucaoComplexidadeModel = new ExecucaoComplexidadeModel();
        echo $ExecucaoComplexidadeModel->ClonarDados();
    }

    Public Function DeleteExecucaoComplexidade() {
        $ExecucaoComplexidadeModel = new ExecucaoComplexidadeModel();
        echo $ExecucaoComplexidadeModel->DeleteExecucaoComplexidade();
    }
}