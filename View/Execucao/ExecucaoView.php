<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>Execução de OFs</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/ExecucaoView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" class="persist">
        <input type="hidden" id="codExecucao" name="codExecucao" class="persist">
        <div class="card" style="max-width: 810px;">
            <div class="cabecalho">Cadastro de Execuções</div>
            <div class="titulo">
                <input type="button" id="btnNovaOf" value="Nova OF" class="button">
                <table width="100%" align="left" id='cadNovaOf'>
                    <tr>
                        <td style="padding-top: 0px;">
                            <label for="codDisciplinaAtividade" class="titulo">O.F.</label>
                            <input type="text" name="codOf" id="codOf" class="persist titulo" size='44'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="button" id="btnSalvarExecucao" value="Salvar" class="button-salvar">
                            <input type="button" id="btnCancelar" value="Cancelar" class="button-cancelar">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="titulo" id="divListaExecucao">
                <div id="listaExecucao"></div>
            </div>
        </div>
        <div id="CadExecucao">
            <div id="windowHeader"></div>
            <div style="overflow: auto;" id="windowContent">
                <?php include_once "CadExecucaoView.php";?>
            </div>            
        </div>   
  </body>
</html>
