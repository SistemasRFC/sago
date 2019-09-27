$(function () {
    $("#btnSalvar").click(function () {
        salvarComponente();
    });
});

function salvarComponente() {
    if ($('#codComponente').val() == '') {
        $("#method").val('InsertComponente');
    } else {
        $("#method").val('UpdateComponente');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Componente', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando componente!', 'Componente salvo com sucesso!');
}

function fecharTelaCadastro(dados) {
    $("#CadComponente").jqxWindow("close");
    ExecutaDispatch('Componente', 'ListarComponente', '', CarregaGridComponente);
}