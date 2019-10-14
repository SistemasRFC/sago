<?php 
include_once '../../constantes.php';
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - Execução de OFs</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/ExecucaoView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" name="method" class="persist">
        <input type="hidden" id="codExecucao" name="codExecucao" class="persist">
        <input type="hidden" id="indStatus" name="indStatus" class="persist">
        <div class="card" style="max-width: 810px;">
            <div class="cabecalho">Cadastro de O.F.</div>
            <div class="titulo">
                <input type="button" id="btnNovaOf" value="Nova O.F." class="button">
                <table width="100%" align="left" id='cadNovaOf'>
                    <tr>
                        <td style="padding-top: 0px;">
                            <label for="codOf" class="titulo">O.F.</label>
                            <input type="text" name="codOf" id="codOf" class="persist titulo" size='40'>
                        </td>
                        <td style="padding-top: 0px;">
                            <label for="nroMesReferencia" class="titulo">Mês referência</label>
                            <div id="tdnroMesReferencia"></div>
                            <!-- <input type="number" name="nroMesReferencia" id="nroMesReferencia" class="persist titulo"> -->
                        </td>
                        <td style="padding-top: 0px;">
                            <label for="nroAnoReferencia" class="titulo">Ano referência</label>
                            <div id="tdnroAnoReferencia"></div>
                            <!-- <input type="text" name="nroAnoReferencia" id="nroAnoReferencia" class="persist titulo" size='15'> -->
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
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
        <div id='ofMenu' style="display:none;">
            <ul>
                <li>Finalizar</li>
                <li>Excluir</li>
            </ul>
        </div>          
  </body>
</html>
