<script src="js/ListaMetodosView.js?rdm=<?php echo time();?>"></script>

<div class="modal fade" id="methodMenuModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="methodModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="methodModalLabel">Método(s)</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="pastaAtual">
                
                <div id="listagemMetodos"></div>
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