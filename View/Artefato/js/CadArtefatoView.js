$(function () {
    $("#btnDeletar").click(function () {
        DeleteArtefato();
    });
    $("#btnSalvar").click(function () {
        salvarArtefato();
    });
});

function salvarArtefato(data) {
    swal({
        title: 'Aguarde, salvando artefato!',
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($('#codArtefato').val() == '') {
        $("#method").val('InsertArtefato');
    } else {
        $("#method").val('UpdateArtefato');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Artefato', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro(dados) {
    $("#CadArtefato").jqxWindow("close");
    ExecutaDispatch('Artefato', 'ListarArtefato', '', CarregaGridArtefato);
    swal({
        title: "Sucesso!",
        text: dados[2],
        type: "info"
    });
}

function DeleteArtefato() {
    ExecutaDispatch('Artefato', 'DeleteArtefato', 'codArtefato;' + $("#codArtefato").val() + '|', retornoDeleteArtefato, "Aguarde, removendo atividade", "Artefato removido com sucesso!");
}

function retornoDeleteArtefato(retorno) {
    $("#CadArtefato").jqxWindow("close");
    CarregaGridArtefato();
}