$(function () {
    $("#btnSalvar").click(function () {
        salvarProjeto();
    });
});

function salvarProjeto() {
    if ($('#codProjeto').val() == 0) {
        $("#method").val('InsertProjeto');
    } else {
        $("#method").val('UpdateProjeto');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Projeto', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando projeto!', 'Projeto salvo com sucesso!');
}

function fecharTelaCadastro(dados) {
    $("#projetoModal").modal('hide');
    ExecutaDispatch('Projeto', 'ListarProjeto', '', CarregaGridProjeto);
}