<?php
include_once("Controller/BaseController.php");
include_once("Model/AtividadeArtefato/AtividadeArtefatoModel.php");
class AtividadeArtefatoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de AtividadeArtefato
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarAtividadeArtefato() {
        $AtividadeArtefatoModel = new AtividadeArtefatoModel();
        echo $AtividadeArtefatoModel->ListarAtividadeArtefato();
    }

    Public Function ListarAtividadeArtefatoPorDisciplinaAtividade() {
        $AtividadeArtefatoModel = new AtividadeArtefatoModel();
        echo $AtividadeArtefatoModel->ListarAtividadeArtefatoPorDisciplinaAtividade();
    }
    
    Public Function ListarDisciplinaAtividadeArtefatoCombo(){
        $AtividadeArtefatoModel = new AtividadeArtefatoModel();
        echo $AtividadeArtefatoModel->ListarDisciplinaAtividadeArtefatoCombo();        
    }
    
    Public Function InsertAtividadeArtefato() {
        $AtividadeArtefatoModel = new AtividadeArtefatoModel();
        echo $AtividadeArtefatoModel->InsertAtividadeArtefato();
    }

    Public Function UpdateAtividadeArtefato() {
        $AtividadeArtefatoModel = new AtividadeArtefatoModel();
        echo $AtividadeArtefatoModel->UpdateAtividadeArtefato();
    }
}