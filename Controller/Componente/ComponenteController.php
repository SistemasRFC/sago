<?php
include_once("Controller/BaseController.php");
include_once("Model/Componente/ComponenteModel.php");
class ComponenteController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Componente
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarComponente() {
        $ComponenteModel = new ComponenteModel();
        echo $ComponenteModel->ListarComponente();
    }

    Public Function ListarComponenteCombo() {
        $ComplexidadeModel = new ComponenteModel();
        echo $ComplexidadeModel->ListarComponenteCombo();
    }

    Public Function ListarComponentePorArtefatoComplexidadeCombo() {
        $ComplexidadeModel = new ComponenteModel();
        echo $ComplexidadeModel->ListarComponentePorArtefatoComplexidadeCombo();
    }
    
    Public Function InsertComponente() {
        $ComponenteModel = new ComponenteModel();
        echo $ComponenteModel->InsertComponente();
    }

    Public Function UpdateComponente() {
        $ComponenteModel = new ComponenteModel();
        echo $ComponenteModel->UpdateComponente();
    }
}