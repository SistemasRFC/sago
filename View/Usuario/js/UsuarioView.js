var listaUsuarios;
$(function () {
    $(".new").click(function () {
        LimparCampos();
    });
});

function CarregaGridUsuario() {
    ExecutaDispatch('Usuario', 'ListarUsuario', undefined, retornoGridUsuario);
}

function retornoGridUsuario(retorno) {
    $("#codUsuario").val('');
    MontaTabelaUsuario(retorno[1]);
}

function MontaTabelaUsuario(listaUsuario) {
    listaUsuarios = listaUsuario;
    var tabela = "";
    tabela += "<table class='table table-striped table-hover table-bordered' id='usuarioTable' width='100%'>";
    tabela += " <thead>";
    tabela += "     <tr>";
    tabela += "         <th>Código</th>";
    tabela += "         <th>Nome</th>";
    tabela += "         <th>CPF</th>";
    tabela += "         <th>Login</th>";
    tabela += "         <th>Perfil</th>";
    tabela += "         <th>Ativo</th>";
    tabela += "         <th></th>";
    tabela += "     </tr>";
    tabela += " </thead>";
    tabela += " <tbody>";
    for(var i in listaUsuario) {
        tabela += " <tr>";
        tabela += "     <td>"+listaUsuario[i].COD_USUARIO+"</td>";
        tabela += "     <td>"+listaUsuario[i].NME_USUARIO_COMPLETO+"</td>";
        tabela += "     <td>"+listaUsuario[i].NRO_CPF+"</td>";
        tabela += "     <td>"+listaUsuario[i].NME_USUARIO+"</td>";
        tabela += "     <td>"+listaUsuario[i].DSC_PERFIL_W+"</td>";
        if(listaUsuario[i].ATIVO == true) {
            tabela += " <td>Sim</td>";
        } else {
            tabela += " <td>Não</td>";
        }
        tabela += "     <td class='text-center'>\n\
                            <button class='btn btn-success btn-sm edit' data-id='"+listaUsuario[i].COD_USUARIO+"' title='Editar'>\n\
                                <span class='icon'>\n\
                                    <i class='fas fa-pencil-alt'></i>\n\
                                </span>\n\
                            </button>\n\
                        </td>";
        tabela += " </tr>";
    }
    tabela += " </tbody>";
    tabela += "</table>";

    $("#listaUsuarios").html(tabela);

    $('#usuarioTable').DataTable({
        "searching": false,
        "pagingType": "simple_numbers",
        "lengthChange" : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    });
    
    $(".edit").click(function(){
        var item = listaUsuarios.filter(elm => elm.COD_USUARIO == $(this).data('id'));
        preencheCamposForm(item[0],'indAtivo;B|');
        if(item[0].COD_PERFIL_W == 1){
            $("#codPerfilW").prop('disabled', true);
        } else {
            $("#codPerfilW").prop('disabled', false);
        }
        $("#exampleModalLabel").html('Editar Usuário');
        $("#usuarioModal").modal('show');
    });
}

$(document).ready(function () {
    ExecutaDispatch('Perfil', 'ListarPerfilAtivo', undefined, CarregaComboPerfil);
    CarregaGridUsuario();
});