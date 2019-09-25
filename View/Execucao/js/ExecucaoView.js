$(function () {
    $("#CadExecucao").jqxWindow({
        title: 'Cadastro de Execução',
        height: 700,
        maxHeight: 900,
        width: 1050,
        maxWidth: 1050,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        theme: 'darkcyan',
        isModal: true,
        autoOpen: false,
        position: { x: 435, y: 90 }
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
    $("#method").val('DeleteExecucao');
    var parametros = retornaParametros();
    ExecutaDispatch('Execucao', $("#method").val(), parametros, AtualizaGrid);    
    $("#CadExecucao").jqxWindow("close");
}

function SalvarExecucao(){
    if ($('#codExecucao').val() == '') {
        $("#method").val('InsertExecucao');
    } else {
        $("#method").val('UpdateExecucao');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Execucao', $("#method").val(), parametros, AtualizaGrid);
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
                { name: 'QTD_PONTOS_TOTAL', type: 'string' }
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
                { text: 'OF', datafield: 'COD_OF', columntype: 'textbox', width: 395 },
                { text: 'Pontuação da OF', datafield: 'QTD_PONTOS_TOTAL', columntype: 'textbox', width: 195 }
            ]
        });
    // events
    $('#' + nomeGrid).on('rowclick', function (event) {
        var args = event.args;
        var row = args.rowindex;

        if (event.args.rightclick) {

            $("#"+nomeGrid).jqxGrid('selectrow', event.args.rowindex);
            var scrollTop = $(window).scrollTop();
            var scrollLeft = $(window).scrollLeft();
            $("#codExecucao").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).COD_EXECUCAO);
            $("#codOf").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).COD_OF);
            return false;
        }
    });
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

}

$(document).ready(function () {
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
    $("#cadNovaOf").hide();
});