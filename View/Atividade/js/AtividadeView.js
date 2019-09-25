$(function () {
    $("#CadAtividade").jqxWindow({
        title: 'Cadastro de Atividades',
        height: 250,
        width: 650,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        theme: 'darkcyan',
        isModal: true,
        autoOpen: false,
        position: {x: (widthTela/2)-(650/2), y: (heightTela/2)-(250/2)}
    });

    $("#btnNovo").click(function () {
        LimparCampos();
        $("#CadAtividade").jqxWindow("open");
    });
});

function CarregaGridAtividade(listaAtividade) {
    MontaTabelaAtividade(listaAtividade[1]);
}

function MontaTabelaAtividade(listaAtividade) {
    var nomeGrid = 'listaAtividade';
    var contextMenu = $("#jqxMenu").jqxMenu({ width: '120px', autoOpenPopup: false, mode: 'popup', theme: 'darkcyan' });
    var source =
    {
        localdata: listaAtividade,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_ATIVIDADE', type: 'string' },
                { name: 'DSC_ATIVIDADE', type: 'string' }
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
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_ATIVIDADE', width: 40 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_ATIVIDADE', columntype: 'textbox', width: 695 }
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
            contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
            $("#codAtividade").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).COD_ATIVIDADE);
            $("#dscAtividade").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).DSC_ATIVIDADE);
            return false;
        }
    });
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaAtividade[rowID], '');
        $("#method").val("UpdateMenu");
        $("#CadAtividade").jqxWindow("open");
    });
    $("#jqxMenu").on('itemclick', function (event) {
        var args = event.args;
        var rowindex = $("#"+nomeGrid).jqxGrid('getselectedrowindex');
        if ($.trim($(args).text()) == "Editar") {
            $("#CadAtividade").jqxWindow("open");
        } else if ($.trim($(args).text()) == "Novo") {
            $("#btnNovo").click();
        }
    });
}
$(document).ready(function () {
    ExecutaDispatch('Atividade', 'ListarAtividade', '', CarregaGridAtividade);
    $(document).on('contextmenu', function (e) {
        return false;
    });
});