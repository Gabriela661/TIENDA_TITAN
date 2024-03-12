<title>Reporte Usuario</title>
<?php
include_once "assets/views/nav.php";
?>

<!-- <link rel="stylesheet" href="assets/css/stilos.css">-->
<link rel="stylesheet" href="../vista/assets/css/stilos.css">

<body>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4><i class="fa fa-briefcase" aria-hidden="true"></i><b>Reporte de Usuario</b></h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a type="button" class="btn btn-warning" id="openPdfModal"><i class="fas fa-print"></i></a>
                                        &nbsp; <a type="button" class="btn btn-success" href="#"><i class="far fa-file-excel"></i></a>
                                        &nbsp; <a type="button" class="btn btn-danger" href="#" id="generatePDF"><i class="far fa-file-pdf"></i></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <button class="btn btn-primary">
                                            <i class="fa fa-user"></i> Total de Usuarios
                                            <span class="badge bg-color6 text-c2">1</span>
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
                                            <table id="reporte_usuario" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>NOMBRE</th>
                                                        <th>APELLIDOS</th>
                                                        <th>TIPO DE CLIENTE</th>
                                                        <th>CANTIDAD COMPRA</th>
                                                        <th>TOTAL COMPRA</th>
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


<!-- AdminLTE for demo purposes -->
<script src="js/reporteUsuario.js"></script>
<!-- <script src="../vista/assets/js/buscar.js"></script> -->

