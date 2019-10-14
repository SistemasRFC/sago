<?php
include_once("Controller/BaseController.php");
include_once("Model/RelatorioPontuacaoUsuario/RelatorioPontuacaoUsuarioModel.php");
class RelatorioPontuacaoUsuarioController  extends BaseController{
    
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }
    
    Public Function ListarRelatorioPontuacaoUsuario(){
        $RelatorioPontuacaoUsuarioModel = new RelatorioPontuacaoUsuarioModel();
        echo $RelatorioPontuacaoUsuarioModel->ListarRelatorioPontuacaoUsuario();
    }
}
