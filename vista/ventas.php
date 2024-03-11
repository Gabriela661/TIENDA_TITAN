<?php
session_start();
/* if ($_SESSION['rol_usuario'] == 1 || $_SESSION['rol_usuario'] == 2) { */
?>
<title>Inventario</title>

<?php include_once "assets/views/nav.php"; ?>
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>VENTAS</h1>
                    </div>
                    <!-- Enlace superior -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="paginaPrincipal.php">Inicio</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Buscador productos -->
        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4">Buscar Venta</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="simple-results.html">
                            <div class="input-group">
                                <input id="buscar_venta" type="search" class="form-control form-control-lg" placeholder="Ingrese ...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tabla de productos -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de ventas</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive"> <!-- Agrega la clase table-responsive al contenedor de la tabla -->
                                <div class="container center p-5">
                                    <button class="btn btn-primary">Ordenar por Monto</button>
                                    <button class="btn btn-primary">Ordenar por Fecha</button>
                                </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>TIPO DE PAGO</th>
                                                <th>CLIENTE</th>
                                                <th>TIPO DE VENTA</th>
                                                <th>MONTO TOTAL</th>
                                                <th>FECHA</th>
                                                <th>VER</th>
                                            </tr>
                                        </thead>
                                        <tbody id="venta">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="js/venta.js"></script>
    <?php
    include_once "assets/views/footer.php";
    /* } else {
  header('Location: ../login.php');
} */
    ?>
    <!-- <script src="js/producto.js"></script> -->