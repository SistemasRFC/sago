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
    $("#chartContainer").remove();
    $("#divCanvas").append('<canvas id="chartContainer"></canvas>');
    CriarGraficoBarras('chartContainer', lista[1]);
}

function CarregaComboUsuario(arrDados) {
    CriarSelectPuro('codUsuario', arrDados, -1);
}

function CarregaComboAnos(anos) {
    CriarSelectPuro('nroAnoReferencia', anos,  new Date().getFullYear());
}

$(document).ready(function () {
    ExecutaDispatch('Usuario', 'ListarUsuarioCombo', '', CarregaComboUsuario);
    ExecutaDispatch('Execucao', 'ListarAnos', 'verificaPermissao;N|', CarregaComboAnos);
});


