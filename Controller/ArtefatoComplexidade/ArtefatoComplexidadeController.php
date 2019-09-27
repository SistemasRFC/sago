<?php
include_once("Controller/BaseController.php");
include_once("Model/ArtefatoComplexidade/ArtefatoComplexidadeModel.php");
class ArtefatoComplexidadeController extends BaseController
{
    /**
     * Redireciona para a Tela de  de ArtefatoComplexidade
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarArtefatoComplexidade() {
        $ArtefatoComplexidadeModel = new ArtefatoComplexidadeModel();
        echo $ArtefatoComplexidadeModel->ListarArtefatoComplexidade();
    }

    Public Function ListarArtefatoComplexidadePorAtividadeArtefato() {
        $ArtefatoComplexidadeModel = new ArtefatoComplexidadeModel();
        echo $ArtefatoComplexidadeModel->ListarArtefatoComplexidadePorAtividadeArtefato();
    }
    
    Public Function InsertArtefatoComplexidade() {
        $ArtefatoComplexidadeModel = new ArtefatoComplexidadeModel();
        echo $ArtefatoComplexidadeModel->InsertArtefatoComplexidade();
    }

    Public Function UpdateArtefatoComplexidade() {
        $ArtefatoComplexidadeModel = new ArtefatoComplexidadeModel();
        echo $ArtefatoComplexidadeModel->UpdateArtefatoComplexidade();
    }
}