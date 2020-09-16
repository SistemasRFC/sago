<script src="js/CadExecucaoView.js?rdm=<?php echo time();?>"></script>

<div class="modal fade" id="execucaoModal" tabindex="-1" role="dialog" aria-labelledby="infoOF" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 75%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoOF"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form>
                    <input type="hidden" id="codExecucaoComplexidade" name="codExecucaoComplexidade" value="" class="persist">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label" for="codDisciplina">Disciplina</label>
                            <div id="tdcodDisciplina"></div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label" for="codDisciplinaAtividade">Atividade</label>
                            <div id="tdcodDisciplinaAtividade"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label" for="codAtividadeArtefato">Artefato</label>
                            <div id="tdcodAtividadeArtefato"></div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label" for="codArtefatoComplexidade">Complexidade</label>
                            <div id="tdcodArtefatoComplexidade"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label" for="codComplexidadeComponente">Componente</label>
                            <div id="tdcodComplexidadeComponente"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label class="label" for="nmeArquivo">Arquivo</label>
                            <input type="text" id="nmeArquivo" name="nmeArquivo" class='persist input form-control'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label class="label" for="txtDescricaoJustificativa">Justificativa</label>
                            <input type="text" id="txtDescricaoJustificativa" name="txtDescricaoJustificativa" class='persist input form-control'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <button class='btn btn-info btn-block mb-3' id="btnLimpar">
                                <span class="icon">
                                    <i class="fas fa-eraser"></i>
                                </span>
                                <span class="text">Limpar Campos</span>
                            </button>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <button class='btn btn-success btn-block mb-3' id="btnInserirArquivo">
                                <span class="icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Salvar Arquivo</span>
                            </button>
                        </div>
                    </div>
                </form>

                <div id="listaOF"></div>
            </div>
            
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>