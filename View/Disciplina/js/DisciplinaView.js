$(function () {
    $("#CadDisciplina").jqxWindow({
        title: 'Cadastro de Disciplinas',
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
        $("#CadDisciplina").jqxWindow("open");
    });
});

function CarregaGridDisciplina(listaDisciplina) {
    MontaTabelaDisciplina(listaDisciplina[1]);
}

function MontaTabelaDisciplina(listaDisciplina) {
    var nomeGrid = 'listaDisciplina';
    var source =
    {
        localdata: listaDisciplina,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'COD_DISCIPLINA', type: 'string' },
                { name: 'DSC_DISCIPLINA', type: 'string' },
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
                { text: 'C&oacute;d.', columntype: 'textbox', datafield: 'COD_DISCIPLINA', width: 50 },
                { text: 'Descri&ccedil;&atilde;o', datafield: 'DSC_DISCIPLINA', columntype: 'textbox', width: 700 },
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

        preencheCamposForm(listaDisciplina[rowID], 'indAtivo;B|');
        $("#method").val("UpdateMenu");
        $("#CadDisciplina").jqxWindow("open");
    });
}
$(document).ready(function () {
    ExecutaDispatch('Disciplina', 'ListarDisciplina', '', CarregaGridDisciplina);
});