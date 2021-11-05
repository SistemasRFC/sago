<?php
include_once("Model/BaseModel.php");
include_once("Dao/MenuPrincipal/MenuPrincipalDao.php");
include_once("Resources/php/FuncoesArray.php");
include_once("Resources/php/FuncoesMoeda.php");

class MenuPrincipalModel extends BaseModel
{
    function MenuPrincipalModel(){
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    /**
     * Carrega o menu principal
     * @param type $codUsuario
     * @param type $codMenuPai 
     */
    function carregaMenu($codMenuPai,
                         $path){
        $dao = new MenuPrincipalDao();
        $menuPai = $dao->CarregaMenu($_SESSION['cod_usuario'], $codMenuPai, $path);
        $menuFilho = array();
        if (!$menuPai[1]==null){
            for($i=0;$i<count($menuPai[1]);$i++){
                $dados = $dao->CarregaMenu($_SESSION['cod_usuario'], $menuPai[1][$i]['COD_MENU_W'], $path);
                for($j=0;$j<count($dados[1]);$j++){
                    array_push($menuFilho, $dados[1][$j]);
                }
            }
            $_SESSION['menuPai'] = $menuPai[1];
            $_SESSION['menuFilho'] = $menuFilho[1];
        }else{
            $_SESSION['menuPai'] = '';
            $_SESSION['menuFilho'] = '';
        }
    }

    function CarregaMenuNew($path){
        $dao = new MenuPrincipalDao();
        $listaAtualizada = $dao->CarregaMenuNew($_SESSION['cod_usuario'], $path);
//        $listaAtualizada = FuncoesArray::RecursiveArrayUtf8Encode($result);
        return json_encode($listaAtualizada);
    }

    function CarregaController($codMenu, $path){
        $dao = new MenuPrincipalDao();
        $controller = $dao->CarregaController($codMenu, $path);
        if ($controller->NME_METHOD!=''){
            return json_encode($controller->NME_CONTROLLER."?method=".$rs_localiza->NME_METHOD);
        }else{
            return json_encode('#');
        }
    }

    Public Function CarregaDadosUsuario(){
        $dao = new MenuPrincipalDao();
        $_SESSION['DadosUsuario'] = $dao->CarregaDadosUsuario($_SESSION['cod_usuario']);
    }

    Public Function BuscarDadosIniciais() {
        $dao = new MenuPrincipalDao();
        $lista = $dao->BuscarDados($_SESSION['cod_usuario']);
        $mes = date('m');
        $ano = date('Y');
        if ($mes==12){
            $mes=1;
            $ano++;
        }
        $listaPontosMes = $dao->BuscarPontuacaoMesAtual($_SESSION['cod_usuario'], $mes, $ano);
        $lista[1]['PONTUACAO_MES_ATUAL'] = $listaPontosMes[1];
        $listaPontosSemestre = $dao->BuscarPontuacaoSemestreAtual($_SESSION['cod_usuario']);
        $lista[1]['PONTUACAO_SEMESTRE_ATUAL'] = $listaPontosSemestre[1];

        return json_encode($lista);
    }
}
?>
