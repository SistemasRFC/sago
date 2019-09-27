$(function () {
    $("#btnSalvar").click(function () {
        salvarAtividade();
    });
});

function salvarAtividade() {
    if ($('#codAtividade').val() == '') {
        $("#method").val('InsertAtividade');
    } else {
        $("#method").val('UpdateAtividade');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Atividade', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando atividade!', 'Atividade salva com sucesso!');
}

function fecharTelaCadastro(dados) {
    $("#CadAtividade").jqxWindow("close");
    ExecutaDispatch('Atividade', 'ListarAtividade', '', CarregaGridAtividade);
}