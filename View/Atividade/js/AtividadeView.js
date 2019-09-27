$(function () {
    $("#CadAtividade").jqxWindow({
        title: 'Cadastro de Atividades',
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
        $("#CadAtividade").jqxWindow("open");
    });
});

function CarregaGridAtividade(listaAtividade) {
    MontaTabelaAtividade(listaAtividade[1]);
}

function MontaTabelaAtividade(listaAtividade) {
    var nomeGrid = 'listaAtividade';
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
                { name: 'DSC_ATIVIDADE', type: 'string' },
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
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_ATIVIDADE', width: 50 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_ATIVIDADE', columntype: 'textbox', width: 700 },
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

        preencheCamposForm(listaAtividade[rowID], 'indAtivo;B|');
        $("#method").val("UpdateMenu");
        $("#CadAtividade").jqxWindow("open");
    });
}
$(document).ready(function () {
    ExecutaDispatch('Atividade', 'ListarAtividade', '', CarregaGridAtividade);
});