$(function(){
    $("#btnPesquisar").click(function(){
        if ($("#nroAnoReferencia").val() > 0 && $("#codUsuario").val() > 0) {
            var parametros = retornaParametros();
            ExecutaDispatch('GraficoAnual', 'ListarGraficoAnual', parametros, MontaGrafico);
        } else {
            swal({
                title: "Aviso!",
                text: "Selecione o Usuário e o Ano!",
                showConfirmButton: true,
                type: "info"
            });
        }
    });
});

function MontaGrafico(lista){
    lista = lista[1];
    var source =
    {
        localdata: lista,
        datatype: "json",
        updaterow: function (rowid, rowdata, commit) {
            commit(true);
        },
        datafields:
            [
                { name: 'NRO_MES_REFERENCIA', type: 'string' },
                { name: 'QTD_TOTAL_PONTOS', type: 'string' }
            ]
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    var settings = {
        title: "Pontuação por mês",
        description: "",
        showLegend: true,
        enableAnimations: true,
        padding: { left: 5, top: 5, right: 5, bottom: 5 },
        titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
        source: dataAdapter,
        xAxis:
            {
                dataField: 'NRO_MES_REFERENCIA',
                displayText: 'Mês de Referência',
                gridLines: { visible: true },
                valuesOnTicks: false
            },
        colorScheme: 'scheme01',
        columnSeriesOverlap: false,
        seriesGroups:
            [
                {
                    type: 'column',
                    valueAxis:
                    {
                        visible: true,
                        unitInterval: 100,
                        title: { text: 'Total de Pontos por Mês<br>' }
                    },
                    series: [
                            { dataField: 'QTD_TOTAL_PONTOS', displayText: 'Total de Pontos por Mês' }
                        ]
                }
            ]
    };
    // setup the chart
    $('#chartContainer').jqxChart(settings);    
}

function CarregaComboUsuario(arrDados) {
    CriarComboDispatchComTamanho('codUsuario', arrDados, -1, 300);
}

function CarregaComboAnos(anos) {
    CriarComboDispatch('nroAnoReferencia', anos,  new Date().getFullYear());
}

$(document).ready(function () {
    ExecutaDispatch('Usuario', 'ListarUsuarioCombo', '', CarregaComboUsuario);
    ExecutaDispatch('Execucao', 'ListarAnos', 'verificaPermissao;N|', CarregaComboAnos);
});


