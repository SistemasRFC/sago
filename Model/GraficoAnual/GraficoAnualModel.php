<?php

include_once("Model/BaseModel.php");
include_once("Dao/GraficoAnual/GraficoAnualDao.php");
include_once("Dao/ExecucaoComplexidade/ExecucaoComplexidadeDao.php");
include_once("Dao/ExecucaoArquivos/ExecucaoArquivosDao.php");
include_once("Resources/php/FuncoesData.php");

class GraficoAnualModel extends BaseModel{
    
    Public Function ListarGraficoAnual(){
        $dao = new GraficoAnualDao();
        BaseModel::PopulaObjetoComRequest($dao->getColumns());
        $lista = $dao->ListarGraficoAnual($this->objRequest);
        
        $totalRegistros = count($lista[1]);
        for ($i=1;$i<=12;$i++){
            $achou = false;
            for($j=0;$j<$totalRegistros;$j++){
                if ($i==$lista[1][$j]['NRO_MES_REFERENCIA']){
                    $achou=true;
                    $retorno[$i-1] = $lista[1][$j];
                }
            }
            if (!$achou){
                $retorno[$i-1][0] = $i;
                $retorno[$i-1][1] = 0;
                $retorno[$i-1]['NRO_MES_REFERENCIA'] = $i;
                $retorno[$i-1]['QTD_TOTAL_PONTOS'] = 0;
            }
        }
        $lista[1] = $retorno;
        return json_encode($lista);
    }
}
