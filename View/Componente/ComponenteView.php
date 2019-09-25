<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>Cadastro de Componentes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/ComponenteView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" class="persist">
        <div class="card" style="max-width: 810px;">
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
        <div id='jqxMenu' style="display: none;">
            <ul>
                <li><a href="#">Novo</a></li>
                <li><a href="#">Editar</a></li>            
            </ul>
        </div>
  </body>
</html>
