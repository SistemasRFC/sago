<?php
    include_once '../../constantes.php';
?>
<html>
    <head>
        <title>SAGO - Alterar Senha</title>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=IBM850; ISO-8859-1">
        <!-- jquery -->
        <script src="../../../<?=ALIAS;?>Resources/constantes.js?random=<?php echo time(); ?>"></script>
        <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/jquery/jquery.min.js"></script>
        <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- JS -->
        <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/js/sb-admin-2.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="../../../<?=ALIAS;?>Resources/bootstrap-admin/css/sb-admin-2.min.css"></link>
        <!-- bootstrap -->
        <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- fontawesome-free -->
        <link href="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- css -->
        <link href="../../../<?=ALIAS;?>Resources/bootstrap-admin/css/style.css" rel="stylesheet" type="text/css">

        <!-- Antiga Index -->
        <script src="../../../<?=ALIAS;?>View/MenuPrincipal/js/FuncoesGerais.js?random=<?php echo time(); ?>"></script>
        <script src="../../../<?=ALIAS;?>Resources/swal/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../../<?=ALIAS;?>Resources/swal/dist/sweetalert.css"> 

        <script src="js/AlteraSenhaView.js?rdm=<?php echo time();?>"></script>
    </head>
    <body>
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5" style="padding-top: 6rem">
                            <h1 class="text-center text-persian-dark">SAGO</h1>
                            <h2 class="text-center text-persian-light">Sistema de Apoio ao Gerenciamento de Orçamentos</h2>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5 p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-800 mb-4">ALTERAÇÃO DE SENHA</h1>
                            </div>
                            <form class="user" name="AlteraSenhaForm" id="AlteraSenhaForm" method="post" action="../../Controller/Login/LoginController.php">
                                <div class="form-group">
                                    <label for="txtSenha" class="mb-0">Senha Atual</label>
                                    <input type="password" id="txtSenha" name="txtSenha" class='login persist input form-control'>
                                </div>
                                <div class="form-group">
                                    <label for="txtSenhaNova" class="mb-0">Nova Senha</label>
                                    <input type="password" id="txtSenhaNova" name="txtSenhaNova" class='login persist input form-control'>
                                </div>
                                <div class="form-group">
                                    <label for="txtConfirmacao" class="mb-0">Confirmar Nova Senha</label>
                                    <input type="password" id="txtConfirmacao" name="txtConfirmacao" class='login persist input form-control'>
                                </div>
                                <input type="button" id="btnAlterar" value="Alterar" class="btn btn-primary btn-user btn-block">
                            </form>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>