<?php
include_once("Controller/BaseController.php");
include_once("Model/Artefato/ArtefatoModel.php");
class ArtefatoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Artefato
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarArtefato() {
        $ArtefatoModel = new ArtefatoModel();
        echo $ArtefatoModel->ListarArtefato();
    }

    Public Function ListarArtefatoCombo() {
        $ArtefatoModel = new ArtefatoModel();
        echo $ArtefatoModel->ListarArtefatoCombo();
    }

    Public Function ListarArtefatoPorDisciplinaAtividadeCombo() {
        $ArtefatoModel = new ArtefatoModel();
        echo $ArtefatoModel->ListarArtefatoPorDisciplinaAtividadeCombo();
    }
    
    Public Function InsertArtefato() {
        $ArtefatoModel = new ArtefatoModel();
        echo $ArtefatoModel->InsertArtefato();
    }

    Public Function UpdateArtefato() {
        $ArtefatoModel = new ArtefatoModel();
        echo $ArtefatoModel->UpdateArtefato();
    }
}