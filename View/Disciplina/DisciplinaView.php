<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - Cadastro de Disciplina</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/DisciplinaView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" class="persist">
        <div class="card" style="max-width: 810px;">
            <div class="cabecalho">Cadastro de Disciplinas</div>
            
            <div class="titulo" style="margin-bottom: 30px;">
                <input type="button" id="btnNovo" value="Nova Disciplina" class="button">
            </div>
            
            <div class="titulo">
                <div id="listaDisciplina"></div>
            </div>
        </div>
        <div id="CadDisciplina">
            <div id="windowHeader"></div>
            <div style="overflow: hidden;" id="windowContent">
                <?php include_once "CadDisciplinaView.php";?>
            </div>            
        </div>
  </body>
</html>
