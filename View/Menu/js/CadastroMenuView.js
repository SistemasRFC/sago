var listaGeralMenus;
$(function () {
    $("#btnNovo").click(function () {
        $("#exampleModalLabel").html("Novo Menu");
        ExecutaDispatch('Menu', 'ListaMenus', '', MontaComboMenu);
        LimparCampos();
    });
});

function CarregaGridMenu(listaMenus) {
    MontaTabelaMenu(listaMenus[1]);
}

function MontaTabelaMenu(listaMenus) {
    listaGeralMenus = listaMenus;
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='menuTable' width='100%'>";
    tabela += " <thead>";
    tabela += " <tr>";
    tabela += "     <th width='5%'>Cód.</th>";
    tabela += "     <th width='20%'>Descrição</th>";
    tabela += "     <th width='10%'>Controller</th>";
    tabela += "     <th width='20%'>Method</th>";
    tabela += "     <th width='12%'>Menu Pai</th>";
    tabela += "     <th width='10%'>Visível</th>";
    tabela += "     <th width='10%'>Ativo</th>";
    tabela += "     <th width='10%'></th>";
    tabela += " </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for ( var i in listaMenus){
        tabela += "<tr>";
        tabela += " <td>"+listaMenus[i].COD_MENU_W+"</td>";
        if(listaMenus[i].DSC_MENU_W.length > 23) {
            tabela += " <td>"+listaMenus[i].DSC_MENU_W.substring(0, 23)+"...</td>";
        } else {
            tabela += " <td>"+listaMenus[i].DSC_MENU_W+"</td>";
        }
        tabela += " <td>"+listaMenus[i].NME_CONTROLLER+"</td>";
        if(listaMenus[i].NME_METHOD && listaMenus[i].NME_METHOD.length > 15) {
            tabela += " <td>"+listaMenus[i].NME_METHOD.substring(0, 15)+"...</td>";
        } else {
            tabela += " <td>"+listaMenus[i].NME_METHOD+"</td>";
        }
        tabela += " <td>"+listaMenus[i].DSC_MENU_PAI+"</td>";
        if(listaMenus[i].VISIBLE == true) {
            tabela += " <td class='text-center'>Sim</td>";
        } else {
            tabela += " <td class='text-center'>Não</td>";
        }
        if(listaMenus[i].ATIVO == true) {
            tabela += " <td class='text-center'>Sim</td>";
        } else {
            tabela += " <td class='text-center'>Não</td>";
        }
        tabela += " <td>\n\
                        <button class='btn btn-success btn-sm mb-1 editM' data-id='"+listaMenus[i].COD_MENU_W+"' title='Editar'>\n\
                            <span class='icon'>\n\
                                <i class='fas fa-pencil-alt'></i>\n\
                            </span>\n\
                        </button>";
        tabela += " </td>";
        tabela += "</tr>";
    }
    tabela += " </tbody>";
    tabela += "</table>";
    $("#listaMenus").html(tabela);

    $('#menuTable').DataTable({
        "searching": true,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });

    $('.editM').click( function() {
        var item = listaGeralMenus.filter(elm => elm.COD_MENU_W == $(this).data('id'));
        preencheCamposForm(item[0], 'indMenuAtivoW;B|indAtalho;B|indVisible;B|');
        $("#method").val("UpdateMenu");
        $("#exampleModalLabel").html("Editar Menu");
        $("#menuModal").modal("show");
    });
}

$(document).ready(function () {
    ExecutaDispatch('Menu', 'ListaMenus', '', MontaComboMenu);
    ExecutaDispatch('Menu', 'ListarMenusGrid', '', CarregaGridMenu);
});