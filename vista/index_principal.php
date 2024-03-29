<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {
?>
    <?php
    include_once "assets/views/nav.php";
    ?>

<!-- LIBRERIAS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="content-wrapper" style="background: url(assets/img/main.jpg) no-repeat center center fixed; background-size: cover; min-height: 750px;
" style="font-family: 'Open Sans', sans-serif;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <!-- <center>
                            <h1 class="m-0"> Sistema Ferretaría <strong>TITAN</strong> </h1>
                        </center> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner text-white">
                                <!-- Usuarios totales -->
                                <h3 id="usuariosTotalP"></h3>
                                <p>Usuarios</p>
                            </div>
                            <a href="usuarios.php">
                                <div class="icon text-white">
                                    <i class="fas fa-user-plus text-white"></i>
                                </div>
                            </a>
                            <a href="usuarios.php" class="small-box-footer">
                                Más detalle <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner text-white">
                                <h3 id="productosTotalP"></h3>
                                <p> Productos</p>
                            </div>
                            <a href="productos.php">
                                <div class="icon text-white">
                                    <i class="fas fa-box text-white"></i>
                                </div>
                            </a>
                            <a href="productos.php" class="small-box-footer">
                                Más detalle <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner text-white">
                                <h3 id="categoriaTotalP"></h3>
                                <p> Categorias</p>
                            </div>
                            <a href="categoria.php">
                                <div class="icon text-white">
                                    <i class="fas fa-tag text-white "></i>
                                </div>
                            </a>
                            <a href="categoria.php" class="small-box-footer text-white">
                                Más detalle <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner text-white">
                                <h3 id="ingresosTotalP"></h3>
                                <p>Ingresos</p>

                            </div>
                            <a href="ingresos.php">
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                            </a>
                            <a href="ingresos.php" class="small-box-footer">
                                Más detalle <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <hr>
                <!-- Gráficos -->
                <!-- Contenedor principal de gráficas -->

                <div class="row">

                    <section class="col-lg-6 connectedSortable">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="row">
                                    <div class="card col-md-10">
                                        <div class="row card-header">
                                            <div class="col-md-4">
                                                <label for="fechaInicioG3">Inicial:</label>
                                                <input type="date" id="fechaInicioG3" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="fechaFinG3">Final:</label>
                                                <input type="date" id="fechaFinG3" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <button id="btnCargarGrap3" class="btn btn-primary">Cargar</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content p-0">
                                                <div class="chart tab-pane active d-flex justify-content-center">
                                                    <canvas id="graph3" height="280"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="card col-md-10">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-chart-pie mr-1"></i>
                                                Ventas
                                            </h3>
                                            <div class="card-tools">
                                                <ul class="nav nav-pills ml-auto">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                                    </li>                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content p-0">
                                                <div class="chart tab-pane active d-flex justify-content-center" id="revenue-chart">
                                                    <canvas id="revenue-chart-canvas" height="300"></canvas>
                                                </div>                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="card col-md-10">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-chart-pie mr-1"></i>
                                                Ventas
                                            </h3>
                                            <div class="card-tools">
                                                <ul class="nav nav-pills ml-auto">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#sales-chart" data-toggle="tab">Barra</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content p-0">                                                
                                                <div class="chart tab-pane active d-flex justify-content-center" id="sales-chart">
                                                    <canvas id="sales-chart-canvas" height="400" style="height: 300px;"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <section class="col-lg-6 connectedSortable">
                        <!-- graph 1 -->

                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-center">
                                    <h2 class="card-title">Ventas semanales</h3>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <canvas id="graph5" height="320"></canvas>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-center">
                                    <h3 class="card-title">Venta por categoría</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="position-relative d-flex justify-content-center" >
                                    <canvas id="barChart" height="320"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-center">
                                    <h3 class="card-title">Venta por usuario</h3>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <div class="position-relative">
                                    <canvas class="ml-3" height="340" width="450" id="graph6"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- graph 2, 3, 4 -->
                        <div class="row">

                        </div>

                        <!-- graph 5 y 6 -->
                        <!-- <div class="row mt-2">
                             <h2>Gráfico 5</h2>
                             <div class="col-md-6">
                             </div>
                             <h2>Gráfico 6</h2>
                             <div class="col-md-6">
                             </div>
                         </div> -->
                    </section>
                </div>



            </div>


        </div>
    </div>

    <!--  <footer class="main-footer">
     <strong>Copyright &copy; 2024-2025 <a href="#">Tienda TITAN</a>.</strong>
     Derechos reservados.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 1.0.0
     </div>
 </footer> -->

    <script src="js/graph/graph.js"></script>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>
</div>
</body>