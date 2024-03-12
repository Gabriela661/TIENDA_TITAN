 <title>Administracion</title>
 <?php
    include_once "assets/views/nav.php";
    ?>



 <div class="content-wrapper">
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-12">
                     <center>
                         <h1 class="m-0">Bienvenido al SISTEMA FERRETERIA "TITAN" </h1>
                     </center>
                 </div>
             </div>
         </div>
     </div>

     <!-- Main content -->
     <div class="content">
         <div class="container-fluid">
             <h4><i class="fa fa-briefcase" aria-hidden="true"></i><b>Contenido del sistema</b></h4>
             <div class="row mb-2">
                 <div class="col-lg-3 col-6">
                     <div class="small-box bg-gradient-primary">
                         <div class="inner text-white">
                             <h3>10</h3>
                             <p>Usuarios Registrados</p>
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
                             <h3>23</h3>
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
                             <h3>23</h3>
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
                     <div class="small-box bg-danger">
                         <div class="inner text-white">
                             <h3>3</h3>
                             <p> Reportes</p>
                         </div>
                         <a href="reportes.php">
                             <div class="icon text-white">
                                 <i class="fas fa-chart-bar text-white"></i>
                             </div>
                         </a>
                         <a href="reportes.php" class="small-box-footer">
                             Más detalle <i class="fas fa-arrow-circle-right"></i>
                         </a>
                     </div>
                 </div>
                 <div class="col-lg-3 col-6">
                     <div class="small-box bg-success">
                         <div class="inner text-white">
                             <h3>3</h3>
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

             <!-- Gráficos -->
             <!-- Contenedor principal de gráficas -->
             <div class="row">
                 <section class="col-lg-7 connectedSortable">
                     <!-- graph 1 -->
                     <div class="card">
                         <div class="card-header">
                             <h3 class="card-title">
                                 <i class="fas fa-chart-pie mr-1"></i>
                                 Sales
                             </h3>
                             <div class="card-tools">
                                 <ul class="nav nav-pills ml-auto">
                                     <li class="nav-item">
                                         <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="tab-content p-0">

                                 <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                     <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                 </div>
                                 <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                     <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Ventas semanales</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="d-flex">
                                 <p class="d-flex flex-column">
                                    <!--  <span class="text-bold text-lg">820</span>
                                     <span>Visitors Over Time</span> -->
                                 </p>
                                 <p class="ml-auto d-flex flex-column text-right">
                                     <!-- <span class="text-success">
                                         <i class="fas fa-arrow-up"></i> 12.5%
                                     </span>
                                     <span class="text-muted">Since last week</span> -->
                                 </p>
                             </div>

                             <div class="position-relative mb-4">
                                 <canvas id="graph5" height="200"></canvas>
                             </div>
                             <div class="d-flex flex-row justify-content-end">
                                 <span class="mr-2">
                                     <i class="fas fa-square text-primary"></i> Esta semana
                                 </span>
                                 <span>
                                     <i class="fas fa-square text-gray"></i> Semana pasada
                                 </span>
                             </div>
                         </div>
                     </div>

                     <!-- graph 2, 3, 4 -->
                     <div class="row">
                         <div class="col-md-6">
                             <h2>Gráfico 1</h2>
                             <canvas id="barChart" width="100" height="100"></canvas>
                         </div>
                       <!--   <div class="col-md-4">
                             <h2>Gráfico 2</h2>
                             <canvas id="" width="100" height="100"></canvas>
                         </div> -->
                         <div class="col-md-6">
                             <h2>Gráfico 2</h2>
                             <div class="row">
                                 <div class="col-md-6">
                                     <label for="fechaInicioG3">Fecha Inicial:</label>
                                     <input type="date" id="fechaInicioG3" class="form-control">
                                 </div>
                                 <div class="col-md-6">
                                     <label for="fechaFinG3">Fecha Final:</label>
                                     <input type="date" id="fechaFinG3" class="form-control">
                                 </div>
                             </div>
                             <div class="row mt-2">
                                 <div class="col-md-12">
                                     <button id="btnCargarGrap3" class="btn btn-primary">Cargar Datos</button>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <canvas id="graph3" width="100" height="100"></canvas>
                             </div>
                         </div>
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

                 <section class="col-lg-5 connectedSortable"></section>

             </div>

         </div>


     </div>
 </div>

 <footer class="main-footer">
     <strong>Copyright &copy; 2024-2025 <a href="#">Tienda TITAN</a>.</strong>
     Derechos reservados.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 1.0.0
     </div>
 </footer>

 </div>
 <script src="js/graph/graph.js"></script>

 <!--  <script src="plugins/jquery/jquery.min.js"></script>

 <script src="plugins/jquery-ui/jquery-ui.min.js"></script>


 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script src="plugins/chart.js/Chart.min.js"></script>

 <script src="plugins/sparklines/sparkline.js"></script>

 <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

 <script src="plugins/jquery-knob/jquery.knob.min.js"></script>

 <script src="plugins/moment/moment.min.js"></script>
 <script src="plugins/daterangepicker/daterangepicker.js"></script>

 <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

 <script src="plugins/summernote/summernote-bs4.min.js"></script>

 <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

 <script src="dist/js/adminlte.js?v=3.2.0"></script>

 <script src="dist/js/demo.js"></script>

 <script src="dist/js/pages/dashboard.js"></script> -->
 </body>