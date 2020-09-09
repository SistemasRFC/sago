var todasArtefatos;
$(function () {
    $(".new").click(function() {
        $("#exampleModalLabel").html("Novo Artefato");
        $("#codArtefato").val(0);
        $("#dscArtefato").val("");
        $("#indAtivo").prop('checked', false);
    });
});

function CarregaGridArtefato(listaArtefato) {
    MontaTabelaArtefato(listaArtefato[1]);
}

function MontaTabelaArtefato(listaArtefato) {
    todasArtefatos = listaArtefato;
    var html = '';
    html +='<table class="table table-striped table-hover table-bordered" id="artefatoTable" width="100%" cellspacing="0">';
    html +='    <thead>';
    html +='        <tr>';
    html +='            <th width="10%">Código</th>';
    html +='            <th width="75%">Descrição</th>';
    html +='            <th width="10%" class="text-center">Ativo</th>';
    html +='            <th width="5%"></th>';
    html +='        </tr>';
    html +='    </thead>';
    html +='    <tbody>';
    for(var i in listaArtefato) {
        html +='    <tr>';
        html +='        <td>'+listaArtefato[i]['COD_ARTEFATO']+'</td>';
        html +='        <td>'+listaArtefato[i]['DSC_ARTEFATO']+'</td>';
        if(listaArtefato[i]['ATIVO'] == true) {
            html +='    <td class="text-center">Sim</td>';
        } else {
            html +='    <td class="text-center">Não</td>';
        }
        html +='        <td class="text-center">';
        html +='            <button class="btn btn-success btn-sm edit" data-id="'+listaArtefato[i]['COD_ARTEFATO']+'" data-toggle="modal" title="Editar">';
        html +='                <span class="icon">';
        html +='                    <i class="fas fa-pencil-alt"></i>';
        html +='                </span>';
        html +='            </button>';
        html +='        </td>';
        html +='    </tr>';
    }
    html +='    </tbody>';
    html +='</table>';

    $("#listaArtefato").html(html);

    $('#artefatoTable').DataTable({
            "searching": false,
            "pagingType": "simple_numbers",
            "lengthChange" : false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        $("#exampleModalLabel").html("Editar Artefato");
        var item = todasArtefatos.filter(elm => elm.COD_ARTEFATO == $(this).data('id'));
        $("#codArtefato").val(item[0].COD_ARTEFATO);
        $("#dscArtefato").val(item[0].DSC_ARTEFATO);
        $("#indAtivo").prop('checked', item[0].ATIVO);
        $("#artefatoModal").modal('show');
    });
}

$(document).ready(function () {
    ExecutaDispatch('Artefato', 'ListarArtefato', '', CarregaGridArtefato);
});