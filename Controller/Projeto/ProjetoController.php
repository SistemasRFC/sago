<?php
include_once("Controller/BaseController.php");
include_once("Model/Projeto/ProjetoModel.php");
class ProjetoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Projeto
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarProjeto() {
        $ProjetoModel = new ProjetoModel();
        echo $ProjetoModel->ListarProjeto();
    }
    
    Public Function InsertProjeto() {
        $ProjetoModel = new ProjetoModel();
        echo $ProjetoModel->InsertProjeto();
    }

    Public Function UpdateProjeto() {
        $ProjetoModel = new ProjetoModel();
        echo $ProjetoModel->UpdateProjeto();
    }
    
    Public Function ListarProjetoAtivo(){
        $ProjetoModel = new ProjetoModel();
        echo $ProjetoModel->ListarProjetoAtivo();        
    }
}