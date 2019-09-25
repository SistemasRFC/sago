$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        ExecutaDispatch('DisciplinaAtividade', 'InsertDisciplinaAtividade', parametros, AtualizaDados);
    });

});

function CarregaComboDisciplina(arrDados) {
    CriarComboDispatchComTamanho('codDisciplina', arrDados, 0, 300);
    $("#codDisciplina").change(function () {
        if ($(this).val() != 0) {
            AtualizaDados();
        } else {
            $("#listaAtividades").hide();
        }
    });
}

function AtualizaDados(){
    var parametros = 'codDisciplina;'+$("#codDisciplina").val();
    ExecutaDispatch('DisciplinaAtividade', 'ListarDisciplinaAtividadePorDisciplina', parametros, MontaListaAtividades); 
    ExecutaDispatch('Atividade', 'ListarAtividadeCombo', parametros, CarregaComboAtividade);    
}

function CarregaComboAtividade(arrDados) {
    CriarComboDispatchComTamanho('codAtividade', arrDados, 0, 380);
}

function MontaListaAtividades(lista){
    lista = lista[1];
    $("#listaAtividades").html("");
    var tabela = "<table width='100%' style='border: 1px solid #000000;' cellspacing='0'>";
    tabela += "<tr>";
    tabela += "<td style='border: 1px solid #000000;'><b>Disciplina</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Atividade</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Ação</b></td>";
    tabela += "</tr>";
    totalLista = lista.length;
    for (i=0;i<totalLista;i++){
        tabela += "<tr>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_ATIVIDADE+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>Sem Ação</td>";
        tabela += "</tr>";
    }
    tabela += "</table>";
    $("#listaAtividades").html(tabela);
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});