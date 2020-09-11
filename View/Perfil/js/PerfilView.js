var listaGeralPerfil;
$(function () {
    $("#cadNovoPerfil").hide();

    $("#btnNovo").click(function () {
        LimparCampos();
        $("#cadNovoPerfil").show('fade');
    });
    
    $("#btnCancel").click(function () {
        $("#cadNovoPerfil").hide('fade');
        LimparCampos();
    });
    
    $("#btnSalvar").click(function () {
        SalvarPerfil();
    });
});

function SalvarPerfil(method){
    var method='';
    if ($("#codPerfilW").val() != '') {
        method = "UpdatePerfil";
    } else {
        method = "AddPerfil";
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Perfil', method, parametros, retornoSalvarPerfil, 'Aguarde, Salvando Perfil!', 'Perfil Salvo com Sucesso!');
}

function retornoSalvarPerfil() {
    LimparCampos();
    carregaGridPerfil();
}

function carregaGridPerfil() {
    ExecutaDispatch('Perfil', 'ListarPerfil', undefined, montaTabelaPerfil);
}

function montaTabelaPerfil(listaPerfil) {
    listaPerfil = listaPerfil[1];
    listaGeralPerfil = listaPerfil;
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='perfilTable' width='100%'>";
    tabela += " <thead>";
    tabela += "     <tr>";
    tabela += "         <th>Código</th>";
    tabela += "         <th>Descrição</th>";
    tabela += "         <th>Ativo</th>";
    tabela += "         <th></th>";
    tabela += "     </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for(var i in listaPerfil) {
        tabela += " <tr>";
        tabela += "     <td>"+listaPerfil[i].COD_PERFIL_W+"</td>";
        tabela += "     <td>"+listaPerfil[i].DSC_PERFIL_W+"</td>";
        if(listaPerfil[i].ATIVO == true) {
            tabela += " <td>Sim</td>";
        } else {
            tabela += " <td>Não</td>";
        }
        tabela += "     <td class='text-center'>\n\
                            <button class='btn btn-success btn-sm edit' data-id='"+listaPerfil[i].COD_PERFIL_W+"' title='Editar'>\n\
                                <span class='icon'>\n\
                                    <i class='fas fa-pencil-alt'></i>\n\
                                </span>\n\
                            </button>\n\
                        </td>";
        tabela += " </tr>";
    }
    tabela += " </tbody>";
    tabela += "</table>";

    $("#listaPerfil").html(tabela);

    $('#perfilTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        var item = listaGeralPerfil.filter(elm => elm.COD_PERFIL_W == $(this).data('id'));
        $("#codPerfilW").val(item[0].COD_PERFIL_W);
        $("#dscPerfilW").val(item[0].DSC_PERFIL_W);
        $("#indAtivo").prop('checked', item[0].ATIVO);
        $("#cadNovoPerfil").show('fade');
    });
}

$(document).ready(function () {
    carregaGridPerfil();
});

