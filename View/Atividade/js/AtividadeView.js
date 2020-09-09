var todasAtividades;
$(function () {
    $(".new").click(function() {
        $("#exampleModalLabel").html("Nova Atividade");
        $("#codAtividade").val(0);
        $("#dscAtividade").val("");
        $("#indAtivo").prop('checked', false);
    });
});

function CarregaGridAtividade(listaAtividade) {
    MontaTabelaAtividade(listaAtividade[1]);
}

function MontaTabelaAtividade(listaAtividade) {
    todasAtividades = listaAtividade;
    var html = '';
    html +='<table class="table table-striped table-hover table-bordered" id="atividadeTable" width="100%" cellspacing="0">';
    html +='    <thead>';
    html +='        <tr>';
    html +='            <th width="10%">Código</th>';
    html +='            <th width="75%">Descrição</th>';
    html +='            <th width="10%" class="text-center">Ativo</th>';
    html +='            <th width="5%"></th>';
    html +='        </tr>';
    html +='    </thead>';
    html +='    <tbody>';
    for(var i in listaAtividade) {
        html +='    <tr>';
        html +='        <td>'+listaAtividade[i]['COD_ATIVIDADE']+'</td>';
        html +='        <td>'+listaAtividade[i]['DSC_ATIVIDADE']+'</td>';
        if(listaAtividade[i]['ATIVO'] == true) {
            html +='    <td class="text-center">Sim</td>';
        } else {
            html +='    <td class="text-center">Não</td>';
        }
        html +='        <td class="text-center">';
        html +='            <button class="btn btn-success btn-sm edit" data-id="'+listaAtividade[i]['COD_ATIVIDADE']+'" data-toggle="modal" title="Editar">';
        html +='                <span class="icon">';
        html +='                    <i class="fas fa-pencil-alt"></i>';
        html +='                </span>';
        html +='            </button>';
        html +='        </td>';
        html +='    </tr>';
    }
    html +='    </tbody>';
    html +='</table>';

    $("#listaAtividade").html(html);

    $('#atividadeTable').DataTable({
            "searching": false,
            "pagingType": "simple_numbers",
            "lengthChange" : false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        $("#exampleModalLabel").html("Editar Atividade");
        var item = todasAtividades.filter(elm => elm.COD_ATIVIDADE == $(this).data('id'));
        $("#codAtividade").val(item[0].COD_ATIVIDADE);
        $("#dscAtividade").val(item[0].DSC_ATIVIDADE);
        $("#indAtivo").prop('checked', item[0].ATIVO);
        $("#atividadeModal").modal('show');
    });
}

$(document).ready(function () {
    ExecutaDispatch('Atividade', 'ListarAtividade', '', CarregaGridAtividade);
});