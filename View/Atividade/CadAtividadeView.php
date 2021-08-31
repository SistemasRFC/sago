<script src="js/CadAtividadeView.js?rdm=<?php echo time();?>"></script>

<div class="modal fade" id="atividadeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Atividade</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <input type="hidden" id="codAtividade" name="codAtividade" value="0" class="persist">
                <input type="hidden" id="method" name="method">
                <div class="form-group row">
                    <div class="col-sm-10 mb-3 mb-sm-0">
                        <label class="label" for="dscAtividade">Descrição</label>
                        <input type="text" id="dscAtividade" name="dscAtividade" class='persist input form-control'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="checkbox" id="indAtivo" name="indAtivo" class='persist input bg-gray-400'> Ativo
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