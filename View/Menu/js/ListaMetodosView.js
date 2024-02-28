function ListarMetodos(classe){
    if(classe != ""){
        ExecutaDispatch('Menu', 'ListarMetodos', 'classe<=>'+classe+'|'+'pastaAtual<=>'+$("#pastaAtual").val()+'|', MontaTabelaMetodos);
    } else {
        $("#listagemMetodos").html("<h4 class='text-center'>OPS! Selecione uma Controller Primeiro</h4>");
    }
}

function MontaTabelaMetodos(data){
    if (data[0]){
        data = data[1];
        tabela = '<table>';
        for (i=0;i<data.length;i++){
            tabela += '<tr>';        
            tabela += '<td><a href="javascript:Utilizar(\''+data[i]+'\');">'+data[i]+'</a></td>';
            tabela += '</tr>';
        }
        tabela += '</table>';
        $("#listagemMetodos").html(tabela);
    }
}

function Utilizar(metodo){
    $("#nmeMethod").val(metodo);
    $("#methodMenuModal").modal('hide');
}