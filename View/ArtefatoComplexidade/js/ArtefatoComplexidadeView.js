$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        parametros += "indAtivo;S";
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
        if (lista[i].IND_ATIVO=='S'){
            tabela += "<td style='border: 1px solid #000000;'><a href='javascript:atualizaArtefatoComplexidade("+lista[i].COD_ARTEFATO_COMPLEXIDADE+", 0);' title='Desativar'><img src='"+PATH_RAIZ+"/Resources/images/delete.png' width='25' height='25'></td>";
        }else{
            tabela += "<td style='border: 1px solid #000000;'><a href='javascript:atualizaArtefatoComplexidade("+lista[i].COD_ARTEFATO_COMPLEXIDADE+", 1);' title='Ativar'><img src='"+PATH_RAIZ+"/Resources/images/visto.png' width='25' height='25'></td>";
        }
        tabela += "</tr>";
    }
    tabela += "</table>";
    $("#listaComplexidades").html(tabela);
}

function atualizaArtefatoComplexidade(codigoArtefatoComplexidade, indAtivo){
    var ativo = indAtivo==0?'N':'S';
    var parametros = 'codArtefatoComplexidade;'+codigoArtefatoComplexidade+'|indAtivo;'+ativo;
    ExecutaDispatch('ArtefatoComplexidade', 'UpdateArtefatoComplexidade', parametros, AtualizaDados);    
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});