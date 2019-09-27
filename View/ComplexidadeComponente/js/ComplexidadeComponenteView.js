$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        ExecutaDispatch('ComplexidadeComponente', $("#method").val(), parametros, AtualizaDados);
    });

});

function CarregaComboDisciplina(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }
    CriarComboDispatchComTamanho('codDisciplina', arrDados, valor, 300, disabled);
    $("#codDisciplina").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codDisciplina;'+$("#codDisciplina").val();
            ExecutaDispatch('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade);    
        } else {
            $("#listaComplexidade").hide();
        }
    });
}
function CarregaComboAtividade(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }        
    CriarComboDispatchComTamanho('codDisciplinaAtividade', arrDados, valor, 380, disabled);
    $("#codDisciplinaAtividade").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codDisciplinaAtividade;'+$("#codDisciplinaAtividade").val();
            ExecutaDispatch('Artefato', 'ListarArtefatoPorDisciplinaAtividadeCombo', parametros, CarregaComboArtefato);
        } else {
            $("#listaComplexidade").hide();
        }
    });    
}

function CarregaComboArtefato(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }
    CriarComboDispatchComTamanho('codAtividadeArtefato', arrDados, valor, 400, disabled);
    $("#codAtividadeArtefato").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codAtividadeArtefato;'+$("#codAtividadeArtefato").val();
            ExecutaDispatch('Complexidade', 'ListarComplexidadePorAtividadeArtefatoCombo', parametros, CarregaComboComplexidade);
        } else {
            $("#listaComplexidade").hide();
        }
    });
}

function CarregaComboComplexidade(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }
    CriarComboDispatchComTamanho('codArtefatoComplexidade', arrDados, valor, 400, disabled);
    $("#codArtefatoComplexidade").change(function () {
        if ($(this).val() != 0) {
            AtualizaDados();
        } else {
            $("#listaComplexidade").hide();
        }
    });
}

function AtualizaDados(){
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina, $("#codDisciplina").val(), false);
    var parametros = 'codDisciplina;'+$("#codDisciplina").val();    
    ExecutaDispatchValor('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade, $("#codDisciplinaAtividade").val(), false); 
    parametros = 'codDisciplinaAtividade;'+$("#codDisciplinaAtividade").val();
    ExecutaDispatchValor('Artefato', 'ListarArtefatoPorDisciplinaAtividadeCombo', parametros, CarregaComboArtefato, $("#codAtividadeArtefato").val(), false);
    parametros = 'codAtividadeArtefato;'+$("#codAtividadeArtefato").val();
    ExecutaDispatchValor('Complexidade', 'ListarComplexidadePorAtividadeArtefatoCombo', parametros, CarregaComboComplexidade, $("#codArtefatoComplexidade").val(), false);   
    parametros = 'codArtefatoComplexidade;'+$("#codArtefatoComplexidade").val();
    ExecutaDispatch('Componente', 'ListarComponenteCombo', parametros, CarregaComboComponente);
    ExecutaDispatch('ComplexidadeComponente', 'ListarComplexidadeComponentePorArtefatoComplexidade', parametros, MontaListaAtividades);
    $("#qtdPontos").val('');
    $("#method").val('InsertComplexidadeComponente');
}

function CarregaComboComponente(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }    
    CriarComboDispatchComTamanho('codComponente', arrDados, valor, 380, disabled);
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
    tabela += "<td style='border: 1px solid #000000;'><b>Componente</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Pontos</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Ação</b></td>";
    tabela += "</tr>";
    totalLista = lista.length;
    for (i=0;i<totalLista;i++){
        tabela += "<tr>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_ATIVIDADE+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_ARTEFATO+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_COMPLEXIDADE+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_COMPONENTE+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].QTD_PONTOS+"</td>";
        var qtdPontos = "'"+lista[i].QTD_PONTOS+"'";
        tabela += "<td style='border: 1px solid #000000; width: 102px;'>\n\
                   <table width='100%'><tr>\n\
                       <td><a href=\"javascript:editarRelacionamento("+lista[i].COD_DISCIPLINA_ATIVIDADE+", "+lista[i].COD_DISCIPLINA+", "+qtdPontos+" , "+lista[i].COD_ATIVIDADE_ARTEFATO+", "+lista[i].COD_ARTEFATO_COMPLEXIDADE+" , "+lista[i].COD_COMPONENTE+" , "+lista[i].COD_COMPLEXIDADE_COMPONENTE+");\" title='Editar'>\n\
                            <img src='../../Resources/images/edit.png' width='20' height='20'>\n\
                       </a></td> \n\
                       </tr></table>   \n\
                    </td>";
        tabela += "</tr>";
    }
    tabela += "</table>";
    $("#listaComplexidades").html(tabela);
}

function editarRelacionamento(codDisciplinaAtividade, codDisciplina, qtdPontos, codAtividadeArtefato, codArtefatoComplexidade, codComponente, codComplexidadeComponente){
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina, codDisciplina, true);
    var parametros = 'codDisciplina;'+codDisciplina;    
    ExecutaDispatchValor('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade, codDisciplinaAtividade, true); 
    parametros = 'codDisciplinaAtividade;'+codDisciplinaAtividade;
    ExecutaDispatchValor('Artefato', 'ListarArtefatoPorDisciplinaAtividadeCombo', parametros, CarregaComboArtefato, codAtividadeArtefato, true);
    parametros = 'codAtividadeArtefato;'+codAtividadeArtefato;
    ExecutaDispatchValor('Complexidade', 'ListarComplexidadePorAtividadeArtefatoCombo', parametros, CarregaComboComplexidade, codArtefatoComplexidade, true);   
    parametros = 'codArtefatoComplexidade;'+codArtefatoComplexidade+'|dscCampo;COD_COMPONENTE';
    ExecutaDispatchValor('Componente', 'ListarComponentePorArtefatoComplexidadeCombo', parametros, CarregaComboComponente, codComponente, true);
    $("#qtdPontos").val(qtdPontos);
    $("#method").val('UpdateComplexidadeComponente');
    $("#codComplexidadeComponente").val(codComplexidadeComponente);
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});