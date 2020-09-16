var todasComplexidades;
$(function () {
    $(".new").click(function() {
        $("#exampleModalLabel").html("Nova Complexidade");
        $("#codComplexidade").val(0);
        $("#dscComplexidade").val("");
        $("#indAtivo").prop('checked', false);
    });
});

function CarregaGridComplexidade(listaComplexidade) {
    MontaTabelaComplexidade(listaComplexidade[1]);
}

function MontaTabelaComplexidade(listaComplexidade) {
    todasComplexidades = listaComplexidade;
    var html = '';
    html +='<table class="table table-striped table-hover table-bordered" id="complexidadeTable" width="100%" cellspacing="0">';
    html +='    <thead>';
    html +='        <tr>';
    html +='            <th width="10%">Código</th>';
    html +='            <th width="75%">Descrição</th>';
    html +='            <th width="10%" class="text-center">Ativo</th>';
    html +='            <th width="5%"></th>';
    html +='        </tr>';
    html +='    </thead>';
    html +='    <tbody>';
    for(var i in listaComplexidade) {
        html +='    <tr>';
        html +='        <td>'+listaComplexidade[i]['COD_COMPLEXIDADE']+'</td>';
        html +='        <td>'+listaComplexidade[i]['DSC_COMPLEXIDADE']+'</td>';
        if(listaComplexidade[i]['ATIVO'] == true) {
            html +='    <td class="text-center">Sim</td>';
        } else {
            html +='    <td class="text-center">Não</td>';
        }
        html +='        <td class="text-center">';
        html +='            <button class="btn btn-success btn-sm edit" data-id="'+listaComplexidade[i]['COD_COMPLEXIDADE']+'" data-toggle="modal" title="Editar">';
        html +='                <span class="icon">';
        html +='                    <i class="fas fa-pencil-alt"></i>';
        html +='                </span>';
        html +='            </button>';
        html +='        </td>';
        html +='    </tr>';
    }
    html +='    </tbody>';
    html +='</table>';

    $("#listaComplexidade").html(html);

    $('#complexidadeTable').DataTable({
            "searching": false,
            "pagingType": "simple_numbers",
            "lengthChange" : false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        $("#exampleModalLabel").html("Editar Complexidade");
        var item = todasComplexidades.filter(elm => elm.COD_COMPLEXIDADE == $(this).data('id'));
        $("#codComplexidade").val(item[0].COD_COMPLEXIDADE);
        $("#dscComplexidade").val(item[0].DSC_COMPLEXIDADE);
        $("#indAtivo").prop('checked', item[0].ATIVO);
        $("#complexidadeModal").modal('show');
    });
}

$(document).ready(function () {
    ExecutaDispatch('Complexidade', 'ListarComplexidade', '', CarregaGridComplexidade);
});