$(function () {
    $("#btnSalvar").click(function () {
        salvarProjeto();
    });
});

function salvarProjeto() {
    if ($('#codProjeto').val() == '') {
        $("#method").val('InsertProjeto');
    } else {
        $("#method").val('UpdateProjeto');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Projeto', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando atividade!', 'Projeto salva com sucesso!');
}

function fecharTelaCadastro(dados) {
    $("#CadProjeto").jqxWindow("close");
    ExecutaDispatch('Projeto', 'ListarProjeto', '', CarregaGridProjeto);
}