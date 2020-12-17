$(function() {
    // Só pra comitar
});

// Em construção

function CarregaDados(dados) {
    var dado = dados[1];
    $("#projeto").html(dado[0]?dado[0].DSC_PROJETO:"-");
    $("#pontuacao").html( number_format(dado.PONTUACAO_MES_ATUAL!=null?dado.PONTUACAO_MES_ATUAL[0].PONTUACAO_ATUAL:0, 1, ",", ".")+ " USTIBB");
    CriarGraficoArea('areaChart', dado.PONTUACAO_SEMESTRE_ATUAL?dado.PONTUACAO_SEMESTRE_ATUAL:[]);
}

$(document).ready(function () {
    ExecutaDispatch('MenuPrincipal', 'BuscarDadosIniciais', undefined, CarregaDados);
});