<?php
include_once("Controller/BaseController.php");
include_once("Model/Disciplina/DisciplinaModel.php");
class DisciplinaController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Disciplina
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarDisciplina() {
        $DisciplinaModel = new DisciplinaModel();
        echo $DisciplinaModel->ListarDisciplina();
    }
    
    Public Function ListarDisciplinaCombo() {
        $DisciplinaModel = new DisciplinaModel();
        echo $DisciplinaModel->ListarDisciplinaCombo();
    }
    
    Public Function InsertDisciplina() {
        $DisciplinaModel = new DisciplinaModel();
        echo $DisciplinaModel->InsertDisciplina();
    }

    Public Function UpdateDisciplina() {
        $DisciplinaModel = new DisciplinaModel();
        echo $DisciplinaModel->UpdateDisciplina();
    }
}