<?php 
include_once '../../constantes.php';
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - Cadastro de Menus</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/CadastroMenuView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" class="persist">
        <div class="card" style="max-width: 810px;">
            <div class="cabecalho">Cadastro de Menus</div>
            
            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="btnNovo" value="Novo Menu" class="button-novo">
            </div>
            
            <div class="titulo">
                <div id="listaMenus"></div>
            </div>
        </div>
        <div id="CadMenus">
            <div id="windowHeader"></div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once "CadMenuView.php";?>
            </div>            
        </div>
        <div id="ListaController">
            <div id="windowHeader"></div>
            <div id="windowContent">
                <?php include_once "ListaControllerView.php";?>
            </div>            
        </div>  
        <div id="ListaMetodos">
            <div id="windowHeader"></div>
            <div id="windowContent">
                <?php include_once "ListaMetodosView.php";?>
            </div>            
        </div>
  </body>
</html>
