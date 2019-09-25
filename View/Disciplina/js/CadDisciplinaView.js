$(function () {
    $("#btnSalvar").click(function () {
        salvarDisciplina();
    });
});

function salvarDisciplina() {
    if ($('#codDisciplina').val() == '') {
        $("#method").val('InsertDisciplina');
    } else {
        $("#method").val('UpdateDisciplina');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Disciplina', $("#method").val(), parametros, fecharTelaCadastro, 'Aguarde, salvando disciplina!', 'Disciplina salva com sucesso!');
}

function fecharTelaCadastro(dados) {
    $("#CadDisciplina").jqxWindow("close");
    ExecutaDispatch('Disciplina', 'ListarDisciplina', '', CarregaGridDisciplina);
}