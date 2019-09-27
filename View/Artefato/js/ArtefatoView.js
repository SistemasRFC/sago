$(function () {
    $("#CadArtefato").jqxWindow({
        title: 'Cadastro de Artefatos',
        height: 250,
        width: 600,
        animationType: 'fade',
        showAnimationDuration: 500,
        closeAnimationDuration: 500,
        theme: 'darkcyan',
        isModal: true,
        autoOpen: false,
        position: 'absolute'
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
                { name: 'DSC_ARTEFATO', type: 'string' },
                { name: 'ATIVO', type: 'boolean' }
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
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_ARTEFATO', width: 50 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_ARTEFATO', columntype: 'textbox', width: 700 },
                { text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 50, align: 'center' }
            ]
        });
    // events
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaArtefato[rowID], 'indAtivo;B|');
        $("#method").val("UpdateArtefato");
        $("#CadArtefato").jqxWindow("open");
    });
}
$(document).ready(function () {
    ExecutaDispatch('Artefato', 'ListarArtefato', '', CarregaGridArtefato);
});