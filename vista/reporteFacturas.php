<title>Reporte Facturas</title>
<?php
include_once "assets/views/nav.php";
?>

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
                            <h4><i class="fa fa-file mr-2" aria-hidden="true"></i><b>Reporte de Ventas</b></h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row mb-5"><a id="diaFactura" type="button" href="#" class="btn btn-primary"><i class="fa fa-plus-square"></i> Día</a>&nbsp;&nbsp;
                                            <a id="mesFactura" type="button" href="#" class="btn btn-success"><i class="fa fa-plus-square"></i> Mes</a>&nbsp;                                        
                                            &nbsp; <a type="button" class="btn btn-danger" href="#" id="generatePDFF"><i class="far fa-file-pdf"></i></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary">
                                                <i class="fa fa-user"></i> Total de ventas
                                                <span class="badge bg-color6 text-c2">1</span>
                                            </button>
                                        </div>
                                        <div class="row mb-6">
                                            <div class="col-md-3">
                                                <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                                                <input type="date" class="form-control" id="fecha_inicio">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                                                <input type="date" class="form-control" id="fecha_fin">
                                            </div>
                                            <div class="col-md-2 align-self-end">
                                                <a href="#" id="fechasFactura" class="btn btn-primary">Consultar</a>
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
                                            <table id="reporte_facturas" class="table table-bordered table-striped">
                                                <thead id="facturas_lista_head" style="background-color: #e85813; color: white;">
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>FECHA</th>
                                                        <th>CLIENTE</th>
                                                        <th>TIPO DE PAGO</th>
                                                        <th>TIPO DE VENTA</th>
                                                        <th>MONTO TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="reporte_facturas_lista">
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

<script src="js/reporteFacturas.js"></script>
</div>