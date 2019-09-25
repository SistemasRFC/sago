<script src="js/CadDisciplinaView.js?rdm=<?php echo time();?>"></script>
<form name="menuForm" enctype="multpart/form-data" id="cadastroMenuForm" method="post" action="../../Controller/Menu/CadastroMenuController.php">
    <input type="hidden" id="codDisciplina" name="codDisciplina" value="0" class="persist">    
    <table width="100%" align="left">
        <tr>
            <td class="titulo" style="padding-top: 0px;">Disciplina</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="dscMenu" id="dscDisciplina" class="persist input">
            </td>
        </tr>
    </table>   
</form>
<table>
    <tr style="padding-top:20px;">
        <td>
            <input type="button" id="btnSalvar" value="Salvar" class="button-salvar">
        </td>
        <td>
            <input type="button" id="btnDeletar" value="Deletar" class="button-cancelar">
        </td>
    </tr>
</table>
