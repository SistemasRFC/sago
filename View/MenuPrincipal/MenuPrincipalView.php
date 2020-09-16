<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">

<head>
    <title>SAGO - Início</title>
    <script src="../../View/MenuPrincipal/js/MenuPrincipalView.js?rdm=<?php echo time();?>"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Navegacao -->
        <?php include_once "Navegacao.php";?>
        <!-- Fim da Navegacao -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Cabecalho -->
                <?php include_once "Cabecalho.php";?>
                <!-- Fim Cabecalho -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Início</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Meu Time</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ubatânia - Audit</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pontuação do mês</div>
                                            
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">410 USTBB</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-coins fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-persian-dark">VISÃO GERAL DOS GANHOS <span class="badge bg-success text-gray-100"> Mês Atual</span></h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<!-- Page level custom scripts -->
<script src="../../Resources/bootstrap-admin/js/demo/chart-area-demo.js"></script>
<script src="../../Resources/bootstrap-admin/js/demo/chart-pie-demo.js"></script>
<script src="../../Resources/bootstrap-admin/js/demo/chart-bar-demo.js"></script>

</body>

</html>