var listaNomes;
function GeraFile(dscTabela, nmeFile) {
    ExecutaDispatch('MontaFile', 'GeraFile', 'dscTabela;'+dscTabela+'|nmeFile;'+nmeFile+'|', undefined, "Aguarde gerando arquivos!", "Arquivos Gerados com sucesso");
}

function MontaListaTabelas(ListaTabelas) {
    ListaTabelas = ListaTabelas[1];
    listaNomes = ListaTabelas;
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='montaFileTable' width='50%'>";
    tabela += " <thead>";
    tabela += "     <tr>";
    tabela += "         <th>Descrição</th>";
    tabela += "     </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for(var i in ListaTabelas) {
        tabela += " <tr>";
        tabela += "     <td><a href='javascript:DefinirNome(\""+ListaTabelas[i].NME_TABELA+"\");' >"+ListaTabelas[i].NME_TABELA+"</a></td>";
        tabela += " </tr>";
    }
    tabela += " </tbody>";
    tabela += "</table>";

    $("#listaTabelas").html(tabela);

    $('#montaFileTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });

}

function DefinirNome(nmeTabela) {
    var nmeFile = prompt("Informe o nome do arquivo:");
    if (nmeFile) {
        GeraFile(nmeTabela, nmeFile);
    } else {
        alert("Nome do arquivo não informando favor tente novamente");
    }
}

//*************************
//Autor: Gleidson Lopes Vinhal
//Data da Criação: 03/04/2014
//Alterado por: Rafael Freitas Carneiro
//Data da última atualização: 11/01/2019
//Carrega o grid com os usuários cadastrados no banco de dados
//Controller: CadastroUsuarioController.php
//Método: ListarUsuario
//*************************
// function MontaListaTabelas(ListaTabelas) {
//     ListaTabelas = ListaTabelas[1];
//     var theme = 'darkcyan';
//     var nomeGrid = 'listaTabelas';
//     var source =
//     {
//         localdata: ListaTabelas,
//         datatype: "json",
//         updaterow: function (rowid, rowdata, commit) {
//             commit(true);
//         },
//         datafields:
//             [
//                 { name: 'NME_TABELA', datafield: 'string' }
//             ],
//     };
//     var dataAdapter = new $.jqx.dataAdapter(source);
//     $("#" + nomeGrid).jqxGrid(
//         {
//             width: 500,
//             source: dataAdapter,
//             theme: theme,
//             selectionmode: 'singlerow',
//             sortable: true,
//             filterable: true,
//             pageable: true,
//             //editable: true,
//             columnsresize: true,
//             columns: [
//                 { text: 'Descrição', columntype: 'textbox', datafield: 'NME_TABELA', width: 500 }
//             ]
//         });
//     // events
//     $('#' + nomeGrid).on('rowdoubleclick', function (event) {
//         var args = event.args;
//         var rows = $('#' + nomeGrid).jqxGrid('getdisplayrows');
//         var rowData = rows[args.visibleindex];
//         var rowID = rowData.uid;
//         //GeraFile($('#'+nomeGrid).jqxGrid('getrowdatabyid', rowID).Tables_in_crm)
//         var nmeFile = prompt("Informe o nome do arquivo:");
//         if (nmeFile) {
//             GeraFile($('#' + nomeGrid).jqxGrid('getrowdatabyid', rowID).NME_TABELA, nmeFile);
//         } else {
//             alert("Nome do arquivo não informando favor tente novamente");
//         }
//     });
// }

$(document).ready(function () {
    ExecutaDispatch('MontaFile', 'ListarTabelas', undefined, MontaListaTabelas);
    // MontaListaTabelas();
    //lista();	
    //MontaTabelaUsuario();
});