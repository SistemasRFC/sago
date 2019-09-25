<?php
include_once("Controller/BaseController.php");
include_once("Model/Execucao/ExecucaoModel.php");
class ExecucaoController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Execucao
     */
    Public Function ChamaView() {
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->ListarExecucao();
    }

    Public Function ListarExecucaoPorOf() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->ListarExecucaoPorOf();
    }
    
    Public Function InsertExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->InsertExecucao();
    }

    Public Function UpdateExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->UpdateExecucao();
    }

    Public Function DeleteExecucao() {
        $ExecucaoModel = new ExecucaoModel();
        echo $ExecucaoModel->DeleteExecucao();
    }

    Public Function ListarMeses() {
        $meses = array( ['ID'=>1, 'DSC'=>'Janeiro'],
                        ['ID'=>2, 'DSC'=>'Fevereiro'],
                        ['ID'=>3, 'DSC'=>'Março'],
                        ['ID'=>4, 'DSC'=>'Abril'],
                        ['ID'=>5, 'DSC'=>'Maio'],
                        ['ID'=>6, 'DSC'=>'Junho'],
                        ['ID'=>7, 'DSC'=>'Julho'],
                        ['ID'=>8, 'DSC'=>'Agosto'],
                        ['ID'=>9, 'DSC'=>'Setembro'],
                        ['ID'=>10, 'DSC'=>'Outubro'],
                        ['ID'=>11, 'DSC'=>'Novembro'],
                        ['ID'=>12, 'DSC'=>'Dezembro']);
        echo json_encode(array(true, $meses));
    }

    Public Function ListarAnos() {
        $anos = array( ['ID'=>date('Y')-1, 'DSC'=>date('Y')-1],
                       ['ID'=>date('Y'), 'DSC'=>date('Y')],
                       ['ID'=>date('Y')+1, 'DSC'=>date('Y')+1]);
        echo json_encode(array(true, $anos));
    }
}