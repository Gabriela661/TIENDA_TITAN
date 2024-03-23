<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <title>SERVICIOS</title>
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

        <section class="">
            <center>
                <h2 class="text-white">DOBLES DE PLANCHAS</h2>
                <hr style="border-top: 2px solid orangered; width: 50%;">
            </center>
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-stretch">
                        <div class="text-white" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; height: 100%;">
                            <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                En Titan, ofrecemos un servicio de doblado de plancha de 2.45 mts con nuestra dobladora de plancha con dados, capaz de trabajar con planchas de hasta 1/16" o 1.5mm de espesor. Contamos con maquinaria de primera calidad y personal técnico calificado para realizar el servicio de corte, doblez y rolado de planchas, cumpliendo con los más altos estándares de calidad en la industria metalúrgica.
                            </p>
                            <div style="color:black; background-color: #ffffff; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                                <h6 style="color: #007bff;">Características y Beneficios:</h6>
                                <ul style="list-style-type: none; padding-left: 0;">
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Precision y Calidad: Nuestra dobladora de plancha garantiza dobleces precisos y uniformes, asegurando una calidad de acabado óptima y minimizando el desperdicio de material.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Versatilidad: Con capacidad para trabajar con una variedad de materiales, nuestro servicio de doblado es adecuado para múltiples aplicaciones industriales.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Eficiencia y Productividad: Nuestra maquinaria de última generación garantiza una alta eficiencia en el proceso de doblado, lo que se traduce en tiempos de producción reducidos y una mayor productividad.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Flexibilidad de Diseño: Podemos trabajar con una amplia variedad de diseños y especificaciones, brindando flexibilidad para adaptarnos a las necesidades específicas de cada cliente.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Entrega Rápida y Fiabilidad: Comprometidos con la satisfacción del cliente, garantizamos una entrega rápida y confiable de los productos terminados.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-center">
                        <div class="img-fluid">
                            <img src="assets/img/servicios/dobles_planchas.jpg" style="width: 600px;" alt="">
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <center>
            <section class="mb-4">
                <h2 class="text-white">COTIZAR</h2>
                <hr style="border-top: 2px solid orangered; width: 50%;">
                <div>
                    <!-- Botón de WhatsApp -->
                    <a href="https://api.whatsapp.com/send?phone=51934890639&text=Hola,%20estoy%20interesado%20en%20obtener%20una%20cotización%20para:." target="_blank" class="btn btn-secondary btn-lg mr-3">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>

                    <!-- Botón de Messenger -->
                    <a href="https://m.me/TUNOMBREDEUSUARIO" target="_blank" class="btn btn-secondary btn-lg">
                        <i class="fab fa-facebook-messenger"></i> Messenger
                    </a>
                </div>
            </section>
        </center>




        <!-- Close Banner -->


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