$(function(){
    $("#btnPesquisar").click(function(){
        if ($("#nroMesReferencia").val() == 0 || $("#nroAnoReferencia").val() == 0) {
            swal({
                title: "Aviso!",
                text: "Selecione o Mês e o Ano!",
                showConfirmButton: true,
                type: "info"
            });            
            return false;
        } 
        var parametros = retornaParametros();
        ExecutaDispatch('RelatorioGerencial', 'ListarRelatorioGerencial', parametros, MontaTabelaExecucao);
    });
    $("#btnPesquisarSumarizado").click(function(){
        if ($("#nroMesReferencia").val() == 0 || $("#nroAnoReferencia").val() == 0) {
            swal({
                title: "Aviso!",
                text: "Selecione o Mês e o Ano!",
                showConfirmButton: true,
                type: "info"
            });            
            return false;
        } 
        var parametros = retornaParametros();
        Download('RelatorioGerencial', 'GerarExcelSumarizado', parametros);
    });  
    $("#btnPesquisarArquivos").click(function(){
        if ($("#nroMesReferencia").val() == 0 || $("#nroAnoReferencia").val() == 0) {
            swal({
                title: "Aviso!",
                text: "Selecione o Mês e o Ano!",
                showConfirmButton: true,
                type: "info"
            });            
            return false;
        } 
        var parametros = retornaParametros();
        Download('RelatorioGerencial', 'GerarArquivosOrcamento', parametros);
    });   
});

function MontaTabelaExecucao(lista){
    lista = lista[1];
    // $("#listagemGerencial").html('');
    if (lista!=null){
        var tabela = "<table align='center' width='90%'>";
        var totalOfs = lista.length;
        var totalPontos = 0;
        for (var i=0;i<totalOfs;i++){
            tabela += '<tr><td align="center"><h2>O.F.: '+lista[i].COD_OF+'</h2></td></tr>';
            tabela += '<tr>';
            tabela += '<td style="margin: 5px 0px 5px 0px;font-size: 20px;"><b>Usuário: </b>'+lista[i].NME_USUARIO_COMPLETO+'</td>';
            tabela += '</tr>';
            var qtdPontos = 0;
            var LEC = lista[i]['LEC'+lista[i].COD_EXECUCAO];
            var totalLEC = LEC.length;
            for (var iLEC=0;iLEC<totalLEC;iLEC++){
                tabela += '<tr><td style="border: 1px solid #000000">';
                tabela += "<table width='100%' align='center'>";
                tabela += '<tr bgcolor="silver"><td colspan="2" align="center" style="border: 1px solid #000000; padding-top:15px;"><h3>Tarefa Executada Nº: '+parseInt(iLEC+1)+'</h3></td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Data: </b></td><td>'+LEC[iLEC].DTA_REGISTRO+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Tarefa: </b></td><td>'+LEC[iLEC].COD_TAREFA+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Disciplina:</b></td><td>'+LEC[iLEC].DSC_DISCIPLINA+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Atividade: </b></td><td>'+LEC[iLEC].DSC_ATIVIDADE+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Artefato: </b></td><td>'+LEC[iLEC].DSC_ARTEFATO+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Complexidade:</b></td><td>'+LEC[iLEC].DSC_COMPLEXIDADE+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Componente: </b></td><td>'+LEC[iLEC].DSC_COMPONENTE+'</td></tr>';
                tabela += '<tr><td style="width: 10px;"><b>Pontuação: </b></td><td>'+LEC[iLEC].QTD_TOTAL_PONTOS+'</td></tr>';
                var LEA =  LEC[iLEC]['LEA'+LEC[iLEC].COD_EXECUCAO_COMPLEXIDADE];
                if (LEA!=null){
                    var totalLEA = Object.keys(LEA).length;
                    tabela += '<tr><td style="border: 1px solid #000000" colspan="2">';
                    tabela += "<table width='100%' align='center' style='border-spacing: 3px'>";
                    tabela += '<tr>';
                    tabela += '<td colspan="2" align="center" style="border: 1px solid #000"><h3 style="margin-bottom: 1px">Arquivos Alterados</h3></td>';
                    tabela += '</tr>';
                    var corLinha = 'white';
                    for (var iLEA=0;iLEA<totalLEA;iLEA++){
                        if (corLinha == 'white'){
                            corLinha = '#E8E8E8';
                        }else{
                            corLinha = 'white';
                        }
                        tabela += '<tr bgcolor="'+corLinha+'">';
                        if (null==LEA[iLEA].TXT_DESCRICAO_JUSTIFICATIVA){
                            LEA[iLEA].TXT_DESCRICAO_JUSTIFICATIVA="Justificativa: Sem Justificativa.";
                        }else{
                            LEA[iLEA].TXT_DESCRICAO_JUSTIFICATIVA="Justificativa: "+LEA[iLEA].TXT_DESCRICAO_JUSTIFICATIVA;
                        }
                        if (null==LEA[iLEA].TXT_REFERENCIA_ATIVIDADE){
                            LEA[iLEA].TXT_REFERENCIA_ATIVIDADE="Referência: Sem Referência.";
                        }else{
                            LEA[iLEA].TXT_REFERENCIA_ATIVIDADE="Referência: "+LEA[iLEA].TXT_REFERENCIA_ATIVIDADE;
                        }
                        tabela += '<td colspan="2" style="font-size: 17px">'+LEA[iLEA].NME_ARQUIVO+'<br>'+LEA[iLEA].TXT_DESCRICAO_JUSTIFICATIVA+'<br>'+LEA[iLEA].TXT_REFERENCIA_ATIVIDADE+'</td>';
                        tabela += '</tr>';
                    }
                    tabela += "</table>";
                    tabela += '</td></tr>';
                }else{
                    var totalLEA = 0; 
                    tabela += '<tr><td style="border: 1px solid #000000" colspan="2">';
                    tabela += "<table width='100%' align='center' style='border-spacing: 3px'>";
                    tabela += '<tr>';
                    tabela += '<td colspan="2" align="center" style="border: 1px solid #000"><h3 style="margin-bottom: 1px">Arquivos Alterados</h3></td>';
                    tabela += '</tr>';
                    var corLinha = 'white';
                    if (corLinha == 'white'){
                        corLinha = '#E8E8E8';
                    }else{
                        corLinha = 'white';
                    }
                    tabela += '<tr bgcolor="'+corLinha+'">';
                    tabela += '<td colspan="2" style="font-size: 17px">Sem Arquivos</td>';
                    tabela += '</tr>';
                    tabela += "</table>";
                    tabela += '</td></tr>';                   
                }
                tabela += "</table>";
                tabela += '</td></tr>';
                tabela += '<tr><td colspan="2"><br></td></tr>';
                qtdPontos = LEC[iLEC].QTD_TOTAL_PONTOS+qtdPontos;
            }
            totalPontos = totalPontos+qtdPontos;
            tabela += '<tr><td colspan="2" align="right"><b>Total de Pontos da O.F. => '+number_format(qtdPontos, 2, ",")+'</b></td></tr>';
            tabela += '<tr><td colspan="2"><hr style="border: 1px solid"></td></tr>';
        }
        tabela += '<tr><td colspan="2" align="right"><b>Total de Pontos => '+number_format(totalPontos, 2, ",")+'</b></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        tabela += '<tr><td><br></td></tr>';
        tabela += "</table>";
    wLeft = window.screenLeft ? window.screenLeft : window.screenX;
    wTop = window.screenTop ? window.screenTop : window.screenY;
    var w = 1000;
    var h = 700;
    var left = wLeft + (window.innerWidth / 2) - (w / 2);
    var top = wTop + (window.innerHeight / 2) - (h / 2);    
    var tmpSinteticoPagamentoColaborador = window.open('', 'Relatório Gerencial', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left + ', screenX=' + left + ', screenY=' + top);
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
    CriarSelectPuro('codUsuario', arrDados, -1);
}

function CarregaComboMeses(meses) {
    CriarSelectPuro('nroMesReferencia', meses, new Date().getMonth()+1);
}

function CarregaComboAnos(anos) {
    CriarSelectPuro('nroAnoReferencia', anos,  new Date().getFullYear());
}

$(document).ready(function () {
    ExecutaDispatch('Usuario', 'ListarUsuarioCombo', '', CarregaComboUsuario);
    ExecutaDispatch('Execucao', 'ListarMeses', 'verificaPermissao;N|', CarregaComboMeses);
    ExecutaDispatch('Execucao', 'ListarAnos', 'verificaPermissao;N|', CarregaComboAnos);
});


