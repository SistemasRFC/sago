$(function () {
    $("#btnInserir").click(function(){
        var parametros = retornaParametros();
        parametros += "indAtivo;S";
        ExecutaDispatch('ArtefatoComplexidade', 'InsertArtefatoComplexidade', parametros, AtualizaDados, "Aguarde, salvando vínculo", "Vínculo salvo com sucesso");
    });

});

function CarregaComboDisciplina(arrDados) {
    CriarSelectPuro('codDisciplina', arrDados, 0);
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
    CriarSelectPuro('codDisciplinaAtividade', arrDados, 0);
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
    CriarSelectPuro('codAtividadeArtefato', arrDados, 0);
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
    CriarSelectPuro('codComplexidade', arrDados, 0);
}

function MontaListaAtividades(lista){
    lista = lista[1];
    $("#listaComplexidades").html("");
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='artefatoComplexTable' width='100%'>";
    tabela += " <thead>";
    tabela += " <tr>";
    tabela += "     <th>Disciplina</th>";
    tabela += "     <th>Atividade</th>";
    tabela += "     <th>Artefato</th>";
    tabela += "     <th>Complexidade</th>";
    tabela += "     <th>Ação</th>";
    tabela += " </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for (var i in lista){
        tabela += "<tr>";
        tabela += " <td>"+lista[i].DSC_DISCIPLINA+"</td>";
        tabela += " <td>"+lista[i].DSC_ATIVIDADE+"</td>";
        tabela += " <td>"+lista[i].DSC_ARTEFATO+"</td>";
        tabela += " <td>"+lista[i].DSC_COMPLEXIDADE+"</td>";
        tabela += " <td>";
        if (lista[i].IND_ATIVO=='S'){
            tabela += " <button class='btn btn-danger btn-sm' onclick='javascript:atualizaArtefatoComplexidade("+lista[i].COD_ARTEFATO_COMPLEXIDADE+", 0);' title='Desativar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-power-off'></i>\n\
                            </span>\n\
                        </button>";
        } else {
            tabela += " <button class='btn btn-success btn-sm' onclick='javascript:atualizaArtefatoComplexidade("+lista[i].COD_ARTEFATO_COMPLEXIDADE+", 1);' title='Ativar'>\n\
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

    $('#artefatoComplexTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });

}

function atualizaArtefatoComplexidade(codigoArtefatoComplexidade, indAtivo){
    var ativo = indAtivo==0?'N':'S';
    var parametros = 'codArtefatoComplexidade;'+codigoArtefatoComplexidade+'|indAtivo;'+ativo;
    ExecutaDispatch('ArtefatoComplexidade', 'UpdateArtefatoComplexidade', parametros, AtualizaDados, "Aguarde, salvando vínculo", "Vínculo salvo com sucesso");
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});