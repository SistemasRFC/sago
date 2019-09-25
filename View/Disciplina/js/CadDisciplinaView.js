$(function () {
    $("#btnDeletar").click(function () {
        DeleteDisciplina();
    });
    $("#btnSalvar").click(function () {
        salvarDisciplina();
    });
});

function salvarDisciplina(data) {
    swal({
        title: 'Aguarde, salvando disciplina!',
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($('#codDisciplina').val() == '') {
        $("#method").val('InsertDisciplina');
    } else {
        $("#method").val('UpdateDisciplina');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Disciplina', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro(dados) {
    $("#CadDisciplina").jqxWindow("close");
    ExecutaDispatch('Disciplina', 'ListarDisciplina', '', CarregaGridDisciplina);
    swal({
        title: "Sucesso!",
        text: dados[2],
        type: "info"
    });
}

function DeleteDisciplina() {
    ExecutaDispatch('Disciplina', 'DeleteDisciplina', 'codDisciplina;' + $("#codDisciplina").val() + '|', retornoDeleteDisciplina, "Aguarde, removendo disciplina", "Disciplina removido com sucesso!");
}

function retornoDeleteDisciplina(retorno) {
    $("#CadDisciplina").jqxWindow("close");
    CarregaGridDisciplina();
}