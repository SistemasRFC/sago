<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - Cadastro de Atividades</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/AtividadeView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" class="persist">
        <div class="card" style="max-width: 810px;">
            <div class="cabecalho">Cadastro de Atividades</div>
            
            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="btnNovo" value="Nova Atividade" class="button">
            </div>
            
            <div class="titulo">
                <div id="listaAtividade"></div>
            </div>
        </div>
        <div id="CadAtividade">
            <div id="windowHeader"></div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once "CadAtividadeView.php";?>
            </div>            
        </div>
  </body>
</html>
