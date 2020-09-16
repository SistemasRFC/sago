<?php 
include_once '../../constantes.php';
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - 1-Disciplina e Atividade</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/DisciplinaAtividadeView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <div class="card" style="max-width: 1010px;">
            <div class="cabecalho">Cadastro de Relacionamento entre Disciplina e Atividades</div>
            <table width="100%">
                <tr>
                    <td>
                        <label for="codDisciplina" class="titulo">Disciplina</label>
                        <div id="tdcodDisciplina"></div>                        
                    </td>
                    <td>
                        <label for="codAtividade" class="titulo">Atividade</label>
                        <div id="tdcodAtividade"></div>
                    </td>
                    <td>
                        <br>
                        <input type="button" id="btnInserir" value="Salvar Relacionamento" class="button-salvar" style="">
                    </td>
                </tr>
            </table>
            
            
            <div class="titulo" id="listaAtividades">
                <div id="listaAtividade"></div>
            </div>
        </div>
  </body>
</html>
