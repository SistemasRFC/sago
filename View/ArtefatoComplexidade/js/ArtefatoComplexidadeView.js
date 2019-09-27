$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        ExecutaDispatch('ArtefatoComplexidade', 'InsertArtefatoComplexidade', parametros, AtualizaDados);
    });

});

function CarregaComboDisciplina(arrDados) {
    CriarComboDispatchComTamanho('codDisciplina', arrDados, 0, 300);
    $("#codDisciplina").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codDisciplina;'+$("#codDisciplina").val();
            ExecutaDispatch('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade);    
        } else {
            $("#listaArtefatos").hide();
        }
    });
}

function CarregaComboAtividade(arrDados) {
    CriarComboDispatchComTamanho('codDisciplinaAtividade', arrDados, 0, 380);
    $("#codDisciplinaAtividade").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codDisciplinaAtividade;'+$("#codDisciplinaAtividade").val();
            ExecutaDispatch('AtividadeArtefato', 'ListarDisciplinaAtividadeArtefatoCombo', parametros, CarregaComboArtefato);
        } else {
            $("#listaArtefatos").hide();
        }
    });    
}

function CarregaComboArtefato(arrDados) {
    CriarComboDispatchComTamanho('codAtividadeArtefato', arrDados, 0, 400);
    $("#codAtividadeArtefato").change(function () {
        if ($(this).val() != 0) {
            AtualizaDados();
        } else {
            $("#listaComplexidade").hide();
        }
    });
}

function AtualizaDados(){
    var parametros = 'codAtividadeArtefato;'+$("#codAtividadeArtefato").val();
    ExecutaDispatch('Complexidade', 'ListarComplexidadeCombo', parametros, CarregaComboComplexidade);
    ExecutaDispatch('ArtefatoComplexidade', 'ListarArtefatoComplexidadePorAtividadeArtefato', parametros, MontaListaAtividades);    
}

function CarregaComboComplexidade(arrDados) {
    CriarComboDispatchComTamanho('codComplexidade', arrDados, 0, 380);
}

function MontaListaAtividades(lista){
    lista = lista[1];
    $("#listaComplexidades").html("");
    var tabela = "<table width='100%' style='border: 1px solid #000000;' cellspacing='0'>";
    tabela += "<tr>";
    tabela += "<td style='border: 1px solid #000000;'><b>Disciplina</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Atividade</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Artefato</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Complexidade</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Ação</b></td>";
    tabela += "</tr>";
    totalLista = lista.length;
    for (i=0;i<totalLista;i++){
        tabela += "<tr>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_ATIVIDADE+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_ARTEFATO+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_COMPLEXIDADE+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>Sem Ação</td>";
        tabela += "</tr>";
    }
    tabela += "</table>";
    $("#listaComplexidades").html(tabela);
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});