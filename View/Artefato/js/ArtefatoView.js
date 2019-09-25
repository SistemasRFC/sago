$(function () {
    $("#CadArtefato").jqxWindow({
        title: 'Cadastro de Artefatos',
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
        $("#CadArtefato").jqxWindow("open");
    });
});

function CarregaGridArtefato(listaArtefato) {
    MontaTabelaArtefato(listaArtefato[1]);
}

function MontaTabelaArtefato(listaArtefato) {
    var nomeGrid = 'listaArtefato';
    var contextMenu = $("#jqxMenu").jqxMenu({ width: '120px', autoOpenPopup: false, mode: 'popup', theme: 'darkcyan' });
    var source =
    {
        localdata: listaArtefato,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_ARTEFATO', type: 'string' },
                { name: 'DSC_ARTEFATO', type: 'string' }
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
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_ARTEFATO', width: 40 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_ARTEFATO', columntype: 'textbox', width: 695 }
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
            $("#codArtefato").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).COD_ARTEFATO);
            $("#dscArtefato").val($('#'+nomeGrid).jqxGrid('getrowdatabyid', args.rowindex).DSC_ARTEFATO);
            return false;
        }
    });
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaArtefato[rowID], '');
        $("#method").val("UpdateArtefato");
        $("#CadArtefato").jqxWindow("open");
    });
    $("#jqxMenu").on('itemclick', function (event) {
        var args = event.args;
        var rowindex = $("#"+nomeGrid).jqxGrid('getselectedrowindex');
        if ($.trim($(args).text()) == "Editar") {
            $("#CadArtefato").jqxWindow("open");
        } else if ($.trim($(args).text()) == "Novo") {
            $("#btnNovo").click();
        }
    });
}
$(document).ready(function () {
    ExecutaDispatch('Artefato', 'ListarArtefato', '', CarregaGridArtefato);
    $(document).on('contextmenu', function (e) {
        return false;
    });
});