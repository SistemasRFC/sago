<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Perfil</title>        
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
                            <input type="hidden" id="method" name="method" value="">
                            <input type="hidden" id="codPerfilW" name="codPerfilW" class="persist">
                            
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-persian-dark text-uppercase">Perfil</h6>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <button class='btn btn-primary btn-icon-split mb-3' id="btnNovo">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span class="text">Novo Perfil</span>
                                        </button>

                                        <form id="cadNovoPerfil">
                                            <div class="form-group row">
                                                <div class="col-sm-5 mb-3 mb-sm-0">
                                                    <label for="dscPerfilW">Descrição</label>
                                                    <input type="text" id="dscPerfilW" name="dscPerfilW" class='persist form-control'>
                                                </div>
                                                <div class="col-sm-3 mt-4 mb-sm-0">
                                                    <input type="checkbox" id="indAtivo" name="indAtivo" class='persist input bg-gray-400'> Ativo
                                                </div>
                                                <div class="col-sm-2 mb-3 mb-sm-0">
                                                    <button class='btn btn-success btn-block mb-1' id="btnSalvar">
                                                        <span class="icon">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Salvar</span>
                                                    </button>
                                                </div>
                                                <div class="col-sm-2 mb-3 mb-sm-0">
                                                    <button class='btn btn-secondary btn-block mb-1' id="btnCancel">
                                                        <span class="icon">
                                                            <i class="fas fa-times"></i>
                                                        </span>
                                                        <span class="text">Cancelar</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
            
                                        <div id="listaPerfil"></div>
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

        <script src="../../View/Perfil/js/PerfilView.js?rdm=<?php echo time();?>"></script>
    </body>
</html>
