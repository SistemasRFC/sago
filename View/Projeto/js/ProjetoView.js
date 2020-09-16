var listaProjetos;
$(function () {
    $("#btnNovo").click(function () {
        LimparCampos();
        $("#method").val("InsertProjeto");
        $("#projetoModal").modal('show');
    });
});

function CarregaGridProjeto(listaProjeto) {
    MontaTabelaProjeto(listaProjeto[1]);
}

function MontaTabelaProjeto(listaProjeto) {
    listaProjetos = listaProjeto;
    var tabela = "";
    tabela +='<table class="table table-striped table-hover table-bordered" id="projetoTable" width="100%">';
    tabela +='    <thead>';
    tabela +='        <tr>';
    tabela +='            <th width="10%">Código</th>';
    tabela +='            <th width="75%">Descrição</th>';
    tabela +='            <th width="10%" class="text-center">Ativo</th>';
    tabela +='            <th width="5%"> </th>';
    tabela +='        </tr>';
    tabela +='    </thead>';
    tabela +='    <tbody>';
    for(var i in listaProjeto) {
        tabela +='    <tr>';
        tabela +='        <td>'+listaProjeto[i]['COD_PROJETO']+'</td>';
        tabela +='        <td>'+listaProjeto[i]['DSC_PROJETO']+'</td>';
        if(listaProjeto[i]['ATIVO'] == true) {
            tabela +='    <td class="text-center">Sim</td>';
        } else {
            tabela +='    <td class="text-center">Não</td>';
        }
        tabela +='        <td class="text-center">';
        tabela +='            <button class="btn btn-success btn-sm edit" data-id="'+listaProjeto[i]['COD_PROJETO']+'" data-toggle="modal" title="Editar">';
        tabela +='                <span class="icon">';
        tabela +='                    <i class="fas fa-pencil-alt"></i>';
        tabela +='                </span>';
        tabela +='            </button>';
        tabela +='        </td>';
        tabela +='    </tr>';
    }
    tabela +='    </tbody>';
    tabela +='</table>';

    $("#listaProjeto").html(tabela);

    $('#projetoTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        $("#exampleModalLabel").html("Editar Projeto");
        var item = listaProjetos.filter(elm => elm.COD_PROJETO == $(this).data('id'));
        preencheCamposForm(item[0], 'indAtivo;B|');
        $("#method").val("UpdateProjeto");
        $("#projetoModal").modal('show');
    });
}
$(document).ready(function () {
    ExecutaDispatch('Projeto', 'ListarProjeto', '', CarregaGridProjeto);
});