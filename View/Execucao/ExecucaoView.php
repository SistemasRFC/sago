<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Cadastro de Execução</title>
    </head>

    <body id="page-top">

        <div id="wrapper">
            <!-- Navegacao -->
            <?php include_once PATH."View/MenuPrincipal/Navegacao.php";?>
            <!-- Fim da Navegacao -->

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Cabecalho -->
                    <?php include_once PATH."View/MenuPrincipal/Cabecalho.php";?>
                    <!-- Fim Cabecalho -->

                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Cadastro</h1>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-persian-dark text-uppercase">O.F.</h6>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <input type="hidden" id="method" name="method">
                                        <input type="hidden" id="codExecucao" name="codExecucao" class="persist">
                                        <input type="hidden" id="indStatus" name="indStatus" class="persist">
                                        
                                        <button class='btn btn-primary btn-icon-split mb-3 new' id="btnNovaOF">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span class="text">Nova O.F.</span>
                                        </button>

                                        <div id="cadNovaOF">
                                            <div class="form-group row">
                                                <div class="col-sm-3 mb-3 mb-sm-0">
                                                    <label class="label" for="codOf">O.F.</label>
                                                    <input type="text" id="codOf" name="codOf" class='persist form-control'>
                                                </div>
                                                <div class="col-sm-3 mb-3 mb-sm-0">
                                                    <label class="label" for="nroOrdemContratacao">Ordem Contratação</label>
                                                    <input type="text" id="nroOrdemContratacao" name="nroOrdemContratacao" class='persist form-control'>
                                                </div>                                                
                                                <div class="col-sm-3 mb-3 mb-sm-0">
                                                    <label class="label" for="nroMesReferencia">Mês referência</label>
                                                    <div id="tdnroMesReferencia"></div>
                                                </div>
                                                <div class="col-sm-3 mb-3 mb-sm-0">
                                                    <label class="label" for="nroAnoReferencia">Ano referência</label>
                                                    <div id="tdnroAnoReferencia"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <button class='btn btn-secondary btn-block mb-3' id="btnCancelar">
                                                        <span class="icon">
                                                            <i class="fas fa-times"></i>
                                                        </span>
                                                        <span class="text">Cancelar</span>
                                                    </button>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <button class='btn btn-success btn-block mb-3' id="btnSalvarExecucao">
                                                        <span class="icon">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Salvar</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="listaExecucao"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="../../View/Execucao/js/ExecucaoView.js?rdm=<?php echo time();?>"></script>

        <?php include_once "CadExecucaoView.php" ?>
    </body>

</html>