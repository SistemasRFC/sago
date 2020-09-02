$(function () {
    $("#btnInserirArquivo").click(function(){
        if ($('#codExecucaoComplexidade').val() == '') {
            $("#method").val('InsertExecucaoComplexidade');
        } else {
            $("#method").val('UpdateExecucaoComplexidade');
        }
        var parametros = retornaParametros();
        ExecutaDispatch('ExecucaoComplexidade', $("#method").val(), parametros, InsereArquivos);
    });
    
    $("#btnNovo").click(function(){
        LimparCamposExecucao();
    });
});

function LimparCamposExecucao(){
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
    $("#tdcodDisciplinaAtividade").html('');
    $("#tdcodAtividadeArtefato").html('');
    $("#tdcodArtefatoComplexidade").html('');
    $("#tdcodComplexidadeComponente").html('');
    $("#nmeArquivo").val("");
    $("#codExecucaoComplexidade").val('');
}

function InsereArquivos(dados){
    $("#codExecucaoComplexidade").val(dados[2]);
    $("#method").val('InsertExecucaoArquivos');
    var parametros = retornaParametros();
    ExecutaDispatch('ExecucaoArquivos', $("#method").val(), parametros, carregaOf, 'Aguarde, Salvando!', 'Registro Salvo com Sucesso!');
    $("#nmeArquivo").val("");
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
}

function CarregaComboDisciplina(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }
    CriarComboDispatchComTamanho('codDisciplina', arrDados, valor, 300, disabled);
    $("#codDisciplina").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codDisciplina;'+$("#codDisciplina").val();
            ExecutaDispatch('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade);    
        }
    });
}

function CarregaComboAtividade(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }    
    CriarComboDispatchComTamanho('codDisciplinaAtividade', arrDados, valor, 380, disabled);
    $("#codDisciplinaAtividade").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codDisciplinaAtividade;'+$("#codDisciplinaAtividade").val();
            ExecutaDispatch('Artefato', 'ListarArtefatoPorDisciplinaAtividadeCombo', parametros, CarregaComboArtefato);
        }
    });    
}

function CarregaComboArtefato(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }    
    CriarComboDispatchComTamanho('codAtividadeArtefato', arrDados, valor, 400, disabled);
    $("#codAtividadeArtefato").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codAtividadeArtefato;'+$("#codAtividadeArtefato").val();
            ExecutaDispatch('Complexidade', 'ListarComplexidadePorAtividadeArtefatoCombo', parametros, CarregaComboComplexidade);
        }
    });
}

function CarregaComboComplexidade(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }    
    CriarComboDispatchComTamanho('codArtefatoComplexidade', arrDados, valor, 400, disabled);
    $("#codArtefatoComplexidade").change(function () {
        if ($(this).val() != 0) {
            var parametros = 'codArtefatoComplexidade;'+$("#codArtefatoComplexidade").val();
            ExecutaDispatch('Componente', 'ListarComponentePorArtefatoComplexidadeCombo', parametros, CarregaComboComponente);
        }
    });
}

function CarregaComboComponente(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }    
    CriarComboDispatchComTamanho('codComplexidadeComponente', arrDados, valor, 380, disabled);
}

function salvarDisciplina(data) {
    swal({
        title: 'Aguarde, salvando disciplina!',
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($('#codDisciplina').val() == '') {
        $("#method").val('InsertDisciplina');
    } else {
        $("#method").val('UpdateDisciplina');
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Disciplina', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro(dados) {
    $("#CadDisciplina").jqxWindow("close");
    ExecutaDispatch('Disciplina', 'ListarDisciplina', '', CarregaGridDisciplina);
    swal({
        title: "Sucesso!",
        text: dados[2],
        type: "info"
    });
}

function carregaOf(){
    var parametros = 'codExecucao;'+$("#codExecucao").val();
    ExecutaDispatch('Execucao', 'ListarExecucaoPorOf', parametros, MontaListaExecucao);
}

function MontaListaExecucao(lista){
    lista = lista[1];
    $("#listaOf").html("");
    if (lista!=null){
        var tabela = "<table width='100%' height='350' style='border: 1px solid #000000; table-layout: auto;' cellspacing='0'>";
        tabela += "<thead style='display:block;'>";
        tabela += "<tr>";
        tabela += "<td style='width: 20px;'><br></td>";
        tabela += "<td style='width: 106px;'><b>Data</b></td>";
        tabela += "<td style='width: 170px;'><b>Disciplina</b></td>";
        tabela += "<td style='width: 170px;'><b>Atividade</b></td>";
        tabela += "<td style='width: 240px;'><b>Artefato</b></td>";
        tabela += "<td style='width: 70px;'><b>Cpl.</b></td>";
        tabela += "<td style='width: 70px;'><b>Cmp.</b></td>";
        tabela += "<td style='width: 60px;'><b>Pts.</b></td>";
        tabela += "<td style='width: 102px;'><b>Ação</b></td>";
        tabela += "</tr>";
        tabela += "</thead>";
        tabela += "<tbody style='display:block; overflow: auto; height: 350px;'>";
        totalLista = lista.length;
        for (i=0;i<totalLista;i++){
            tabela += "<tr>";
            tabela += "<td style='border: 1px solid #000000; width: 20px;'><a href='javascript:mostraArquivos("+lista[i].COD_EXECUCAO_COMPLEXIDADE+");'><img id='img"+lista[i].COD_EXECUCAO_COMPLEXIDADE+"' src='../../Resources/images/plus.png' width='15' height='15'></a></td>";
            tabela += "<td style='border: 1px solid #000000; width: 106px;'>"+lista[i].DTA_REGISTRO+"</td>";
            tabela += "<td style='border: 1px solid #000000; width: 170px;'>"+lista[i].DSC_DISCIPLINA+"</td>";
            tabela += "<td style='border: 1px solid #000000; width: 170px;'>"+lista[i].DSC_ATIVIDADE+"</td>";
            tabela += "<td style='border: 1px solid #000000; width: 240px;'>"+lista[i].DSC_ARTEFATO+"</td>";
            tabela += "<td style='border: 1px solid #000000; width: 70px;'>"+lista[i].DSC_COMPLEXIDADE+"</td>";
            tabela += "<td style='border: 1px solid #000000; width: 70px;'>"+lista[i].DSC_COMPONENTE+"</td>";
            tabela += "<td style='border: 1px solid #000000; width: 60px;'>"+lista[i].QTD_PONTOS_TOTAL+"</td>";
            tabela += "<td style='border: 1px solid #000000; width: 102px;'>\n\
                       <table width='100%'><tr>\n\
                           <td><a href='javascript:editarOf("+lista[i].COD_EXECUCAO_COMPLEXIDADE+", \n\
                                                        "+lista[i].COD_DISCIPLINA+", \n\
                                                        "+lista[i].COD_DISCIPLINA_ATIVIDADE+",   \n\
                                                        "+lista[i].COD_ATIVIDADE_ARTEFATO+",   \n\
                                                        "+lista[i].COD_ARTEFATO_COMPLEXIDADE+",   \n\
                                                        "+lista[i].COD_COMPLEXIDADE_COMPONENTE+")' title='Editar'>\n\
                                <img src='../../Resources/images/edit.png' width='20' height='20'>\n\
                           </a></td> \n\
                           <td><a href='javascript:ClonarDados("+lista[i].COD_EXECUCAO_COMPLEXIDADE+");' title='Dublica este item'> \n\
                                <img src='../../Resources/images/transferencia.png' width='20' height='20'>\n\
                           </a>\n\
                           </td>\n\
                           <td><a href='javascript:RemoverExecucaoComplexidade("+lista[i].COD_EXECUCAO_COMPLEXIDADE+");' title='Exclui este item e todos os arquivos relacionados'> \n\
                                <img src='../../Resources/images/delete.png' width='20' height='20'>\n\
                           </a>\n\
                           </td>\n\
                           </tr></table>   \n\
                        </td>";
            tabela += "</tr>";
            
            tabela += "<tr style='display: none;' id='cd"+lista[i].COD_EXECUCAO_COMPLEXIDADE+"'>";
            tabela += "<td style='border: 1px solid #000000; padding: 5px 2px 5px 20px'  colspan='9'>";
            tabela += "<table width='100%' style='border: 0px solid #000000;' cellspacing='0'>";
            tabela += "<tr>";
            tabela += "<td style='border: 1px solid #000000;'><b>N.º</b></td>";
            tabela += "<td style='border: 1px solid #000000;'><b>Nome Arquivo</b></td>";
            tabela += "<td style='border: 1px solid #000000;'><b>Ação</b></td>";
            tabela += "</tr>";
            var totalListaArquivos = 0;
            if (lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE]!=null){
                totalListaArquivos = lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE].length;
            }
            for (var l=0;l<totalListaArquivos;l++){
                var indice=l+1;
                tabela += "<tr>";
                tabela += "<td style='border: 1px solid #000000;'>"+indice+"</td>";
                tabela += "<td style='border: 1px solid #000000;'>"+lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE][l].NME_ARQUIVO+"</td>";
                tabela += "<td style='border: 1px solid #000000;'>\n\
                               <a href='javascript:RemoverArquivo("+lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE][l].COD_EXECUCAO_ARQUIVO+")' title='Remove o arquivo'>\n\
                                    <img src='../../Resources/images/delete.png' width='25' height='25'>\n\
                               </a>   \n\
                           </td>";
                tabela += "</tr>";
            }
            tabela += "</table>";                
            tabela += "</td>";
            tabela += "</tr>";           

        }
        tabela += "</tbody>";
        tabela += "</table>";
    }
    $("#listaOf").html(tabela);    
}

function RemoverArquivo(codExecucaoArquivo){
    var parametros = 'codExecucaoArquivo;'+codExecucaoArquivo;
    ExecutaDispatch('ExecucaoArquivos', 'DeleteExecucaoArquivos', parametros, carregaOf); 
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
}

function mostraArquivos(codtr){
    if ($("#cd"+codtr).is(':visible')){
    console.log("cd"+codtr);
        $("#cd"+codtr).hide('slow');
        
        $("#img"+codtr).attr('src', '../../Resources/images/plus.png');
    }else{
        $("#cd"+codtr).show('slow');
        $("#img"+codtr).attr('src', '../../Resources/images/minus.png');
    }    
}

function RemoverExecucaoComplexidade(codExecucaoComplexidade){
    $("#method").val('DeleteExecucaoComplexidade');
    var parametros = 'codExecucaoComplexidade;'+codExecucaoComplexidade;
    ExecutaDispatch('ExecucaoComplexidade', $("#method").val(), parametros, carregaOf);
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
}

function ClonarDados(codExecucaoComplexidade){
    $("#method").val('ClonarDados');
    var parametros = 'codExecucaoComplexidade;'+codExecucaoComplexidade;
    ExecutaDispatch('ExecucaoComplexidade', $("#method").val(), parametros, carregaOf);
    LimparCamposExecucao();
}

function editarOf(codExecucaoComplexidade, codDisciplina, codDisciplinaAtividade, codAtividadeArtefato, codArtefatoComplexidade, codComplexidadeComponente){
    $("#codExecucaoComplexidade").val(codExecucaoComplexidade);
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina, codDisciplina, false);
    var parametros = 'codDisciplina;'+codDisciplina;    
    ExecutaDispatchValor('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade, codDisciplinaAtividade, false); 
    parametros = 'codDisciplinaAtividade;'+codDisciplinaAtividade;
    ExecutaDispatchValor('Artefato', 'ListarArtefatoPorDisciplinaAtividadeCombo', parametros, CarregaComboArtefato, codAtividadeArtefato, false);
    parametros = 'codAtividadeArtefato;'+codAtividadeArtefato;
    ExecutaDispatchValor('Complexidade', 'ListarComplexidadePorAtividadeArtefatoCombo', parametros, CarregaComboComplexidade, codArtefatoComplexidade, false);
    parametros = 'codArtefatoComplexidade;'+codArtefatoComplexidade;
    ExecutaDispatchValor('Componente', 'ListarComponentePorArtefatoComplexidadeCombo', parametros, CarregaComboComponente, codComplexidadeComponente, false);
}

$(document).ready(function(){
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});