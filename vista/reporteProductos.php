<title>Reporte Productos</title>
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
                            <h4><i class="fa fa-archive" aria-hidden="true"></i><b>Reporte de Productos</b></h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row mb-5"><a id="diaProducto" type="button" href="#" class="btn btn-primary"><i class="fa fa-plus-square"></i> Día</a>
                                            <a id="mesProducto" type="button" href="#" class="btn btn-primary"><i class="fa fa-plus-square"></i> Mes</a>
                                            &nbsp; <a type="button" class="btn btn-warning" id="openPdfModal"><i class="fas fa-print"></i></a>
                                            &nbsp; <a type="button" class="btn btn-success" href="#"><i class="far fa-file-excel"></i></a>
                                            &nbsp; <a type="button" class="btn btn-danger" href="#" id="generatePDFFF"><i class="far fa-file-pdf"></i></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary">
                                                <i class="fa fa-user"></i> Total de productos
                                                <span class="badge bg-color6 text-c2">1</span>
                                            </button>
                                        </div>
                                        <div class="row mb-6">
                                            <div class="col-md-3">
                                                <label for="fecha_inicioP" class="form-label">Fecha de inicio:</label>
                                                <input type="date" class="form-control" id="fecha_inicioP">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="fecha_finP" class="form-label">Fecha de fin:</label>
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
                                            <table id="reporte_productos" class="table table-bordered table-striped">
                                                <thead id="productos_lista_head">
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
<script src="js/reporteProductos.js"></script>
</div>