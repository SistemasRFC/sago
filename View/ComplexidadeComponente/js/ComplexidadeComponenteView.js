$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        parametros += "indAtivo;S";
        ExecutaDispatch('ComplexidadeComponente', $("#method").val(), parametros, AtualizaDados, "Aguarde, salvando vínculo", "Vínculo salvo com sucesso");
    });

});

function CarregaComboDisciplina(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }
    CriarSelectPuro('codDisciplina', arrDados, valor, disabled);
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
    CriarSelectPuro('codDisciplinaAtividade', arrDados, valor, disabled);
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
    CriarSelectPuro('codAtividadeArtefato', arrDados, valor, disabled);
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
    CriarSelectPuro('codArtefatoComplexidade', arrDados, valor, disabled);
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
    CriarSelectPuro('codComponente', arrDados, valor, disabled);
}

function MontaListaAtividades(lista){
    lista = lista[1];
    $("#listaComplexidades").html("");
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='complexCompoTable' width='100%'>";
    tabela += " <thead>";
    tabela += " <tr>";
    tabela += "     <th>Disciplina</th>";
    tabela += "     <th>Atividade</th>";
    tabela += "     <th>Artefato</th>";
    tabela += "     <th>Complexidade</th>";
    tabela += "     <th>Componente</th>";
    tabela += "     <th>Pontos</th>";
    tabela += "     <th>Ação</th>";
    tabela += " </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for ( var i in lista){
        tabela += "<tr>";
        tabela += " <td>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += " <td>"+lista[i].DSC_ATIVIDADE+"</td>";
        tabela += " <td>"+lista[i].DSC_ARTEFATO+"</td>";
        tabela += " <td>"+lista[i].DSC_COMPLEXIDADE+"</td>";
        tabela += " <td>"+lista[i].DSC_COMPONENTE+"</td>";
        tabela += " <td>"+lista[i].QTD_PONTOS+"</td>";
        var qtdPontos = "'"+lista[i].QTD_PONTOS+"'";
        tabela += " <td>\n\
                        <button class='btn btn-success btn-sm mb-1' onclick=\"javascript:editarRelacionamento("+lista[i].COD_DISCIPLINA_ATIVIDADE+", "+lista[i].COD_DISCIPLINA+", "+qtdPontos+" , "+lista[i].COD_ATIVIDADE_ARTEFATO+", "+lista[i].COD_ARTEFATO_COMPLEXIDADE+" , "+lista[i].COD_COMPONENTE+" , "+lista[i].COD_COMPLEXIDADE_COMPONENTE+");\" title='Editar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-pencil-alt'></i>\n\
                            </span>\n\
                        </button>";
        if (lista[i].IND_ATIVO=='S'){
            tabela += " <button class='btn btn-danger btn-sm' onclick='javascript:atualizaComplexidadeComponente("+lista[i].COD_COMPLEXIDADE_COMPONENTE+", 0);' title='Desativar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-power-off'></i>\n\
                            </span>\n\
                        </button>";
        }else{
            tabela += " <button class='btn btn-success btn-sm' onclick='javascript:atualizaComplexidadeComponente("+lista[i].COD_COMPLEXIDADE_COMPONENTE+", 1);' title='Ativar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-power-off'></i>\n\
                            </span>\n\
                        </button>";
        }
        tabela += " </td>";
        tabela += "</tr>";
    }
    tabela += "</tbody>";
    tabela += "</table>";
    $("#listaComplexidades").html(tabela);

    $('#complexCompoTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
}

function atualizaComplexidadeComponente(codComplexidadeComponente, indAtivo){
    var ativo = indAtivo==0?'N':'S';
    var parametros = 'codComplexidadeComponente;'+codComplexidadeComponente+'|indAtivo;'+ativo;
    ExecutaDispatch('ComplexidadeComponente', 'UpdateComplexidadeComponente', parametros, AtualizaDados, "Aguarde, salvando vínculo", "Vínculo salvo com sucesso");
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