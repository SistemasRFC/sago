$(function () {
    $("#controllerList").hide();
    $("#btnDeletar").click(function () {
        DeleteMenu();
    });

    $("#btnSalvar").click(function () {
        if ($("#arquivo").val() != "") {
            var formData = new FormData($('form')[0]);
            ExecutaDispatchUpload('Menu', 'uploadArquivo', formData, salvarMenu);
        } else {
            salvarMenu();
        }
    });

    $("#btnListarController").click(function () {
        ListarController(undefined);
    });

    $("#btnListarMetodos").click(function () {
        ListarMetodos($("#nmeClasse").val());
    });
});

function salvarMenu(data) {
    swal({
        title: 'Aguarde, salvando menu!',
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($('#codMenuW').val() == '') {
        $("#method").val('AddMenu');
    } else {
        $("#method").val('UpdateMenu');
    }
    if (data != undefined) {
        $("#dscCaminhoImagem").val(data.msg);
    }
    var parametros = retornaParametros();
    ExecutaDispatch('Menu', $("#method").val(), parametros, fecharTelaCadastro);
}

function fecharTelaCadastro(dados) {
    $("#menuModal").modal("hide");
    ExecutaDispatch('Menu', 'ListarMenusGrid', '', CarregaGridMenu);
    swal({
        title: "Sucesso!",
        text: dados[2],
        type: "info"
    });
}

function MontaComboMenu(arrDados) {
    CriarSelectPuro('codMenuPaiW', arrDados, 0);
}

function DeleteMenu() {
    ExecutaDispatch('Menu', 'DeleteMenu', 'codMenuW;' + $("#codMenuW").val() + '|', retornoDeleteMenu, "Aguarde, removendo menu", "Menu removido com sucesso!");
}

function retornoDeleteMenu(retorno) {
    $("#menuModal").modal("close");
    CarregaGridMenu();
}