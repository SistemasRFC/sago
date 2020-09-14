<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Permissões Menu</title>        
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
                            <input type="hidden" value="" name="method" id="method">
                            <input type="hidden" value="" name="codMenu" id="codMenu">
                            <input type="hidden" value="" name="indAtivo" id="indAtivo">

                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-persian-dark text-uppercase">Permissões de Menu</h6>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <!-- <form name="PermissaoForm" id="PermissaoForm" method="post" action="Controller/PermissaoMenu/PermissaoMenuController.php"> -->
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-3 mb-3 mb-sm-0">
                                                    <label for="codPerfil">Perfil</label>
                                                    <div id="tdcodPerfil"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-12 mb-2 mb-sm-0">
                                                    <h4 class="text-center">Menus Existentes</h4>
                                                </div>
                                            </div>
                                            
                                            <div id="jqxWidget" class="mb-3" style='border: 1px solid #000000;'>
                                                <div id="checkboxes"></div>
                                            </div>
                                            
                                            <div class="row" class="MenusExistentes">
                                                <button class='btn btn-success btn-block mb-1' id="btnSalvar">
                                                    <span class="icon">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Salvar</span>
                                                </button>
                                            </div>
                                        </form>
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

        <script src="../../View/PermissaoMenu/js/PermissaoMenuView.js?rdm=<?php echo time();?>"></script>
    </body>
</html>
