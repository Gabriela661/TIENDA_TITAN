<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Reporte Vendedor</title>
    <?php
    include_once "assets/views/nav.php";
    ?>

    <!-- <link rel="stylesheet" href="assets/css/stilos.css">-->
    <link rel="stylesheet" href="../vista/assets/css/stilos.css">

    <body>
        <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="font-family: 'Open Sans', sans-serif;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h4><i class="fa fa-briefcase mr-3" aria-hidden="true"></i><b>Reporte de Vendedor</b></h4>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            &nbsp; <a type="button" class="btn btn-danger" href="#" id="generatePDF"><i class="far fa-file-pdf"></i></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary">
                                                <i class="fa fa-user"></i> Total de Vendedores
                                                <span class="badge bg-color6 text-c2" id="totalUsers"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="reporte_usuario" class="table table-bordered table-striped text-center mb-1">
                                                    <thead style="background-color: #e85813; color: white;">
                                                        <tr>
                                                            <th>N°</th>
                                                            <th>NOMBRE</th>
                                                            <th>APELLIDOS</th>
                                                            <th>CANTIDAD VENTA</th>
                                                            <th>TOTAL VENTA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="reporte_usuario_lista">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>

    </body>

    <script type="module" src="js/reporteUsuario.js"></script>


<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>