<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3 || $_SESSION['id_rol'] == 4 || $_SESSION['id_rol'] == 5) {
?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Panel de usuario</title>
    <?php
    include_once "assets/views/nav.php";
    ?>



    <div class="content-wrapper" style="font-family: 'Open Sans', sans-serif;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <center>
                            <h1 class="m-0"> Sistema Ferretaría <strong>TITAN</strong> </h1>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div>
                        Productos
                    </div>
                </div>

                <hr>
                <!-- Gráficos -->
                <!-- Contenedor principal de gráficas -->
                <div class="card p-5 row" style="background-color: #cdd2db;">
                    <div class="row">
                        Historial Compra
                    </div>

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
    </div>
    </body>
<?php
    /* include_once "assets/views/footer.php"; */
} else {
    header('Location: ../login.php');
}
?>