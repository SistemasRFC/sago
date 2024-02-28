$(function () {
    $("#btnSalvar").click(function () {
        MontaComboSelecionado();
    });
});

function MontaComboSelecionado() {
    var checkBoxes = '';
    $(".check").each(function () {
        if ($(this).prop('checked')) {
            checkBoxes += $(this).attr('codMenu') + '=>SP';
        } else {
            checkBoxes += $(this).attr('codMenu') + '=>NP';
        }
    });
    SalvarPermissoes(checkBoxes);
}

function SalvarPermissoes(checkBoxes) {
    $('#method').val('AtualizaPermissoes');
    ExecutaDispatch('PermissaoMenu', $('#method').val(), 'codPerfil<=>' + $("#codPerfil").val() + '|C<=>' + checkBoxes, CarregaListaMenus, 'Aguarde, salvando permissões', 'Permissões Salvas com Sucesso!');
}
function CarregaListaMenus() {
    ExecutaDispatch('PermissaoMenu', 'ListarMenus', 'codPerfil<=>' + $("#codPerfil").val() + '|', ListaMenus);
}
function ListaMenus(ListaMenus) {
    ListaMenus = ListaMenus[1];
    count = 2;
    tabela = '';
    tabela += "<table width='100%' class='table'>";
    for (i = 0; i < ListaMenus.length; i++) {
        if (count == 2) {
            tabela += "<tr>";
            count = 0;
        }
        if (ListaMenus[i].DSC_MENU_PAI != null) {
            dscMenu = "<strong>" + ListaMenus[i].DSC_MENU_PAI + "</strong> >>> " + ListaMenus[i].DSC_MENU_W;
        } else {
            dscMenu = ListaMenus[i].DSC_MENU_W;
        }
        tabela += "<td width='50%' class='pt-0 pb-0' style='vertical-align: middle;'>";
        tabela += "<input type='checkbox' id='chk" + ListaMenus[i].COD_MENU_W + "' codMenu='" + ListaMenus[i].COD_MENU_W + "' class='check mr-1'><span>" + dscMenu + "</span><br>";
        tabela += "</td>";
        count++;
        if (count == 2) {
            tabela += "</tr>";
        }
    }
    tabela += "</table>";
    $("#checkboxes").html(tabela);
    var theme = 'darkcyan';
    // Create jqxCheckBox
    $('.check').prop('checked', false);
    for (i = 0; i < ListaMenus.length; i++) {
        if (ListaMenus[i].PERFIL == null) {
            $("#chk" + ListaMenus[i].COD_MENU_W).prop('checked', false);
        } else {
            $("#chk" + ListaMenus[i].COD_MENU_W).prop('checked', true);
        }
    }
    $(".MenusExistentes").show();
}

function CarregaComboPerfil(arrDados) {
    CriarSelectPuro('codPerfil', arrDados, 0);
    $("#codPerfil").change(function () {
        if ($(this).val() != 0) {
            CarregaListaMenus();
        } else {
            $(".MenusExistentes").hide();
        }
    });
}

$(document).ready(function () {
    $(".MenusExistentes").hide();
    ExecutaDispatch('Perfil', 'ListarPerfilAtivo', '', CarregaComboPerfil);
});