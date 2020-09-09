<script src="js/CadComponenteView.js?rdm=<?php echo time();?>"></script>
<form>
    <input type="hidden" id="codComponente" name="codComponente" value="0" class="persist">    
    <table width="100%">
        <tr>
            <td class="titulo" style="padding-top: 0px;">Componente</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="dscComponente" id="dscComponente" class="persist input">
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="indAtivo" id="indAtivo" class="persist"> Ativo
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" id="btnSalvar" value="Salvar" class="button-salvar">
            </td>
        </tr>
    </table>   
</form>
