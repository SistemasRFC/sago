$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        parametros += "indAtivo;S";
        ExecutaDispatch('DisciplinaAtividade', 'InsertDisciplinaAtividade', parametros, AtualizaDados);
    });

});

function CarregaComboDisciplina(arrDados) {
    CriarSelectPuro('codDisciplina', arrDados, 0, false);
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
    CriarSelectPuro('codAtividade', arrDados, 0, false);
}

function MontaListaAtividades(lista){
    lista = lista[1];
    $("#listaAtividades").html("");
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='disciplinaAtvdTable' width='100%'>";
    tabela += " <thead>";
    tabela += " <tr>";
    tabela += "     <th><b>Disciplina</b></th>";
    tabela += "     <th><b>Atividade</b></th>";
    tabela += "     <th><b>Ação</b></th>";
    tabela += " </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for (var i in lista){
        tabela += "<tr>";
        tabela += " <td>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += " <td>"+lista[i].DSC_ATIVIDADE+"</td>";
        if (lista[i].IND_ATIVO=='S'){
            tabela += " <td>\n\
                            <button class='btn btn-danger btn-sm' onclick='javascript:atualizaDisciplinaAtividade("+lista[i].COD_DISCIPLINA_ATIVIDADE+", 0);' title='Desativar'>\n\
                                <span class='icon'>\n\
                                    <i class='fas fa-power-off'></i>\n\
                                </span>\n\
                            </button>\n\
                        </td>";
        }else{
            tabela += " <td>\n\
                            <button class='btn btn-success btn-sm' onclick='javascript:atualizaDisciplinaAtividade("+lista[i].COD_DISCIPLINA_ATIVIDADE+", 1);' title='Ativar'>\n\
                                <span class='icon'>\n\
                                    <i class='fas fa-power-off'></i>\n\
                                </span>\n\
                            </button>\n\
                        </td>";
        }
        tabela += "</tr>";
    }
    tabela += "</tbody>";
    tabela += "</table>";
    
    $("#listaAtividades").html(tabela);

    $('#disciplinaAtvdTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
}

function atualizaDisciplinaAtividade(codDisciplinaAtividade, indAtivo){
    var ativo = indAtivo==0?'N':'S';
    var parametros = 'codDisciplinaAtividade;'+codDisciplinaAtividade+'|indAtivo;'+ativo;
    ExecutaDispatch('DisciplinaAtividade', 'UpdateDisciplinaAtividade', parametros, AtualizaDados);    
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});