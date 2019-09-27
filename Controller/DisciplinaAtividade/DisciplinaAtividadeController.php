<?php
include_once("Controller/BaseController.php");
include_once("Model/DisciplinaAtividade/DisciplinaAtividadeModel.php");
class DisciplinaAtividadeController extends BaseController
{
    /**
     * Redireciona para a Tela de  de DisciplinaAtividade
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarDisciplinaAtividade() {
        $DisciplinaAtividadeModel = new DisciplinaAtividadeModel();
        echo $DisciplinaAtividadeModel->ListarDisciplinaAtividade();
    }

    Public Function ListarDisciplinaAtividadePorDisciplina() {
        $DisciplinaAtividadeModel = new DisciplinaAtividadeModel();
        echo $DisciplinaAtividadeModel->ListarDisciplinaAtividadePorDisciplina();
    }

    Public Function ListarDisciplinaAtividadeCombo() {
        $DisciplinaAtividadeModel = new DisciplinaAtividadeModel();
        echo $DisciplinaAtividadeModel->ListarDisciplinaAtividadeCombo();
    }
    
    Public Function InsertDisciplinaAtividade() {
        $DisciplinaAtividadeModel = new DisciplinaAtividadeModel();
        echo $DisciplinaAtividadeModel->InsertDisciplinaAtividade();
    }

    Public Function UpdateDisciplinaAtividade() {
        $DisciplinaAtividadeModel = new DisciplinaAtividadeModel();
        echo $DisciplinaAtividadeModel->UpdateDisciplinaAtividade();
    }
}