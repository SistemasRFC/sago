$(function(){
    $("#btnPesquisar").click(function(){
        var parametros = retornaParametros();
        ExecutaDispatch('RelatorioGerencial', 'ListarRelatorioGerencial', parametros, MontaTabelaExecucao);
    });
});

function MontaTabelaExecucao(lista){
    lista = lista[1];
    $("#listagemExecucao").html('');
    if (lista!=null){
        var tabela = "<table align='center' width='90%'>";
        var totalOfs = lista.length;
        for (var i=0;i<totalOfs;i++){
            tabela += '<tr><td align="center"><h2>*******Descritivo da OF Executada*******</h2></td></tr>';
            tabela += '<tr>';
            tabela += '<td><b>Usuário: </b>'+lista[i].NME_USUARIO_COMPLETO+'</td>';
            tabela += '</tr>';
            tabela += '<tr>';
            tabela += '<td><b>OF: </b>'+lista[i].COD_OF+'</td>';
            tabela += '</tr>';
            var LEC = lista[i]['LEC'+lista[i].COD_EXECUCAO];
            var totalLEC = LEC.length;
            for (var iLEC=0;iLEC<totalLEC;iLEC++){
                tabela += '<tr><td style="border: 1px solid #000000">';
                tabela += "<table width='100%' align='center'>";
                tabela += '<tr><td colspan="2" align="center" style="border: 1px solid #000000; padding-top:15px;"><h3>Tarefa Executada</h3></td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Data: </b></td><td>'+LEC[iLEC].DTA_REGISTRO+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Tarefa: </b></td><td>'+LEC[iLEC].COD_TAREFA+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Disciplina:</b></td><td>'+LEC[iLEC].DSC_DISCIPLINA+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Atividade: </b></td><td>'+LEC[iLEC].DSC_ATIVIDADE+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Artefato: </b></td><td>'+LEC[iLEC].DSC_ARTEFATO+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Complexidade:</b></td><td>'+LEC[iLEC].DSC_COMPLEXIDADE+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Componente: </b></td><td>'+LEC[iLEC].DSC_COMPONENTE+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Pontuação: </b></td><td>'+LEC[iLEC].QTD_TOTAL_PONTOS+'</td></tr>';
                var LEA =  LEC[iLEC]['LEA'+LEC[iLEC].COD_EXECUCAO_COMPLEXIDADE];
                var totalLEA = Object.keys(LEA).length;
                tabela += '<tr>';
                tabela += '<td colspan="2" align="center"><h3>**********Arquivos Alterados***********</h3></td>';
                tabela += '</tr>';
                tabela += '<tr><td style="border: 1px solid #000000" colspan="2">';
                tabela += "<table width='100%' align='center'>";
                for (var iLEA=0;iLEA<totalLEA;iLEA++){
                    tabela += '<tr>';
                    tabela += '<td colspan="2">'+LEA[iLEA].NME_ARQUIVO+'</td>';
                    tabela += '</tr>';
                }
                tabela += "</table>";
                tabela += '</td></tr>';
                tabela += '<tr><td colspan="2"><br></td></tr>';
                tabela += "</table>";
                tabela += '</td></tr>';
                tabela += '<tr><td colspan="2"><br></td></tr>';
            }
            
        }
        tabela += '<tr><td><br></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        tabela += "</table>";
//        $("#listagemExecucao").html(tabela);
    wLeft = window.screenLeft ? window.screenLeft : window.screenX;
    wTop = window.screenTop ? window.screenTop : window.screenY;
    var w = 1000;
    var h = 700;
    var left = wLeft + (window.innerWidth / 2) - (w / 2);
    var top = wTop + (window.innerHeight / 2) - (h / 2);    
    var tmpSinteticoPagamentoColaborador = window.open('', 'Relatório Gerencial', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left + ', screenX=' + left + ', screenY=' + top);
    tmpSinteticoPagamentoColaborador.document.body.innerHTML='';
    tmpSinteticoPagamentoColaborador.document.write(tabela);
    tmpSinteticoPagamentoColaborador.focus();
    }else{
        swal({
            title: "",
            text: "Sem dados para a pesquisa!",
            type: "warning",
            confirmButtonText: "Fechar"
        });        
    }
}

function CarregaComboUsuario(arrDados) {
    CriarComboDispatchComTamanho('codUsuario', arrDados, -1, 300);
}

$(document).ready(function () {
    ExecutaDispatch('Usuario', 'ListarUsuarioCombo', '', CarregaComboUsuario);
});


