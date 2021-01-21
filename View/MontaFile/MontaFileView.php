<?php
include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Montar Arquivos</title>        
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
                            <input type="hidden" id="method">
                            <input type="hidden" id="codUsuario">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-persian-dark text-uppercase">Monta File</h6>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <button id="Refresh" class='btn btn-primary mb-3' onclick="javascript:MontaListaTabelas();">
                                            <span class="text">Atualiza</span>
                                        </button>

                                        <div id="listaTabelas"></div>
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

        <script src="../MontaFile/JavaScript/MontaFileView.js?rdm=<?php echo time();?>"></script>        

    </body>
</html>
