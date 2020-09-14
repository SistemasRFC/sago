var listaGlobal;
$(function () {
    $("#btnInserirArquivo").click(function(){
        if ($("#nmeArquivo").val()==''){
            swal({
                title: "Atenção!",
                text: "Digite um nome de arquivo",
                type: "warning",
                confirmButtonText: "Fechar"
            });            
            return;
        }
        if ($('#codExecucaoComplexidade').val() == '') {
            $("#method").val('InsertExecucaoComplexidade');
        } else {
            $("#method").val('UpdateExecucaoComplexidade');
        }
        var parametros = retornaParametros();
        ExecutaDispatch('ExecucaoArquivos', "VerificaArquivoExistente", parametros, InsereExecucaoComplexidade);
    });
    
    $("#btnLimpar").click(function(){
        LimparCamposExecucao();
    });
});

function InsereExecucaoComplexidade(){
    var parametros = retornaParametros();
    ExecutaDispatch('ExecucaoComplexidade', $("#method").val(), parametros, InsereArquivos);
}

function LimparCamposExecucao(){
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
    $("#tdcodDisciplinaAtividade").html('');
    $("#tdcodAtividadeArtefato").html('');
    $("#tdcodArtefatoComplexidade").html('');
    $("#tdcodComplexidadeComponente").html('');
    $("#nmeArquivo").val("");
    $("#txtDescricaoJustificativa").val("");
    $("#codExecucaoComplexidade").val('');
}

function InsereArquivos(dados){
    $("#codExecucaoComplexidade").val(dados[2]);
    $("#method").val('InsertExecucaoArquivos');
    var parametros = retornaParametros();
    ExecutaDispatch('ExecucaoArquivos', $("#method").val(), parametros, carregaOf, 'Aguarde, Salvando!', 'Registro Salvo com Sucesso!');
    $("#nmeArquivo").val("");
    $("#txtDescricaoJustificativa").val("");
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
}

function CarregaComboDisciplina(arrDados, valor, disabled) {
    if (valor==undefined){
        valor = 0;
    }
    CriarSelectPuro('codDisciplina', arrDados, valor, disabled);
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
    CriarSelectPuro('codDisciplinaAtividade', arrDados, valor, disabled);
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
    CriarSelectPuro('codAtividadeArtefato', arrDados, valor, disabled);
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
    CriarSelectPuro('codArtefatoComplexidade', arrDados, valor, disabled);
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
    CriarSelectPuro('codComplexidadeComponente', arrDados, valor, disabled);
}

function carregaOf(){
    var parametros = 'codExecucao;'+$("#codExecucao").val();
    ExecutaDispatch('Execucao', 'ListarExecucaoPorOf', parametros, MontaListaExecucao);
}

function MontaListaExecucao(lista){
    lista = lista[1];
    $("#listaOF").html("");
    if (lista!=null){
        listaGlobal = lista;
        var tabela = "";
        tabela += "<table class='table table-striped table-hover table-bordered' id='arquivoExecucaoTable' width='100%' cellspacing='0'>";
        tabela += " <thead>";
        tabela += "     <tr>";
        tabela += "         <td style='width: 7%;'></td>";
        tabela += "         <td style='width: 11%;'><b>Data</b></td>";
        tabela += "         <td style='width: 16%;'><b>Disciplina</b></td>";
        tabela += "         <td style='width: 16%;'><b>Atividade</b></td>";
        tabela += "         <td style='width: 25%;'><b>Artefato</b></td>";
        tabela += "         <td style='width: 8%;'><b>Complex.</b></td>";
        tabela += "         <td style='width: 5%;'><b>Compo.</b></td>";
        tabela += "         <td style='width: 5%;'><b>Pts.</b></td>";
        tabela += "         <td style='width: 7%;'><b>Ação</b></td>";
        tabela += "     </tr>";
        tabela += " </thead>";
        tabela += " <tbody>";
        for (var i in lista){
            tabela += " <tr>";
            tabela += "     <td style='width: 20px; vertical-align: middle'>\n\
                                <a href='' class='nav-link collapsed' id='"+lista[i].COD_EXECUCAO_COMPLEXIDADE+"' data-toggle='collapse' data-target='#cd"+lista[i].COD_EXECUCAO_COMPLEXIDADE+"' aria-expanded='true' aria-controls='cd"+lista[i].COD_EXECUCAO_COMPLEXIDADE+"'>\n\
                                    <span class='icon'>\n\
                                        <i id='icone"+lista[i].COD_EXECUCAO_COMPLEXIDADE+"' class='far fa-plus-square'></i>\n\
                                    </span>\n\
                                </a>\n\
                            </td>";
            tabela += "     <td style='width: 106px;'>"+lista[i].DTA_REGISTRO+"</td>";
            tabela += "     <td style='width: 170px;'>"+lista[i].DSC_DISCIPLINA+"</td>";
            tabela += "     <td style='width: 170px;'>"+lista[i].DSC_ATIVIDADE+"</td>";
            tabela += "     <td style='width: 240px;'>"+lista[i].DSC_ARTEFATO+"</td>";
            tabela += "     <td style='width: 70px;'>"+lista[i].DSC_COMPLEXIDADE+"</td>";
            tabela += "     <td style='width: 70px;'>"+lista[i].DSC_COMPONENTE+"</td>";
            tabela += "     <td style='width: 60px;'>"+lista[i].QTD_PONTOS_TOTAL+"</td>";
            tabela += "     <td style='width: 102px; vertical-align: middle' class='text-center'>\n\
                                <button class='btn btn-success btn-sm mb-1' onclick='javascript:editarOF("+lista[i].COD_EXECUCAO_COMPLEXIDADE+");' title='Editar'>\n\
                                    <span class='icon'>\n\
                                        <i class='fas fa-pencil-alt'></i>\n\
                                    </span>\n\
                                </button>\n\
                                <button class='btn btn-primary btn-sm mb-1' onclick='javascript:ClonarDados("+lista[i].COD_EXECUCAO_COMPLEXIDADE+");' title='Duplicar'>\n\
                                    <span class='icon'>\n\
                                        <i class='far fa-copy'></i>\n\
                                    </span>\n\
                                </button>\n\
                                <button class='btn btn-danger btn-sm' onclick='javascript:RemoverExecucaoComplexidade("+lista[i].COD_EXECUCAO_COMPLEXIDADE+");' title='Remover item e arquivos relacionados'>\n\
                                    <span class='icon'>\n\
                                        <i class='fas fa-trash'></i>\n\
                                    </span>\n\
                                </button>\n\
                            </td>";
            tabela += " </tr>";
            
            tabela += " <tr id='cd"+lista[i].COD_EXECUCAO_COMPLEXIDADE+"' class='collapse'>";
            tabela += "     <td style='padding: 5px 10px 5px 10px'  colspan='9'>";
            tabela += "         <table width='100%' style='border: 0px solid #000000;' cellspacing='0'>";
            tabela += "             <tr>";
            tabela += "                 <td style='border: 1px solid #000000;'><b>N.º</b></td>";
            tabela += "                 <td style='border: 1px solid #000000;'><b>Nome Arquivo</b></td>";
            tabela += "                 <td style='border: 1px solid #000000;'><b>Ação</b></td>";
            tabela += "             </tr>";
            var totalListaArquivos = 0;
            if (lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE]!=null){
                totalListaArquivos = lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE].length;
            }
            for (var l=0;l<totalListaArquivos;l++){
                var indice=l+1;
                tabela += "         <tr>";
                tabela += "             <td style='border: 1px solid #000000;'>"+indice+"</td>";
                tabela += "             <td style='border: 1px solid #000000;'>"+lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE][l].NME_ARQUIVO;
                if (lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE][l].TXT_DESCRICAO_JUSTIFICATIVA!=null &&
                    lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE][l].TXT_DESCRICAO_JUSTIFICATIVA!=''){
                    tabela += ';'+lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE][l].TXT_DESCRICAO_JUSTIFICATIVA;
                }
                tabela += "             </td>";
                tabela += "             <td style='border: 1px solid #000000;'>\n\
                                            <button class='btn btn-danger btn-sm' onclick='javascript:RemoverArquivo("+lista[i]['cd'+lista[i].COD_EXECUCAO_COMPLEXIDADE][l].COD_EXECUCAO_ARQUIVO+");' title='Remover arquivo'>\n\
                                                <span class='icon'>\n\
                                                    <i class='fas fa-trash'></i>\n\
                                                </span>\n\
                                            </button>\n\
                                        </td>";
                tabela += "         </tr>";
            }
            tabela += "         </table>";                

            tabela += "     </td>";
            tabela += " </tr>";           

        }
        tabela += " </tbody>";
        tabela += "</table>";
    }
    $("#listaOF").html(tabela);

    $('#arquivoExecucaoTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
}

function testando(){
    console.log("FOI");
}

function RemoverArquivo(codExecucaoArquivo){
    var parametros = 'codExecucaoArquivo;'+codExecucaoArquivo;
    ExecutaDispatch('ExecucaoArquivos', 'DeleteExecucaoArquivos', parametros, carregaOf); 
    ExecutaDispatch('Execucao', 'ListarExecucao', '', CarregaGridExecucao);
}

function mostraArquivos(codtr){
    console.log("cd"+codtr);
    if ($("#icone"+codtr).class() == 'far fa-plus-square') {
        $("#icone"+codtr).class('far fa-minus-square');
    } else {
        $("#icone"+codtr).class('far fa-plus-square');
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

function editarOF(codExecucaoComplexidade){
    var item = listaGlobal.filter(elm => elm.COD_EXECUCAO_COMPLEXIDADE == codExecucaoComplexidade);
    var dadosArquivo = item[0];
    $("#codExecucaoComplexidade").val(dadosArquivo.COD_EXECUCAO_COMPLEXIDADE);
    ExecutaDispatchValor('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina, dadosArquivo.COD_DISCIPLINA, false);
    var parametros = 'codDisciplina;'+dadosArquivo.COD_DISCIPLINA;    
    ExecutaDispatchValor('Atividade', 'ListarAtividadeComboPorDisciplina', parametros, CarregaComboAtividade, dadosArquivo.COD_DISCIPLINA_ATIVIDADE, false); 
    parametros = 'codDisciplinaAtividade;'+dadosArquivo.COD_DISCIPLINA_ATIVIDADE;
    ExecutaDispatchValor('Artefato', 'ListarArtefatoPorDisciplinaAtividadeCombo', parametros, CarregaComboArtefato, dadosArquivo.COD_ATIVIDADE_ARTEFATO, false);
    parametros = 'codAtividadeArtefato;'+dadosArquivo.COD_ATIVIDADE_ARTEFATO;
    ExecutaDispatchValor('Complexidade', 'ListarComplexidadePorAtividadeArtefatoCombo', parametros, CarregaComboComplexidade, dadosArquivo.COD_ARTEFATO_COMPLEXIDADE, false);
    parametros = 'codArtefatoComplexidade;'+dadosArquivo.COD_ARTEFATO_COMPLEXIDADE;
    ExecutaDispatchValor('Componente', 'ListarComponentePorArtefatoComplexidadeCombo', parametros, CarregaComboComponente, dadosArquivo.COD_COMPLEXIDADE_COMPONENTE, false);
}

$(document).ready(function(){
    ExecutaDispatch('Disciplina', 'ListarDisciplinaCombo', '', CarregaComboDisciplina);
});