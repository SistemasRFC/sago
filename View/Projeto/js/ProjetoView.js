$(function () {
    $("#CadProjeto").jqxWindow({
        title: 'Cadastro de Projetos',
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
        $("#CadProjeto").jqxWindow("open");
    });
});

function CarregaGridProjeto(listaProjeto) {
    MontaTabelaProjeto(listaProjeto[1]);
}

function MontaTabelaProjeto(listaProjeto) {
    var nomeGrid = 'listaProjeto';
    var source =
    {
        localdata: listaProjeto,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_PROJETO', type: 'string' },
                { name: 'DSC_PROJETO', type: 'string' },
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
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_PROJETO', width: 50 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_PROJETO', columntype: 'textbox', width: 700 },
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

        preencheCamposForm(listaProjeto[rowID], 'indAtivo;B|');
        $("#method").val("UpdateMenu");
        $("#CadProjeto").jqxWindow("open");
    });
}
$(document).ready(function () {
    ExecutaDispatch('Projeto', 'ListarProjeto', '', CarregaGridProjeto);
});