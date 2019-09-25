$(function () {
    $("#btnDeletar").click(function () {
        DeleteAtividade();
    });
    $("#btnSalvar").click(function () {
        salvarAtividade();
    });
});

function salvarAtividade(data) {
    swal({
        title: 'Aguarde, salvando disciplina!',
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($('#codAtividade').val() == '') {
        $("#method").val('InsertAtividade');
    } else {
        $("#method").val('UpdateAtividade');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Atividade', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro(dados) {
    $("#CadAtividade").jqxWindow("close");
    ExecutaDispatch('Atividade', 'ListarAtividade', '', CarregaGridAtividade);
    swal({
        title: "Sucesso!",
        text: dados[2],
        type: "info"
    });
}

function DeleteAtividade() {
    ExecutaDispatch('Atividade', 'DeleteAtividade', 'codAtividade;' + $("#codAtividade").val() + '|', retornoDeleteAtividade, "Aguarde, removendo atividade", "Atividade removido com sucesso!");
}

function retornoDeleteAtividade(retorno) {
    $("#CadAtividade").jqxWindow("close");
    CarregaGridAtividade();
}