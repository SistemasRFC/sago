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
    var total = lista[2];
    lista = lista[1];
    $("#listagemExecucao").html('');
    if (lista!=null){
        var tabela = '<table class="table table-striped table-hover table-bordered" id="relPontoUsuTable" width="100%">';
        tabela += '     <thead>';
        tabela += '         <tr>';
        tabela += '             <th>Usuário</th>';
        tabela += '             <th>Pontos</th>';
        tabela += '         </tr>';        
        tabela += '     </thead>';
        tabela += '     </tbody>';
        for (var i in lista){
            tabela += '     <tr>';
            tabela += '         <td>'+lista[i].NME_USUARIO_COMPLETO+'</td>';
            tabela += '         <td>'+lista[i].QTD_TOTAL_PONTOS+'</td>';
            tabela += '     </tr>';
        }
        tabela += '     <tr>';
        tabela += '         <td style="text-align: right;"><b>TOTAL: </b></td>';
        tabela += '         <td>'+total.toFixed(2)+'</td>';
        tabela += '     </tr>';        
        tabela += '     </tbody>';
        tabela += '   </table>';

        $("#listagemRelatorio").html(tabela);
    
        $('#relPontoUsuTable').DataTable({
            "searching": false,
            "pagingType": "simple_numbers",
            "lengthChange" : false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
        });
        
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
    CriarSelectPuro('nroMesReferencia', meses, new Date().getMonth()+1);
}

function CarregaComboAnos(anos) {
    CriarSelectPuro('nroAnoReferencia', anos,  new Date().getFullYear());
}

$(document).ready(function () {
    ExecutaDispatch('Execucao', 'ListarMeses', 'verificaPermissao;N|', CarregaComboMeses);
    ExecutaDispatch('Execucao', 'ListarAnos', 'verificaPermissao;N|', CarregaComboAnos);
});


