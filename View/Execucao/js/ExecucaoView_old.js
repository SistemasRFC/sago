$(function () {
    $("#CadExecucao").jqxWindow({
        title: 'Cadastro de Execução',
        height: 650,
        maxHeight: 900,
        width: 1050,
        maxWidth: 1050,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        theme: 'darkcyan',
        isModal: true,
        autoOpen: false,
        position: 'absolute'
    });

    $("#btnSalvarExecucao").click(function () {
        SalvarExecucao();        
    });
    $("#btnNovaOf").click(function(){
        LimparCampos();
        $("#cadNovaOf").show("fade");
        $("#btnNovaOf").hide();
    });
    $("#btnCancelar").click(function(){
        $("#cadNovaOf").hide("fade");
        $("#btnNovaOf").show();
    });
    $("#btnExcluirOf").click(function(){
        ExcluirOf();
    });
});

function ExcluirOf(){
    swal({
        title: "Excluir",
        text: "Deseja realmente excluir esse registro?",
        type: "warning",
        showCancelButton: true,
        buttons: ["Não", "Sim"],
    },
    function(isConfirm) {
      if (isConfirm) {
            $("#method").val('DeleteExecucao');
            var parametros = retornaParametros();
            ExecutaDispatch('Execucao', $("#method").val(), parametros, AtualizaGrid, 'Aguarde, excluíndo!', 'Registro excluído!');    
            $("#CadExecucao").jqxWindow("close");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
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
    $("#cadNovaOf").hide("fade");
    $("#btnNovaOf").show();
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
    var nomeGrid = 'listaExecucao';
    var contextMenu = $("#ofMenu").jqxMenu({ width: 200,  autoOpenPopup: false, mode: 'popup', theme: 'darkcyan' });
    var source =
    {
        localdata: listaExecucao,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_EXECUCAO', type: 'string' },
                { name: 'COD_OF', type: 'string' },
                { name: 'QTD_PONTOS_TOTAL', type: 'string' },
                { name: 'IND_STATUS', type: 'string' },
                { name: 'PERIODO_REFERENCIA', type: 'string' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 800,
            height: 350,
            source: dataAdapter,
            theme: 'darkcyan',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            selectionmode: 'singlerow',
            columns: [
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_EXECUCAO', width: 40 },
                { text: 'O.F.', datafield: 'COD_OF', columntype: 'textbox', width: 400 },
                { text: 'Pontuação', datafield: 'QTD_PONTOS_TOTAL', columntype: 'textbox', width: 90 },
                { text: 'Status', datafield: 'IND_STATUS', columntype: 'textbox', width: 130 },
                { text: 'Período referência', datafield: 'PERIODO_REFERENCIA', columntype: 'textbox', width: 140 }
            ]
        });
    // events
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaExecucao[rowID], '');
        carregaOf();
        LimparCamposExecucao();
        $("#CadExecucao").jqxWindow("open");
        return false;
    });
    $("#"+nomeGrid).on('contextmenu', function () {
        return false;
    });
    $("#"+nomeGrid).on('rowclick', function (event) {
        if (event.args.rightclick) {
            var args = event.args;
            var rows = $('#'+nomeGrid).jqxGrid('getdisplayrows');
            var rowData = rows[args.visibleindex];
            var rowID = rowData.uid;
            preencheCamposForm(listaExecucao[rowID], '');
            $("#"+nomeGrid).jqxGrid('selectrow', rowID);                       
            var scrollTop = $(window).scrollTop();
            var scrollLeft = $(window).scrollLeft();
            contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
            return false;
        }
    });
}

function CarregaComboMeses(meses) {
    CriarComboDispatch('nroMesReferencia', meses, 0);
}

function CarregaComboAnos(anos) {
    CriarComboDispatch('nroAnoReferencia', anos, 0);
}

$(document).ready(function () {
    $("#cadNovaOf").hide();
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
    ExecutaDispatch('Execucao', 'ListarMeses', 'verificaPermissao;N|', CarregaComboMeses);
    ExecutaDispatch('Execucao', 'ListarAnos', 'verificaPermissao;N|', CarregaComboAnos);
    
    $("#ofMenu").on('itemclick', function (event) {        
        var args = event.args; 
        if ($.trim($(args).text()) == "Finalizar") {
            $("#indStatus").val('F');
            SalvarExecucao();
        }else if ($.trim($(args).text()) == "Excluir"){             
            ExcluirOf();
        }
    });     
});