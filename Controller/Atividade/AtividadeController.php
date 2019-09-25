<?php
include_once("Controller/BaseController.php");
include_once("Model/Atividade/AtividadeModel.php");
class AtividadeController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Atividade
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarAtividade() {
        $AtividadeModel = new AtividadeModel();
        echo $AtividadeModel->ListarAtividade();
    }

    Public Function ListarAtividadeCombo() {
        $AtividadeModel = new AtividadeModel();
        echo $AtividadeModel->ListarAtividadeCombo();
    }

    Public Function ListarAtividadeComboPorDisciplina() {
        $AtividadeModel = new AtividadeModel();
        echo $AtividadeModel->ListarAtividadeComboPorDisciplina();
    }
    
    Public Function InsertAtividade() {
        $AtividadeModel = new AtividadeModel();
        echo $AtividadeModel->InsertAtividade();
    }

    Public Function UpdateAtividade() {
        $AtividadeModel = new AtividadeModel();
        echo $AtividadeModel->UpdateAtividade();
    }
}