<?php
include_once("Controller/BaseController.php");
include_once("Model/Complexidade/ComplexidadeModel.php");
class ComplexidadeController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Complexidade
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarComplexidade() {
        $ComplexidadeModel = new ComplexidadeModel();
        echo $ComplexidadeModel->ListarComplexidade();
    }

    Public Function ListarComplexidadeCombo() {
        $ComplexidadeModel = new ComplexidadeModel();
        echo $ComplexidadeModel->ListarComplexidadeCombo();
    }

    Public Function ListarComplexidadePorAtividadeArtefatoCombo() {
        $ComplexidadeModel = new ComplexidadeModel();
        echo $ComplexidadeModel->ListarComplexidadePorAtividadeArtefatoCombo();
    }
    
    Public Function InsertComplexidade() {
        $ComplexidadeModel = new ComplexidadeModel();
        echo $ComplexidadeModel->InsertComplexidade();
    }

    Public Function UpdateComplexidade() {
        $ComplexidadeModel = new ComplexidadeModel();
        echo $ComplexidadeModel->UpdateComplexidade();
    }
}