<script src="js/ListaControllerView.js?rdm=<?php echo time();?>"></script>

<div class="modal fade" id="controllerMenuModal" data-backdrop="static" tabindex="0" role="dialog" aria-labelledby="controllerModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="controllerModalLabel">Controller(s)</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="pastaAtual">
                
                <div id="listaController"></div>
            </div>
            <div class="modal-footer">
                <button class='btn btn-secondary btn-icon-split' data-dismiss="modal" aria-label="Close">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="text">Cancelar</span>
                </button>
            </div>
        </div>
    </div>
</div>