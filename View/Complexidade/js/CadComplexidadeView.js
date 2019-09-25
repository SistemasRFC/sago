$(function () {
    $("#btnDeletar").click(function () {
        DeleteComplexidade();
    });
    $("#btnSalvar").click(function () {
        salvarComplexidade();
    });
});

function salvarComplexidade(data) {
    swal({
        title: 'Aguarde, salvando artefato!',
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($('#codComplexidade').val() == '') {
        $("#method").val('InsertComplexidade');
    } else {
        $("#method").val('UpdateComplexidade');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Complexidade', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro(dados) {
    $("#CadComplexidade").jqxWindow("close");
    ExecutaDispatch('Complexidade', 'ListarComplexidade', '', CarregaGridComplexidade);
    swal({
        title: "Sucesso!",
        text: dados[2],
        type: "info"
    });
}

function DeleteComplexidade() {
    ExecutaDispatch('Complexidade', 'DeleteComplexidade', 'codComplexidade;' + $("#codComplexidade").val() + '|', retornoDeleteComplexidade, "Aguarde, removendo atividade", "Complexidade removido com sucesso!");
}

function retornoDeleteComplexidade(retorno) {
    $("#CadComplexidade").jqxWindow("close");
    CarregaGridComplexidade();
}