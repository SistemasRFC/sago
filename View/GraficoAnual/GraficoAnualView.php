<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Gráfico Anual</title>
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
                            <h1 class="h3 mb-0 text-gray-800">Relatórios</h1>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-persian-dark text-uppercase">Gráfico Anual</h6>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-5">
                                                <label class="label" for="codUsuario">Usuário</label>
                                                <div id="tdcodUsuario"></div>
                                            </div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-3">
                                                <label class="label" for="nroAnoReferencia">Ano *</label>
                                                <div id="tdnroAnoReferencia"></div>
                                            </div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-2 pt-3">
                                                <button id="btnPesquisar" class='btn btn-primary btn-icon-split'>
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                    <span class="text">Pesquisar</span>
                                                </button>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="chart-bar" id="divCanvas">
                                            <canvas id="chartContainer"></canvas>
                                        </div>
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

        <script src="js/GraficoAnualView.js?rdm=<?php echo time();?>"></script>
    </body>

</html>