$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        parametros += "indAtivo;S";
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
        if (lista[i].IND_ATIVO=='S'){
            tabela += "<td style='border: 1px solid #000000;'><a href='javascript:atualizaDisciplinaAtividade("+lista[i].COD_DISCIPLINA_ATIVIDADE+", 0);' title='Desativar'><img src='"+PATH_RAIZ+"/Resources/images/delete.png' width='25' height='25'></td>";
        }else{
            tabela += "<td style='border: 1px solid #000000;'><a href='javascript:atualizaDisciplinaAtividade("+lista[i].COD_DISCIPLINA_ATIVIDADE+", 1);' title='Ativar'><img src='"+PATH_RAIZ+"/Resources/images/visto.png' width='25' height='25'></td>";
        }
        tabela += "</tr>";
    }
    tabela += "</table>";
    $("#listaAtividades").html(tabela);
}

function atualizaDisciplinaAtividade(codDisciplinaAtividade, indAtivo){
    var ativo = indAtivo==0?'N':'S';
    var parametros = 'codDisciplinaAtividade;'+codDisciplinaAtividade+'|indAtivo;'+ativo;
    ExecutaDispatch('DisciplinaAtividade', 'UpdateDisciplinaAtividade', parametros, AtualizaDados);    
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});