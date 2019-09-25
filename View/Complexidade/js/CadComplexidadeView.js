$(function () {
    $("#btnSalvar").click(function () {
        salvarComplexidade();
    });
});

function salvarComplexidade() {
    if ($('#codComplexidade').val() == '') {
        $("#method").val('InsertComplexidade');
    } else {
        $("#method").val('UpdateComplexidade');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Complexidade', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando complexidade!', 'Complexidade salva com sucesso!');
}

function fecharTelaCadastro(dados) {
    $("#CadComplexidade").jqxWindow("close");
    ExecutaDispatch('Complexidade', 'ListarComplexidade', '', CarregaGridComplexidade);
}