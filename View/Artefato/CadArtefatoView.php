<script src="js/CadArtefatoView.js?rdm=<?php echo time();?>"></script>
<form>
    <input type="hidden" id="codArtefato" name="codArtefato" value="0" class="persist">    
    <table width="100%" align="left">
        <tr>
            <td class="titulo" style="padding-top: 0px;">Artefato</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="dscArtefato" id="dscArtefato" class="persist input">
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="indAtivo" id="indAtivo" class="persist"> Ativo
            </td>
        </tr>
        <tr style="padding-top:20px;">
            <td>
                <input type="button" id="btnSalvar" value="Salvar" class="button-salvar">
            </td>
        </tr>
    </table>   
</form>
