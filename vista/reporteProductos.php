<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3) {
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Reporte Productos</title>
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
                            <div class="col-sm-12">
                                <h4><i class="fa fa-archive mr-3" aria-hidden="true"></i><b>Reporte de Productos</b></h4>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6 row d-flex align-items-center">
                                                    <a id="diaProducto" type="button" href="#" class="btn btn-success"><i class="fa fa-plus-square"></i> Día</a> &nbsp; &nbsp;
                                                    <a id="mesProducto" type="button" href="#" class="btn btn-primary mr-2"><i class="fa fa-plus-square"></i> Mes</a>
                                                    &nbsp; <a type="button" class="btn btn-danger" href="#" id="generatePDFFF"><i class="far fa-file-pdf"></i></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-user"></i> Total productos
                                                        <span class="badge bg-color6 text-c2" id="totalProductorep"></span>
                                                    </button>
                                                </div>
                                                <div class="col-lg-6 row d-flex align-items-center">
                                                    <div class="col-md-3">
                                                        <label for="fecha_inicioP" class="form-label">Inicio:</label>
                                                        <input type="date" class="form-control" id="fecha_inicioP">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="fecha_finP" class="form-label">Fin:</label>
                                                        <input type="date" class="form-control" id="fecha_finP">
                                                    </div>
                                                    <div class="col-md-2 align-self-end">
                                                        <a href="#" id="fechasProducto" class="btn btn-primary">Consultar</a>
                                                    </div>
                                                </div>
                                            </div>
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

                                <div class="table-responsive">
                                    <table id="reporte_productos" class="table table-bordered table-striped">
                                        <thead id="productos_lista_head" style="background-color: #e85813; color: #e5ecf7;">
                                            <tr>
                                                <th>N°</th>
                                                <th>NOMBRE</th>
                                                <th>CANTIDAD</th>
                                                <th>PRECIO</th>
                                                <th>TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productos_lista">
                                        </tbody>
                                    </table>
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
    <script type="module" src="js/reporteProductos.js"></script>
    </div>

<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>