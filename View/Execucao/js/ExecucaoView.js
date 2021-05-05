var todasExecucoes;
$(function () {
    $("#btnSalvarExecucao").click(function () {
        SalvarExecucao();        
    });
    $("#btnNovaOF").click(function(){
        LimparCampos();
        $("#cadNovaOF").show("fade");
        $("#btnNovaOF").hide("fade");
    });
    $("#btnCancelar").click(function(){
        $("#cadNovaOF").hide("fade");
        $("#btnNovaOF").show("fade");
    });

});

function ExcluirOf(codExecucao){
    swal({
        title: "Excluir",
        text: "Deseja realmente excluir essa O.F.?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim",
        cancelButtonText: "Não",
    },
    function(isConfirm) {
      if (isConfirm) {
            $("#method").val('DeleteExecucao');
            var parametros = "codExecucao;"+codExecucao;
            ExecutaDispatch('Execucao', $("#method").val(), parametros, AtualizaGrid, 'Aguarde, excluíndo!', 'Registro excluído!');    
            $("#CadExecucao").jqxWindow("close");
      } else {
        swal("Cancelado", "Nada aconteceu :)");
      }
    });
}

function SalvarExecucao(){
    if ($('#codExecucao').val() == '') {
        $("#method").val('InsertExecucao');
        $("#indStatus").val('E');
    } else {
        $("#method").val('UpdateExecucao');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Execucao', $("#method").val(), parametros, AtualizaGrid, 'Aguarde, Salvando!', 'Registro salvo!');
    LimparCampos();
    $("#cadNovaOF").hide("fade");
    $("#btnNovaOF").show();
}
function AtualizaGrid(){
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
    LimparCampos();
}
function CarregaGridExecucao(listaExecucao) {
    $("#divListaExecucao").html("<div id='listaExecucao'></div>");
    MontaTabelaExecucao(listaExecucao[1]);
}

function MontaTabelaExecucao(listaExecucao) {
    todasExecucoes = listaExecucao;
    var html = '';
    html +='<table class="table table-striped table-hover table-bordered" id="execucaoTable" width="100%" cellspacing="0">';
    html +='    <thead>';
    html +='        <tr>';
    html +='            <th style="vertical-align: middle">Código</th>';
    html +='            <th style="vertical-align: middle" width="45%">O.F.</th>';
    html +='            <th style="vertical-align: middle">Pontuação</th>';
    html +='            <th style="vertical-align: middle" class="text-center">Status</th>';
    html +='            <th style="vertical-align: middle" class="text-center">Período referência</th>';
    html +='            <th style="vertical-align: middle" width="15%"></th>';
    html +='        </tr>';
    html +='    </thead>';
    html +='    <tbody>';
    for(var i in listaExecucao) {
        html +='    <tr>';
        html +='        <td>'+listaExecucao[i].COD_EXECUCAO+'</td>';
        html +='        <td>'+listaExecucao[i].COD_OF+'</td>';
        html +='        <td>'+listaExecucao[i].QTD_PONTOS_TOTAL+'</td>';
        html +='        <td class="text-center">'+listaExecucao[i].IND_STATUS+'</td>';
        html +='        <td class="text-right">'+listaExecucao[i].PERIODO_REFERENCIA+'</td>';
        if(listaExecucao[i].IND_STATUS != 'Finalizada'){
            html +='        <td class="text-center">';
            html +='            <button class="btn btn-primary btn-sm edit" data-id="'+listaExecucao[i].COD_EXECUCAO+'" data-toggle="modal" title="Editar">';
            html +='                <span class="icon">';
            html +='                    <i class="fas fa-pencil-alt"></i>';
            html +='                </span>';
            html +='            </button>';
            html +='            <button class="btn btn-success btn-sm fin" data-id="'+listaExecucao[i].COD_EXECUCAO+'" title="Finalizar">';
            html +='                <span class="icon">';
            html +='                    <i class="fas fa-check"></i>';
            html +='                </span>';
            html +='            </button>';
            html +='            <button class="btn btn-danger btn-sm del" data-id="'+listaExecucao[i].COD_EXECUCAO+'" title="Excluir">';
            html +='                <span class="icon">';
            html +='                    <i class="fas fa-trash"></i>';
            html +='                </span>';
            html +='            </button>';
            html +='        </td>';
        } else {
            html +='        <td>';
            html +='        </td>';
        }
        html +='    </tr>';
    }
    html +='    </tbody>';
    html +='</table>';

    $("#listaExecucao").html(html);
    
    $('#execucaoTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "order": [[ 1, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        var item = todasExecucoes.filter(elm => elm.COD_EXECUCAO == $(this).data('id'));
        $("#codExecucao").val(item[0].COD_EXECUCAO);
        carregaOf();
        $("#infoOF").html("O.F. "+item[0].COD_OF);
        LimparCamposExecucao();
        $("#execucaoModal").modal('show');
    });
    $(".del").click(function(){
        ExcluirOf($(this).data('id'));
    });
    $(".fin").click(function(){
        var item = todasExecucoes.filter(elm => elm.COD_EXECUCAO == $(this).data('id'));
        FinalizarOf(item[0]);
    });
}

function CarregaComboMeses(meses) {
    CriarSelectPuro('nroMesReferencia', meses, new Date().getMonth()+1);
}

function CarregaComboAnos(anos) {
    CriarSelectPuro('nroAnoReferencia', anos, new Date().getFullYear());
}

function FinalizarOf(item){
    swal({
        title: "Finalizar",
        text: "Deseja realmente finalizar essa O.F.?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim",
        cancelButtonText: "Não",
    },
    function(isConfirm) {
      if (isConfirm) {
            preencheCamposForm(item);
            $("#indStatus").val('F');
            SalvarExecucao();
      } else {
        swal("Cancelado", "Nada aconteceu :)");
      }
    });
}

$(document).ready(function () {
    $("#cadNovaOF").hide();
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
    ExecutaDispatch('Execucao', 'ListarMeses', 'verificaPermissao;N|', CarregaComboMeses);
    ExecutaDispatch('Execucao', 'ListarAnos', 'verificaPermissao;N|', CarregaComboAnos);    
});