$(function () {
    $("#CadComponente").jqxWindow({
        title: 'Cadastro de Componentes',
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
        $("#CadComponente").jqxWindow("open");
    });
});

function CarregaGridComponente(listaComponente) {
    MontaTabelaComponente(listaComponente[1]);
}

function MontaTabelaComponente(listaComponente) {
    var nomeGrid = 'listaComponente';
    var source =
    {
        localdata: listaComponente,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_COMPONENTE', type: 'string' },
                { name: 'DSC_COMPONENTE', type: 'string' },
                { name: 'ATIVO', type: 'boolean' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#" + nomeGrid).jqxGrid(
        {
            width: 690,
            height: 350,
            source: dataAdapter,
            theme: 'darkcyan',
            sortable: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            selectionmode: 'singlerow',
            columns: [
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_COMPONENTE', width: 40 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_COMPONENTE', columntype: 'textbox', width: 600 },
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

        preencheCamposForm(listaComponente[rowID], 'indAtivo;B|');
        $("#method").val("UpdateComponente");
        $("#CadComponente").jqxWindow("open");
    });
}
$(document).ready(function () {
    ExecutaDispatch('Componente', 'ListarComponente', '', CarregaGridComponente);
});