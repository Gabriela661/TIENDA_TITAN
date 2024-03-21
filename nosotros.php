<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <title>NOSOTROS</title>
    <!-- librerias -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/foodhut.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/stilos.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Navbar -->
    <?php
    include_once "assets/views/navbar.php";
    ?>
    <!-- ./Navbar -->


    <!-- Menu de tienda -->
    <div class="has-bg-overlay middle-items wow fadeIn">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <section class="bg-secondary py-5">
            <div class="container">
                <div class="row align-items-center py-5">
                    <div class="col-md-8 text-white">
                        <i></i>
                        <h1>Nosotros</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="vista/assets/img/figura2.png" style="width:300px;height:300px" alt="About Hero">
                    </div>
                </div>
            </div>
        </section>
        <!-- Close Banner -->

        <!-- Start Section -->
        <section class="container py-5">
            <div class="row text-center pt-5 pb-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Nuestro servicios</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-primary text-center"><i class="fa fa-percent"></i></div>
                        <h2 class="h5 mt-4 text-center">Promociones</h2>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-primary text-center"><i class="fa fa-user"></i></div>
                        <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- page whatsapp  -->
    <?php include 'whatsapp.php' ?>
    <!-- librerias js -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <script src="assets/js/foodhut.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>
    <script src="./assets/js/script.js"></script>
    <script src="assets/js/foodhut.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- js de las funcionalidades -->
    <script src="vista/js/busquedaProductos.js"></script>

</body>

</html>
<!-- footer -->
<?php include 'assets/views/footer.php' ?>
<!-- end of page footer -->