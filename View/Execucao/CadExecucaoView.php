<script src="js/CadExecucaoView.js?rdm=<?php echo time();?>"></script>
<form name="menuForm" enctype="multpart/form-data" id="cadastroMenuForm" method="post" action="../../Controller/Menu/CadastroMenuController.php"> 
    <input type="hidden" id="codExecucaoComplexidade" name="codExecucaoComplexidade" value="" class="persist">
    <table width="100%" align="left">
        <tr>
            <td style='width: 50%;'>
                <label for="codDisciplina" class="titulo">Disciplina</label>
                <div id="tdcodDisciplina"></div>                        
            </td>
            <td style='width: 50%;'>
                <label for="codDisciplinaAtividade" class="titulo">Atividade</label>
                <div id="tdcodDisciplinaAtividade"></div>
            </td>              
        </tr>
        <tr>
            <td style='width: 50%;'>
                <label for="codAtividadeArtefato" class="titulo">Artefato</label>
                <div id="tdcodAtividadeArtefato"></div>
            </td>
            <td style='width: 50%;'>
                <label for="codArtefatoComplexidade" class="titulo">Complexidade</label>
                <div id="tdcodArtefatoComplexidade"></div>
            </td>
        </tr> 
        <tr>
            <td style='width: 50%;'>
                <label for="codComplexidadeComponente" class="titulo">Componente</label>
                <div id="tdcodComplexidadeComponente"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="nmeArquivo" class="titulo">Arquivo</label><br>
                <input type="text" id="nmeArquivo" name="nmeArquivo" class="persist titulo" size="80">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="txtDescricaoJustificativa" class="titulo">Justificativa</label><br>
                <input type="text" id="txtDescricaoJustificativa" name="txtDescricaoJustificativa" class="persist titulo" size="80">
            </td>
        </tr>
        <tr>                    
            <td colspan="2">
                <table>
                <tr>                    
                    <td>
                        <br>
                        <input type="button" id="btnInserirArquivo" value="Salvar Arquivo" class="button-salvar" style="">
                    </td>
                    <td>
                        <br>
                        <input type="button" id="btnNovo" value="Limpar Campos" class="button" style="">
                    </td>
                    <td>
                        <br>
                        <input type="button" id="btnExcluirOf" value="Excluir OF" class="button-cancelar" style="">
                    </td>
                </tr>
                </table>
            </td>
        </tr>
    </table>
    <div id="listaOf" style=''></div>
</form>