 <title>Administracion</title>
 <?php
    include_once "assets/views/nav.php";
    ?>
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js" integrity="sha256-i4vDW9EgtaJmeauDDymtNF2omPZ1fCKpf4w1gBlU1IE=" crossorigin="anonymous"></script>
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

             <div class="row">
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
             </div>
         </div>
         <!-- Calendario funcion -->
         <div class="col-md-12">
             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-dark">CALENDARIO</h6>
                 </div>
                 <br>
                 <div id='calendar'></div>
                 <br>
             </div>
         </div>
     </div>
     <!-- Pie Chart -->
 </div>

 <?php
    require_once "assets/views/footer.php" ?>