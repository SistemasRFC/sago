$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        parametros += "indAtivo;S";
        alert($("#method").val());
        ExecutaDispatch('AtividadeArtefato', $("#method").val(), parametros, AtualizaDados, "Aguarde, salvando vínculo", "Vínculo salvo com sucesso");
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
            $("#listaArtefatos").hide();
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
    CriarSelectPuro('codArtefato', arrDados, valor, disabled);
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
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='atvdArtefatoTable' width='100%'>";
    tabela += " <thead>";
    tabela += " <tr>";
    tabela += "     <th>Tarefa</th>";
    tabela += "     <th>Disciplina</th>";
    tabela += "     <th>Atividade</th>";
    tabela += "     <th>Artefato</th>";
    tabela += "     <th>Ação</th>";
    tabela += " </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for (var i in lista){
        tabela += "<tr>";
        tabela += " <td>"+lista[i].COD_TAREFA+"</td>";
        tabela += " <td>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += " <td>"+lista[i].DSC_ATIVIDADE+"</td>";
        tabela += " <td>"+lista[i].DSC_ARTEFATO+"</td>";
        var codTarefa = "'"+lista[i].COD_TAREFA+"'";
        tabela += " <td>\n\
                        <button class='btn btn-success btn-sm mb-1' onclick=\"javascript:editarRelacionamento("+lista[i].COD_DISCIPLINA_ATIVIDADE+", "+lista[i].COD_DISCIPLINA+", "+lista[i].COD_ARTEFATO+", "+codTarefa+" , "+lista[i].COD_ATIVIDADE_ARTEFATO+");\" title='Editar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-pencil-alt'></i>\n\
                            </span>\n\
                        </button>";
        if (lista[i].IND_ATIVO=='S'){
            tabela += " <button class='btn btn-danger btn-sm' onclick='javascript:atualizaAtividadeArtefato("+lista[i].COD_ATIVIDADE_ARTEFATO+", 0);' title='Desativar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-power-off'></i>\n\
                            </span>\n\
                        </button>";
        }else{
            tabela += " <button class='btn btn-success btn-sm' onclick='javascript:atualizaAtividadeArtefato("+lista[i].COD_ATIVIDADE_ARTEFATO+", 1);' title='Ativar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-power-off'></i>\n\
                            </span>\n\
                        </button>";
        }
        tabela += " </td>";
        tabela += "</tr>";
    }
    tabela += " </tbody>";
    tabela += " </table>";
    $("#listaArtefatos").html(tabela);

    $('#atvdArtefatoTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
}

function atualizaAtividadeArtefato(codigoAtividadeArtefato, indAtivo){
    var ativo = indAtivo==0?'N':'S';
    var parametros = 'codAtividadeArtefato;'+codigoAtividadeArtefato+'|indAtivo;'+ativo;
    ExecutaDispatch('AtividadeArtefato', 'UpdateAtividadeArtefato', parametros, AtualizaDados, "Aguarde, salvando vínculo", "Vínculo salvo com sucesso");
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