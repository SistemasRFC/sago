$(function () {
    $("#CadComplexidade").jqxWindow({
        title: 'Cadastro de Complexidades',
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
        $("#CadComplexidade").jqxWindow("open");
    });
});

function CarregaGridComplexidade(listaComplexidade) {
    MontaTabelaComplexidade(listaComplexidade[1]);
}

function MontaTabelaComplexidade(listaComplexidade) {
    var nomeGrid = 'listaComplexidade';
    var source =
    {
        localdata: listaComplexidade,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_COMPLEXIDADE', type: 'string' },
                { name: 'DSC_COMPLEXIDADE', type: 'string' },
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
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_COMPLEXIDADE', width: 45 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_COMPLEXIDADE', columntype: 'textbox', width: 600 },
                { text: 'Ativo', datafield: 'ATIVO', columntype: 'checkbox', width: 45, align: 'center' }
            ]
        });
    // events
    $("#" + nomeGrid).jqxGrid('localizestrings', localizationobj);
    $('#' + nomeGrid).on('rowdoubleclick', function (event) {
        var args = event.args;
        var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
        var rowData = rows[args.visibleindex];
        var rowID = rowData.uid;

        preencheCamposForm(listaComplexidade[rowID], 'indAtivo;B|');
        $("#method").val("UpdateComplexidade");
        $("#CadComplexidade").jqxWindow("open");
    });
}
$(document).ready(function () {
    ExecutaDispatch('Complexidade', 'ListarComplexidade', '', CarregaGridComplexidade);
});