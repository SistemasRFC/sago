<script src="js/CadArtefatoView.js?rdm=<?php echo time();?>"></script>
<form name="menuForm" enctype="multpart/form-data" id="cadastroMenuForm" method="post" action="../../Controller/Menu/CadastroMenuController.php">
    <input type="hidden" id="codArtefato" name="codArtefato" value="0" class="persist">    
    <table width="100%" align="left">
        <tr>
            <td class="titulo" style="padding-top: 0px;">Artefato</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="dscMenu" id="dscArtefato" class="persist input">
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
