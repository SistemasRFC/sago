<?php
include_once("Controller/BaseController.php");
include_once("Model/RelatorioGerencial/RelatorioGerencialModel.php");
class RelatorioGerencialController  extends BaseController{
    
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }
    
    Public Function ChamaUsuarioView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::getPath()."View/RelatorioGerencial/RelatorioGerencialUsuarioView.php", $params));
    }
    
    Public Function ListarRelatorioGerencial(){
        $RelatorioGerencialModel = new RelatorioGerencialModel();
        echo $RelatorioGerencialModel->ListarRelatorioGerencial();
    }
    
    Public Function GerarExcelSumarizado(){
        $RelatorioGerencialModel = new RelatorioGerencialModel();
        $nomeArquivo = $RelatorioGerencialModel->GerarExcelSumarizado();
        echo $nomeArquivo;
    }
    
    Public Function GerarArquivosOrcamento(){
        $RelatorioGerencialModel = new RelatorioGerencialModel();
        $nomeArquivo = $RelatorioGerencialModel->GerarArquivosOrcamento();
        echo $nomeArquivo;
    }
    
    Public Function GerarJson(){
        $RelatorioGerencialModel = new RelatorioGerencialModel();
        $nomeArquivo = $RelatorioGerencialModel->GerarJson();
        echo $nomeArquivo;
    }
}
