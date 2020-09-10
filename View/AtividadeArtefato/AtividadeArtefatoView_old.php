<?php 
include_once '../../constantes.php';
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - 2-Atividade Artefato</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/AtividadeArtefatoView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type="hidden" id="method" value=''>
        <input type="hidden" id="codAtividadeArtefato" value='' class='persist'>
        <div class="card" style="max-width: 1010px;">
            <div class="cabecalho">Relacionamento entre Atividades e Artefatos</div>
            <table width="100%">
                <tr>
                    <td>
                        <label for="codDisciplina" class="titulo">Disciplina</label>
                        <div id="tdcodDisciplina"></div>                        
                    </td>
                    <td>
                        <label for="codDisciplinaAtividade" class="titulo">Atividade</label>
                        <div id="tdcodDisciplinaAtividade"></div>
                    </td>                    
                </tr>                    
                <tr>
                    <td colspan="2">
                        <label for="codArtefato" class="titulo">Artefato</label>
                        <div id="tdcodArtefato"></div>
                    </td>
                </tr>                    
                <tr>
                    <td colspan="2">
                        <label for="codTarefa" class="titulo">Tarefa</label><br>
                        <input type="text" id="codTarefa" class="titulo persist" size='50'>
                    </td>
                </tr>                    
                <tr>                    
                    <td>
                        <br>
                        <input type="button" id="btnInserir" value="Salvar Relacionamento" class="button-salvar" style="">
                    </td>
                </tr>
            </table>
            
            
            <div class="titulo" id="listaArtefatos">
                <div id="listaArtefato"></div>
            </div>
        </div>
  </body>
</html>
