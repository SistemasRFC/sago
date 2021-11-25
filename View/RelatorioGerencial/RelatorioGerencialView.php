<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Relatório Gerencial</title>
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
                    <input type="hidden" id="verificaPermissao" name="verificaPermissao" value="N" class="persist">
                    <!-- Conteúdo -->
                    <div class="container-fluid">

                        <!-- Cabeçalho Conteúdo-->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Relatórios</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                            <!-- Card -->
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Cabeçalho -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-persian-dark text-uppercase">Gerencial</h6>
                                    </div>
                                    <!-- Card Conteúdo -->
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <label class="label" for="codUsuario">Usuário</label>
                                                <div id="tdcodUsuario"></div>  
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="label" for="nroMesReferencia">Mês *</label>
                                                <div id="tdnroMesReferencia"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="label" for="nroAnoReferencia">Ano *</label>
                                                <div id="tdnroAnoReferencia"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3 pr-1">
                                                <button id="btnPesquisar" class='btn btn-primary btn-block'>
                                                    <span class="icon text-white-40">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                    <span class="text">Pesquisar</span>
                                                </button>
                                            </div>
                                            <div class="col-sm-3 pl-1 pr-1">
                                                <button id="btnPesquisarSumarizado" class='btn btn-warning btn-block'>
                                                    <span class="icon text-white-40">
                                                        <i class="far fa-file-excel"></i>
                                                    </span>
                                                    <span class="text">Gerar Orçamento</span>
                                                </button>
                                            </div>
                                            <div class="col-sm-3 pl-1">
                                                <button id="btnPesquisarArquivos" class='btn btn-info btn-block'>
                                                    <span class="icon text-white-40">
                                                        <i class="far fa-file-archive"></i>
                                                    </span>
                                                    <span class="text">Gerar Arquivos</span>
                                                </button>
                                            </div>
                                            <div class="col-sm-3 pl-1">
                                                <button id="btnGerarJson" class='btn btn-success btn-block'>
                                                    <span class="icon text-white-40">
                                                        <i class="far fa-file-archive"></i>
                                                    </span>
                                                    <span class="text">Gerar JSON</span>
                                                </button>
                                            </div>                                            
                                        </div>

                                        <!-- <hr>

                                        <div id='listagemGerencial'></div> -->
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

        <script src="js/RelatorioGerencialView.js?rdm=<?php echo time();?>"></script>
    </body>
</html>
