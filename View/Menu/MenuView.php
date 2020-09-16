<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Cadastro de Menus</title>
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
                            <h1 class="h3 mb-0 text-gray-800">Restrito</h1>
                        </div>

                        <div class="row">
                            <input type="hidden" id="method" name="method" class="persist">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-persian-dark text-uppercase">Menus</h6>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <button id="btnNovo" class='btn btn-primary btn-icon-split mb-3 new' data-toggle="modal" data-target="#menuModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span class="text">Novo Menu</span>
                                        </button>

                                        <div id="listaMenus"></div>
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

        <script src="../../View/Menu/js/CadastroMenuView.js?rdm=<?php echo time();?>"></script>

        <?php include_once "CadMenuView.php" ?>
    </body>

</html>