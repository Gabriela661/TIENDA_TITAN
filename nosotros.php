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

        <section class=" py-2">
            <div class="container">
                <div class="row align-items-center py-1">
                    <div class="col-md-4 col-sm-12 mb-2 d-flex justify-content-center"> <!-- Añadido mb-2 y d-flex justify-content-center -->
                        <img src="assets/img/logo_titan_oficial.png" style="width:400px;" alt="About Hero">
                    </div>
                    <div class="col-md-4 text-white col-sm-12 mb-2 d-flex justify-content-center align-items-center"> <!-- Añadido mb-2 y d-flex justify-content-center align-items-center -->
                        <div class="pb-2">
                            <center>
                                <h1 class="pt-2">SOBRE NOSOTROS</h1>
                            </center>
                            <br>
                            <p class="h5 " style="text-align: justify;">
                                En Titan, somos tu socio confiable en la industria metalúrgica. Nos especializamos en brindar soluciones integrales para satisfacer las necesidades de nuestros clientes. Ofrecemos una amplia variedad de productos y servicios, incluyendo la venta de tubos y perfiles, planchas, coberturas, y una variedad de servicios especializados.
                                <br>
                                Nuestros servicios incluyen rolado de tubos y perfiles, doblez de planchas para puertas y canaletas, rolado de planchas, dobleces de codos y corte en plasma CNC computarizado. Nos comprometemos a proporcionar productos de la más alta calidad y ofrecer atención al cliente excepcional.
                                <br>
                                ¡Contáctanos hoy mismo y descubre cómo podemos ayudarte con tus proyectos en la industria metalúrgica! Titan, tu socio confiable en metalurgia.
                            </p>

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 mb-2 d-flex justify-content-center"> <!-- Añadido mb-2 y d-flex justify-content-center -->
                        <img src="assets/img/nosotros.png" style="width:400px;height:400px" alt="About Hero">
                    </div>
                </div>
            </div>
        </section>

        <!-- Close Banner -->

        <!-- Start Section -->
        <section class="container py-5">
            <div class="row text-center pt-5 pb-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1" style="color: white;">Nuestro Compromiso</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 col-lg-4 pb-5">
                    <div class="card bg-white shadow">
                        <div class="h-100 py-5 services-icon-wap">
                            <div class="h1 text-primary text-center"><i class="fa fa-star"></i></div>
                            <h2 class="h5 mt-4 text-center">Calidad</h2>
                            <p class="text-center">Nos esforzamos por ofrecer productos y servicios de la más alta calidad para satisfacer las necesidades de nuestros clientes.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 pb-5">
                    <div class="card bg-white shadow">
                        <div class="h-100 py-5 services-icon-wap">
                            <div class="h1 text-primary text-center"><i class="fa fa-money-bill"></i></div>
                            <h2 class="h5 mt-4 text-center">Precios bajos</h2>
                            <p class="text-center">Ofrecemos precios competitivos sin comprometer la calidad, para que puedas obtener los mejores productos al mejor precio.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 pb-5">
                    <div class="card bg-white shadow">
                        <div class="h-100 py-5 services-icon-wap">
                            <div class="h1 text-primary text-center"><i class="fa fa-percent"></i></div>
                            <h2 class="h5 mt-4 text-center">Ofertas</h2>
                            <p class="text-center">Mantente al tanto de nuestras promociones especiales y descuentos exclusivos para aprovechar los mejores precios en nuestros productos.</p>
                        </div>
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