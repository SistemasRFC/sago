<?php 
include_once '../../constantes.php';
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - Relatório Gerencial</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/RelatorioPontuacaoUsuarioView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <div class="card" style="max-width: 810px;">
            <div class="cabecalho">Relatório de Pontos por Usuário</div>
            
            <table width="100%">
                <tr>
                    <td>
                        <label for="mesReferencia" class="titulo">Mês *</label>
                        <div id="tdnroMesReferencia"></div>                        
                    </td>
                    <td>
                        <label for="anoReferencia" class="titulo">Ano *</label>
                        <div id="tdnroAnoReferencia"></div>                        
                    </td>
                </tr>                    
                <tr>                    
                    <td>
                        <br>
                        <input type="button" id="btnPesquisar" value="Pesquisar" class="button">
                    </td>
                </tr>
            </table>
            <div id='listagemExecucao'></div>
        </div>
  </body>
</html>
