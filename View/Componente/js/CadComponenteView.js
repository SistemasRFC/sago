$(function () {
    $("#btnDeletar").click(function () {
        DeleteComponente();
    });
    $("#btnSalvar").click(function () {
        salvarComponente();
    });
});

function salvarComponente(data) {
    swal({
        title: 'Aguarde, salvando componente!',
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($('#codComponente').val() == '') {
        $("#method").val('InsertComponente');
    } else {
        $("#method").val('UpdateComponente');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Componente', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro(dados) {
    $("#CadComponente").jqxWindow("close");
    ExecutaDispatch('Componente', 'ListarComponente', '', CarregaGridComponente);
    swal({
        title: "Sucesso!",
        text: dados[2],
        type: "info"
    });
}

function DeleteComponente() {
    ExecutaDispatch('Componente', 'DeleteComponente', 'codComponente;' + $("#codComponente").val() + '|', retornoDeleteComponente, "Aguarde, removendo atividade", "Componente removido com sucesso!");
}

function retornoDeleteComponente(retorno) {
    $("#CadComponente").jqxWindow("close");
    CarregaGridComponente();
}