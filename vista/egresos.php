<title>Ingresos</title>
<?php
include_once "assets/views/nav.php";
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Theme style -->
<!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css">-->
<link rel="stylesheet" href="../vista/assets/css/adminlte.min.css">
<!-- <link rel="stylesheet" href="assets/css/stilos.css">-->
<link rel="stylesheet" href="../vista/assets/css/stilos.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4><i class="fa fa-file" aria-hidden="true"></i><b>Reporte de Egresos</b></h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-user"></i> Total de Egresos
                                            <span id="total" class="badge bg-color6 text-c2"></span>
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
                                    <div class="card-header">
                                        <h5>Egresos</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="egresos" class="table table-bordered table-striped">
                                                <thead style="background-color: #e85813; color: white;">
                                                    <tr>
                                                        <th>CODIGO </th>
                                                        <th>NOMBRE PRODUCTO</th>
                                                        <th>CANTIDAD</th>
                                                        <th>USUARIO</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="egresos_lista">
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="../vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

<script src="../vista/assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="vista/assets/js/buscar.js"></script> -->
<script src="js/egresos.js "></script>
</div>