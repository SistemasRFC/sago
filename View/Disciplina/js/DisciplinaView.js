var todasDisciplinas;
$(function () {
    $(".new").click(function() {
        $("#exampleModalLabel").html("Nova Disciplina");
        $("#codDisciplina").val(0);
        $("#dscDisciplina").val("");
        $("#indAtivo").prop('checked', false);
    });
});

function CarregaGridDisciplina(listaDisciplina) {
    MontaTabelaDisciplina(listaDisciplina[1]);
}

function MontaTabelaDisciplina(listaDisciplina) {
    todasDisciplinas = listaDisciplina;
    var html = '';
    html +='<table class="table table-striped table-hover table-bordered" id="disciplinaTable" width="100%" cellspacing="0">';
    html +='    <thead>';
    html +='        <tr>';
    html +='            <th width="10%">Código</th>';
    html +='            <th width="75%">Descrição</th>';
    html +='            <th width="10%" class="text-center">Ativo</th>';
    html +='            <th width="5%"></th>';
    html +='        </tr>';
    html +='    </thead>';
    html +='    <tbody>';
    for(var i in listaDisciplina) {
        html +='    <tr>';
        html +='        <td>'+listaDisciplina[i]['COD_DISCIPLINA']+'</td>';
        html +='        <td>'+listaDisciplina[i]['DSC_DISCIPLINA']+'</td>';
        if(listaDisciplina[i]['ATIVO'] == true) {
            html +='    <td class="text-center">Sim</td>';
        } else {
            html +='    <td class="text-center">Não</td>';
        }
        html +='        <td class="text-center">';
        html +='            <button class="btn btn-success btn-sm edit" data-id="'+listaDisciplina[i]['COD_DISCIPLINA']+'" data-toggle="modal" title="Editar">';
        html +='                <span class="icon">';
        html +='                    <i class="fas fa-pencil-alt"></i>';
        html +='                </span>';
        html +='            </button>';
        html +='        </td>';
        html +='    </tr>';
    }
    html +='    </tbody>';
    html +='</table>';

    $("#listaDisciplina").html(html);

    $('#disciplinaTable').DataTable({
            "searching": false,
            "pagingType": "simple_numbers",
            "lengthChange" : false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        $("#exampleModalLabel").html("Editar Disciplina");
        var item = todasDisciplinas.filter(elm => elm.COD_DISCIPLINA == $(this).data('id'));
        $("#codDisciplina").val(item[0].COD_DISCIPLINA);
        $("#dscDisciplina").val(item[0].DSC_DISCIPLINA);
        $("#indAtivo").prop('checked', item[0].ATIVO);
        $("#disciplinaModal").modal('show');
    });
}

$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplina', '', CarregaGridDisciplina);
});