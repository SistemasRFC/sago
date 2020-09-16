<!DOCTYPE html>
<?php 
    include_once '../../constantes.php';
?>
<html lang="pt-BR">
    <head>
        <title>SAGO - Disciplina-Atividade</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Relacionamento</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">Disciplina - Atividade</h6>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <div class="col-sm-4 ml-3">
                                                <label class="label" for="codDisciplina">Disciplina</label>
                                                <div id="tdcodDisciplina"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="label" for="codAtividade">Atividade</label>
                                                <div id="tdcodAtividade"></div>
                                            </div>
                                            <div class="col-sm-3 pt-3 text-right">
                                                <button id="btnInserir" class='btn btn-success btn-icon-split'>
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Salvar Relacionamento</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <div id="listaAtividades"></div>
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

    <script src="../../View/DisciplinaAtividade/js/DisciplinaAtividadeView.js?rdm=<?php echo time();?>"></script>

</body>

</html>