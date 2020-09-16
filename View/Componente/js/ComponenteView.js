var todasComponentes;
$(function () {
    $(".new").click(function() {
        $("#exampleModalLabel").html("Novo Componente");
        $("#codComponente").val(0);
        $("#dscComponente").val("");
        $("#indAtivo").prop('checked', false);
    });
});

function CarregaGridComponente(listaComponente) {
    MontaTabelaComponente(listaComponente[1]);
}

function MontaTabelaComponente(listaComponente) {
    todasComponentes = listaComponente;
    var html = '';
    html +='<table class="table table-striped table-hover table-bordered" id="componenteTable" width="100%" cellspacing="0">';
    html +='    <thead>';
    html +='        <tr>';
    html +='            <th width="10%">Código</th>';
    html +='            <th width="75%">Descrição</th>';
    html +='            <th width="10%" class="text-center">Ativo</th>';
    html +='            <th width="5%"></th>';
    html +='        </tr>';
    html +='    </thead>';
    html +='    <tbody>';
    for(var i in listaComponente) {
        html +='    <tr>';
        html +='        <td>'+listaComponente[i]['COD_COMPONENTE']+'</td>';
        html +='        <td>'+listaComponente[i]['DSC_COMPONENTE']+'</td>';
        if(listaComponente[i]['ATIVO'] == true) {
            html +='    <td class="text-center">Sim</td>';
        } else {
            html +='    <td class="text-center">Não</td>';
        }
        html +='        <td class="text-center">';
        html +='            <button class="btn btn-success btn-sm edit" data-id="'+listaComponente[i]['COD_COMPONENTE']+'" data-toggle="modal" title="Editar">';
        html +='                <span class="icon">';
        html +='                    <i class="fas fa-pencil-alt"></i>';
        html +='                </span>';
        html +='            </button>';
        html +='        </td>';
        html +='    </tr>';
    }
    html +='    </tbody>';
    html +='</table>';

    $("#listaComponente").html(html);

    $('#componenteTable').DataTable({
            "searching": false,
            "pagingType": "simple_numbers",
            "lengthChange" : false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        $("#exampleModalLabel").html("Editar Componente");
        var item = todasComponentes.filter(elm => elm.COD_COMPONENTE == $(this).data('id'));
        $("#codComponente").val(item[0].COD_COMPONENTE);
        $("#dscComponente").val(item[0].DSC_COMPONENTE);
        $("#indAtivo").prop('checked', item[0].ATIVO);
        $("#componenteModal").modal('show');
    });
}

$(document).ready(function () {
    ExecutaDispatch('Componente', 'ListarComponente', '', CarregaGridComponente);
});