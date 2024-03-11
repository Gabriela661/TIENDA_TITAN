 <title>Administracion</title>
 <?php
    include_once "assets/views/nav.php";
    ?>
 <script src="../vista/assets/js/calendario.js"></script>
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

             <div class="row mb-5">
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
                             <div class="icon text-white">
                                 <i class="fas fa-chart-bar text-white"></i>
                             </div>
                         </a>
                         <a href="ingresos.php" class="small-box-footer">
                             Más detalle <i class="fas fa-arrow-circle-right"></i>
                         </a>
                     </div>
                 </div>
             </div>

             <!-- Gráficos -->
             <div class="row">
                 <div class="col-md-6">
                     <h2>Gráfico 1</h2>
                     <div id="grafico1"><!-- Aquí se incrustaría tu primer gráfico --></div>
                 </div>
                 <div class="col-md-6">
                     <h2>Gráfico 2</h2>
                     <div id="grafico2"><!-- Aquí se incrustaría tu segundo gráfico --></div>
                 </div>
             </div>
             <div class="row mt-4">
                 <div class="col-md-4">
                     <label for="fechaInicioG3">Fecha Inicial:</label>
                     <input type="date" id="fechaInicioG3" class="form-control">
                 </div>
                 <div class="col-md-4">
                     <label for="fechaFinG3">Fecha Final:</label>
                     <input type="date" id="fechaFinG3" class="form-control">
                 </div>
                 <div class="col-md-4">
                     <button id="btnCargarGrap3" class="btn btn-primary">Cargar Datos</button>
                 </div>
             </div>
             <div class="row mt-4">
                 <div class="col-md-4">
                <canvas id="graph3" width="100" height="100"></canvas>
                 </div>
             </div>


         </div>
     </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script src="assets/js/graph/graph.js"></script>

 <?php
   /*  require_once "assets/views/footer.php" */ ?>