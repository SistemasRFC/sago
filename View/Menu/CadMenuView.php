<script src="js/CadMenuView.js?rdm=<?php echo time();?>"></script>

<div class="modal fade" id="menuModal" data-backdrop="static" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" style="max-width: 60%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form name="menuForm" enctype="multpart/form-data" id="cadastroMenuForm" method="post" action="../../Controller/Menu/CadastroMenuController.php">
                <input type="hidden" id="codMenuW" name="codMenu" value="0" class="persist">    
                <input type="hidden" id="dscCaminhoImagem" name="dscCaminhoImagem" class="persist">
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label class="label" for="dscMenuW">Menu</label>
                        <input type="text" id="dscMenuW" name="dscMenu" class='persist input form-control'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label class="label" for="nmeController">Controller</label>
                        <input type="text" id="nmeController" name="nmeController" class='persist input form-control'>
                        <input type="hidden" name="nmeClasse" id="nmeClasse" class="persist">
                    </div>
                    <div class="col-sm-3">
                        <input type="button" value="Listar Controllers" class="btn btn-secondary mt-4" id="btnListarController" data-toggle="modal" data-target="#controllerMenuModal">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label class="label" for="nmeMethod">Method</label>
                        <input type="text" id="nmeMethod" name="nmeMethod" class='persist input form-control'>
                    </div>
                    <div class="col-sm-3">
                        <input type="button" value="Listar Métodos" class="btn btn-secondary mt-4" id="btnListarMetodos" data-toggle="modal" data-target="#methodMenuModal">
                    </div>   
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="checkbox" id="indMenuAtivoW" name="indMenuAtivoW" class='persist bg-gray-400'> Ativo
                        <input type="checkbox" id="indVisible" name="indVisible" class='persist bg-gray-400'> Visível
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="label" for="codMenuPaiW">Menu Pai</label>
                        <div id="tdcodMenuPaiW"></div>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <div class="col-sm-8">
                        <label class="label">Ícone do Atalho</label>
                        <div style="border-top:1px solid;padding-top: 5px;width: 220px;">
                            Selecione o arquivo:<br> -->
                            <input type="hidden" name="arquivo" id="arquivo" class="persist"/>
                            <!-- <br />
                            <progress value="0" max="100"></progress>
                            <span id="porcentagem">0%</span>
                            <br />
                        </div>
                    </div>
                </div> -->
            </form>
            </div>
            <div class="modal-footer">
                <button class='btn btn-secondary btn-icon-split' data-dismiss="modal" aria-label="Close">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="text">Cancelar</span>
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

<?php include_once "ListaControllerView.php";?>
<?php include_once "ListaMetodosView.php";?>