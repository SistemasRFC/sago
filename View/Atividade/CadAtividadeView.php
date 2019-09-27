<script src="js/CadAtividadeView.js?rdm=<?php echo time();?>"></script>
<form>
    <input type="hidden" id="codAtividade" name="codAtividade" value="0" class="persist">    
    <table width="100%" align="left">
        <tr>
            <td class="titulo" style="padding-top: 0px;">Atividade</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="dscAtividade" id="dscAtividade" class="persist input">
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
