$(function(){
    $("#btnPesquisar").click(function(){
        if ($("#nroMesReferencia").val() != 0 && $("#nroAnoReferencia").val() != 0) {
            var parametros = retornaParametros();
            ExecutaDispatch('RelatorioPontuacaoUsuario', 'ListarRelatorioPontuacaoUsuario', parametros, MontaTabelaExecucao);
        } else {
            swal({
                title: "Aviso!",
                text: "Selecione o Mês e o Ano!",
                showConfirmButton: true,
                type: "info"
            });
        }
    });
});

function MontaTabelaExecucao(lista){
    lista = lista[1];
    $("#listagemExecucao").html('');
    if (lista!=null){
        var tabela = "<table align='center' width='80%' cellspacing=0>";
        tabela += '<tr><td><br></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        var totalOfs = lista.length;
        var totalPontos = 0;
        tabela += '<tr>';
        tabela += '<td style="border: 1px solid #000000;"><b>Usuário</b></td>';
        tabela += '<td style="border: 1px solid #000000;"><b>Pontos</b></td>';
        tabela += '</tr>';        
        var corLinha = 'white';
        for (var i=0;i<totalOfs;i++){
            if (corLinha == 'white'){
                corLinha = 'silver';
            }else{
                corLinha = 'white';
            }
            tabela += '<tr bgcolor="'+corLinha+'">';
            tabela += '<td style="border: 1px solid #000000;">'+lista[i].NME_USUARIO_COMPLETO+'</td>';
            tabela += '<td style="border: 1px solid #000000;">'+lista[i].QTD_TOTAL_PONTOS+'</td>';
            tabela += '</tr>';           
        }
        tabela += '<tr><td><br></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        tabela += "</table>";
//        wLeft = window.screenLeft ? window.screenLeft : window.screenX;
//        wTop = window.screenTop ? window.screenTop : window.screenY;
//        var w = 1000;
//        var h = 700;
//        var left = wLeft + (window.innerWidth / 2) - (w / 2);
//        var top = wTop + (window.innerHeight / 2) - (h / 2);    
//        var tmpSinteticoPagamentoColaborador = window.open('', 'Relatório Gerencial', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left + ', screenX=' + left + ', screenY=' + top);
//        tmpSinteticoPagamentoColaborador.document.body.innerHTML='';
//        tmpSinteticoPagamentoColaborador.document.write(tabela);
//        tmpSinteticoPagamentoColaborador.focus();
        $("#listagemExecucao").html(tabela);
    }else{
        swal({
            title: "",
            text: "Sem dados para a pesquisa!",
            type: "warning",
            confirmButtonText: "Fechar"
        });        
    }
}

function CarregaComboMeses(meses) {

    CriarComboDispatch('nroMesReferencia', meses, new Date().getMonth()+1);
}

function CarregaComboAnos(anos) {
    CriarComboDispatch('nroAnoReferencia', anos,  new Date().getFullYear());
}

$(document).ready(function () {
    ExecutaDispatch('Execucao', 'ListarMeses', 'verificaPermissao;N|', CarregaComboMeses);
    ExecutaDispatch('Execucao', 'ListarAnos', 'verificaPermissao;N|', CarregaComboAnos);
});


