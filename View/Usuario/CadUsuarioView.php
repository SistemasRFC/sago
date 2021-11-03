<script src="js/CadUsuarioView.js?rdm=<?php echo time();?>"></script>

<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 55%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form name="UsuarioForm" method="post" action="Controller/Usuario/UsuarioController.php">
                <input type="hidden" id="method" name="method">
                <input type="hidden" id="codUsuario" name="codUsuario" class="persist">
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label class="label" for="nmeUsuarioCompleto">Nome Completo</label>
                        <input type="text" id="nmeUsuarioCompleto" name="nmeUsuarioCompleto" class='persist input form-control'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label class="label" for="nroCpf">CPF</label>
                        <input type="text" id="nroCpf" name="nroCpf" class='persist input form-control'>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        <label class="label" for="nmeUsuario">Login</label>
                        <input type="text" id="nmeUsuario" name="nmeUsuario" class='persist input form-control'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label" for="codChave">Chave BB</label>
                        <input type="text" id="codChave" name="codChave" class='persist input form-control'>
                    </div>                    
                    <div class="col-sm-6">
                        <label class="label" for="txtEmail">E-mail</label>
                        <input type="text" id="txtEmail" name="txtEmail" class='persist input form-control'>
                    </div>
                </div>   
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label" for="codPerfilW">Perfil</label>
                        <div id="tdcodPerfilW"></div>
                    </div>
                    <div class="col-sm-6" style="padding-top: 2.5rem!important">
                        <input type="checkbox" id="indAtivo" name="indAtivo" class='persist input bg-gray-400'> Ativo
                    </div>
                </div>  
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label" for="codProjeto">Projeto</label>
                        <div id="tdcodProjeto"></div>
                    </div>
                </div>                 
            </form>
            </div>
            <div class="modal-footer">
                <button class='btn btn-secondary btn-icon-split' data-dismiss="modal" aria-label="Close">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="text">Cancelar</span>
                </button>
                <button id="btnReiniciarSenha" class='btn btn-info btn-icon-split'>
                    <span class="icon text-white-50">
                        <i class="fas fa-redo-alt"></i>
                    </span>
                    <span class="text">Reiniciar Senha</span>
                </button>
                <button id="btnSalvar" class='btn btn-success btn-icon-split'>
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Salvar</span>
                </button>
            </div>
        </div>
    </div>
</div>
