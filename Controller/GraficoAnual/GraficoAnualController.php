<?php
include_once("Controller/BaseController.php");
include_once("Model/GraficoAnual/GraficoAnualModel.php");
class GraficoAnualController  extends BaseController{
    
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }
    
    Public Function ListarGraficoAnual(){
        $GraficoAnualModel = new GraficoAnualModel();
        echo $GraficoAnualModel->ListarGraficoAnual();
    }
}
