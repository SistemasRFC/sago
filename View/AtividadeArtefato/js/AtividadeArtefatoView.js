$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        ExecutaDispatch('AtividadeArtefato', $("#method").val(), parametros, AtualizaDados);
    });

});

function LimparCamposAtividade(){
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
    $("#tdcodDisciplinaAtividade").html('');
    $("#tdcodArtefato").html('');
}

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
            $("#listaArtefatos").hide();
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
            AtualizaDados();
        } else {
            $("#listaArtefatos").hide();
        }
    });    
}

function CarregaComboArtefato(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }        
    CriarComboDispatchComTamanho('codArtefato', arrDados, valor, 850, disabled);
}

function AtualizaDados(){   
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina, $("#codDisciplina").val(), false);
    
    var parametros = 'codDisciplina;'+$("#codDisciplina").val();    
    ExecutaDispatchValor('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade, $("#codDisciplinaAtividade").val(), false); 
    
    parametros = 'codDisciplinaAtividade;'+$("#codDisciplinaAtividade").val()+'|dscCampo;COD_ARTEFATO';
    ExecutaDispatchValor('Artefato', 'ListarArtefatoCombo', parametros, CarregaComboArtefato, 0, false);    
    
    ExecutaDispatch('AtividadeArtefato', 'ListarAtividadeArtefatoPorDisciplinaAtividade', parametros, MontaListaAtividades);
    $("#codTarefa").val('');
    $("#codAtividadeArtefato").val('');
    $("#method").val('InsertAtividadeArtefato');
}

function MontaListaAtividades(lista){
    lista = lista[1];
    $("#listaArtefatos").html("");
    var tabela = "<table width='100%' style='border: 1px solid #000000;' cellspacing='0'>";
    tabela += "<tr>";
    tabela += "<td style='border: 1px solid #000000;'><b>Tarefa</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Disciplina</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Atividade</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Artefato</b></td>";
    tabela += "<td style='border: 1px solid #000000;'><b>Ação</b></td>";
    tabela += "</tr>";
    totalLista = lista.length;
    for (i=0;i<totalLista;i++){
        tabela += "<tr>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].COD_TAREFA+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_ATIVIDADE+"</td>";
        tabela += "<td style='border: 1px solid #000000;'>"+lista[i].DSC_ARTEFATO+"</td>";
        var codTarefa = "'"+lista[i].COD_TAREFA+"'";
        tabela += "<td style='border: 1px solid #000000; width: 102px;'>\n\
                   <table width='100%'><tr>\n\
                       <td><a href=\"javascript:editarRelacionamento("+lista[i].COD_DISCIPLINA_ATIVIDADE+", "+lista[i].COD_DISCIPLINA+", "+lista[i].COD_ARTEFATO+", "+codTarefa+" , "+lista[i].COD_ATIVIDADE_ARTEFATO+");\" title='Editar'>\n\
                            <img src='../../Resources/images/edit.png' width='20' height='20'>\n\
                       </a></td> \n\
                       </tr></table>   \n\
                    </td>";

        tabela += "</tr>";
    }
    tabela += "</table>";
    $("#listaArtefatos").html(tabela);
}

function editarRelacionamento(codDisciplinaAtividade, codDisciplina, codArtefato, codTarefa, codAtividadeArtefato){
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina, codDisciplina, true);
    var parametros = 'codDisciplina;'+codDisciplina;    
    ExecutaDispatchValor('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade, codDisciplinaAtividade, true); 
    parametros = 'codDisciplinaAtividade;'+codDisciplinaAtividade+'|dscCampo;COD_ARTEFATO';
    ExecutaDispatchValor('Artefato', 'ListarArtefatoPorDisciplinaAtividadeCombo', parametros, CarregaComboArtefato, codArtefato, true);
    $("#codTarefa").val(codTarefa);
    $("#codAtividadeArtefato").val(codAtividadeArtefato);
    $("#method").val('UpdateAtividadeArtefato');
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});