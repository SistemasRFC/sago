<?php
include_once("Controller/BaseController.php");
include_once("Model/MenuPrincipal/MenuPrincipalModel.php");

class MenuPrincipalController extends BaseController {

    Public Function ChamaView(){
        $params = array();        
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));        
    }
    
    function CarregaMenu() {
        $menuModel = new MenuPrincipalModel();
        $menuModel->carregaAtalhos($this->getPath());
        $menuModel->carregaDadosUsuario();
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function VerificaSessao() {
        if (!isset($_SESSION['cod_usuario'])) {
            echo json_encode(array(0=>true, 1=>false));
        } else {
            echo json_encode(array(0=>true, 1=>true));
        }
    }

    Public Function CarregaMenuNew() {
        $menuModel = new MenuPrincipalModel();
        echo $menuModel->CarregaMenuNew($this->getPath());
    }

}
?>