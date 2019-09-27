<?php 
include_once getenv("CONSTANTES");
include_once PATH."View/MenuPrincipal/Cabecalho.php";
include_once PATH."View/MenuPrincipal/Rodape.php";
?>
<html>
    <head>
        <title>SAGO - 4-Complexidade e Componente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/ComplexidadeComponenteView.js?rdm=<?php echo time();?>"></script>

    </head>
    <body>
        <input type='hidden' id='method'>
        <input type="hidden" id="codComplexidadeComponente" value='' class='persist'>
        <div class="card" style="max-width: 1010px;">
            <div class="cabecalho">Relacionamento entre Complexidades e Componentes</div>
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
                        <label for="codArtefatoComplexidade" class="titulo">Complexidade</label>
                        <div id="tdcodArtefatoComplexidade"></div>
                    </td>
                </tr>                    
                <tr>
                    <td>
                        <label for="codComponente" class="titulo">Componente</label>
                        <div id="tdcodComponente"></div>
                    </td>
                    <td>
                        <label for="qtdPontos" class="titulo">Pontos</label><br>
                        <input type="text" id="qtdPontos" class="persist titulo">
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
