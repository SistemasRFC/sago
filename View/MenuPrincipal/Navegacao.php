<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <!-- jquery -->
        <script src="../../Resources/constantes.js?random=<?php echo time(); ?>"></script>
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- JS -->
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/js/sb-admin-2.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../../../<?=ALIAS;?>Resources/bootstrap-admin/css/sb-admin-2.min.css"></link>
    <!-- bootstrap -->
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- chart -->
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/chart.js/Chart.bundle.min.js"></script>
    <!-- datatables -->
    <script src="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- fontawesome-free -->
    <link href="../../../<?=ALIAS;?>Resources/bootstrap-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- css -->
    <link href="../../../<?=ALIAS;?>Resources/bootstrap-admin/css/style.css" rel="stylesheet" type="text/css">

    <!-- Antigo Cabecalho -->
    <script src="../../View/MenuPrincipal/js/FuncoesGerais.js?random=<?php echo time(); ?>"></script>
    <script src="../../../<?=ALIAS;?>Resources/swal/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../<?=ALIAS;?>Resources/swal/dist/sweetalert.css">

    <script src="../../View/MenuPrincipal/js/Cabecalho.js?rdm=<?php echo time();?>"></script>
</head>

<body>
    <ul class="navbar-nav bg-gradient-persian sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../..<?=ALIAS;?>View/MenuPrincipal/MenuPrincipalView.php">
            <div class="sidebar-brand-icon">
                <i class="fas fa-wave-square"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SAGO</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <div id="CriaNovoMenu"></div>

    </ul>
</body>

</html>