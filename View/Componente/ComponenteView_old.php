<?php 
include_once '../../constantes.php';
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - Cadastro de Componentes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/ComponenteView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" class="persist">
        <div class="card" style="max-width: 700px;">
            <div class="cabecalho">Cadastro de Componentes</div>
            
            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="btnNovo" value="Novo Componente" class="button">
            </div>
            
            <div class="titulo">
                <div id="listaComponente"></div>
            </div>
        </div>
        <div id="CadComponente">
            <div id="windowHeader"></div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once "CadComponenteView.php";?>
            </div>            
        </div>
  </body>
</html>
