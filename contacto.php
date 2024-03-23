<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <title>CONTACTO</title>
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
        <div class="banner-especial -lr">
            <img class="img-responsive vdk" src="assets/img/3.png" alt="Combo" width="100%" height="auto">
            <br><br><br>
        </div>

        <div class="container">
            <div class="col-md-12  ">
                <h2 class="text-center" style="color: white;">Nuestros canales de venta</h2>
                <div class="h-100 py-5 shadow ">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3 center bg-white rounded pt-4 pb-4 mr-4">
                            <div class="h1 text-primary text-center"><i class="fa fa-globe text-orange"></i></div>
                            <h2 class="h5 mt-4 text-center">Compra por nuestra web</h2>
                            <center><a href="#" class="text-dark text-decoration-none">www.titan.pe</a></center>
                        </div>
                        <div class="col-md-3 center bg-white rounded pt-4 pb-4 mr-4">
                            <div class="h1 text-primary text-center"><i class="fab fa-whatsapp text-orange"></i></div>
                            <h2 class="h5 mt-4 text-center">Compra por WhatsApp</h2>
                            <center><a href="#" class="text-dark text-decoration-none">943 212 297</a></center>
                        </div>
                        <div class="col-md-3 center bg-white rounded pt-4 pb-4">
                            <div class="h1 text-primary text-center"><i class="fas fa-shopping-cart text-orange"></i></div>
                            <h2 class="h5 mt-4 text-center">Compras en nuestra tienda fisica</h2>
                            <center><a href="#" class="text-dark text-decoration-none">Lunes a Domingo de 8:00 am a 6:00pm </a></center>
                        </div>
                    </div>


                </div>
            </div>
            <br>
            <br>
            <div class="col-md-12 ">
                <h2 class="text-center " style="color: white;">Nuestros canales de atención</h2>
                <div class="h-100 py-5 shadow">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3 center bg-white rounded pt-4 pb-4 mr-4">
                            <div class="h1 text-primary text-center "><i class="fab fa-facebook-messenger text-orange"></i></div>
                            <h2 class="h5 mt-4 text-center">Chatea con nostros</h2>
                            <center> <a href="" class="text-dark text-decoration-none">Encuentranos como Fierros Y Aceros TITÁN </a></center>
                        </div>
                        <div class="col-md-3 center bg-white rounded pt-4 pb-4 mr-4">
                            <div class="h1 text-primary text-center"><i class="fas fa-envelope text-orange"></i></div>
                            <h2 class="h5 mt-4 text-center">Escríbenos</h2>
                            <center> <a href="" class="text-dark text-decoration-none">A nuestro correo electrónico fierrosyacerostitan@outlook.com</a></center>
                        </div>
                        <div class="col-md-3 center bg-white rounded pt-4 pb-4">
                            <div class="h1 text-primary text-center"><i class="fa fa-phone text-orange"></i></div>
                            <h2 class="h5 mt-4 text-center">Consultas por teléfono</h2>
                            <center> <a href="" class="text-dark text-decoration-none">Lunes a Domingo de 8:00 am a 6:00 pm - 932 566 922</a></center>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Start Contact -->

        <div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div id="map" style="width: 100%; height: 100%; min-height: 600px"></div>
                </div>

            </div>
        </div>
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