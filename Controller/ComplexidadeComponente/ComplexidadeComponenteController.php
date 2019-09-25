<?php
include_once("Controller/BaseController.php");
include_once("Model/ComplexidadeComponente/ComplexidadeComponenteModel.php");
class ComplexidadeComponenteController extends BaseController
{
    /**
     * Redireciona para a Tela de  de ComplexidadeComponente
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarComplexidadeComponente() {
        $ComplexidadeComponenteModel = new ComplexidadeComponenteModel();
        echo $ComplexidadeComponenteModel->ListarComplexidadeComponente();
    }

    Public Function ListarComplexidadeComponentePorArtefatoComplexidade() {
        $ComplexidadeComponenteModel = new ComplexidadeComponenteModel();
        echo $ComplexidadeComponenteModel->ListarComplexidadeComponentePorArtefatoComplexidade();
    }
    
    Public Function InsertComplexidadeComponente() {
        $ComplexidadeComponenteModel = new ComplexidadeComponenteModel();
        echo $ComplexidadeComponenteModel->InsertComplexidadeComponente();
    }

    Public Function UpdateComplexidadeComponente() {
        $ComplexidadeComponenteModel = new ComplexidadeComponenteModel();
        echo $ComplexidadeComponenteModel->UpdateComplexidadeComponente();
    }
}