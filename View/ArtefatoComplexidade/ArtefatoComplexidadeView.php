<?php 
include_once '../../constantes.php';
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - 3-Artefato Complexidade</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/ArtefatoComplexidadeView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <div class="card" style="max-width: 1010px;">
            <div class="cabecalho">Relacionamento entre Artefatos e Complexidades</div>
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
                    <td>
                        <label for="codAtividadeArtefato" class="titulo">Artefato</label>
                        <div id="tdcodAtividadeArtefato"></div>
                    </td>
                    <td>
                        <label for="codComplexidade" class="titulo">Complexidade</label>
                        <div id="tdcodComplexidade"></div>
                    </td>
                </tr>                    
                <tr>                    
                    <td>
                        <br>
                        <input type="button" id="btnInserir" value="Salvar Relacionamento" class="button-salvar" style="">
                    </td>
                </tr>
            </table>
            
            
            <div class="titulo" id="listaComplexidades">
                <div id="listaComplexidade"></div>
            </div>
        </div>
  </body>
</html>
