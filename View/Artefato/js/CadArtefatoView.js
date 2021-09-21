$(function () {
    $("#btnSalvar").click(function () {
        salvarArtefato();
    });
});

function salvarArtefato() {
    if ($('#codArtefato').val() == 0) {
        $("#method").val('InsertArtefato');
    } else {
        $("#method").val('UpdateArtefato');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Artefato', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando artefato!', 'Artefato salvo com sucesso!');
}

function fecharTelaCadastro(dados) {
    $("#CadArtefato").jqxWindow("close");
    ExecutaDispatch('Artefato', 'ListarArtefato', '', CarregaGridArtefato);
}