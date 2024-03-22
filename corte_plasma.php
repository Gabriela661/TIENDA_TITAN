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
                <h2 class="text-white">CORTE EN PLASMA CNC COMPUTARIZADO</h2>
                <hr style="border-top: 2px solid orangered; width: 50%;">
            </center>
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-stretch">
                        <div class="text-white" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; height: 100%;">
                            <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                En Titan, ofrecemos un servicio de corte en plasma CNC computarizado de última generación para satisfacer las demandas de corte más exigentes en la industria metalúrgica. Nuestro equipo de corte en plasma utiliza tecnología avanzada y está respaldado por un equipo experimentado para proporcionar cortes precisos y de alta calidad en una amplia gama de materiales y espesores.
                            </p>
                            <div style="color:black; background-color: #ffffff; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                                <h6 style="color: #007bff;">Características y Beneficios:</h6>
                                <ul style="list-style-type: none; padding-left: 0;">
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Precisión y Calidad: Nuestra máquina de corte en plasma CNC garantiza cortes precisos y limpios, con una calidad de borde superior, lo que minimiza el desperdicio de material y reduce los costos de acabado.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Versatilidad: Con capacidad para cortar una variedad de materiales conductores, como acero al carbono, acero inoxidable, aluminio y cobre, nuestro servicio de corte en plasma es adecuado para una amplia gama de aplicaciones industriales.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Eficiencia y Productividad: La automatización del proceso mediante control numérico por computadora (CNC) garantiza una mayor eficiencia y productividad, reduciendo los tiempos de ciclo y aumentando la capacidad de producción.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Flexibilidad de Diseño: Aprovechando la tecnología CAD/CAM, podemos trabajar con una amplia variedad de diseños personalizados y geometrías complejas, ofreciendo flexibilidad en la creación de piezas y componentes según las especificaciones del cliente.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Entrega Rápida y Fiabilidad: Nuestro equipo de corte en plasma está capacitado para manejar proyectos de cualquier tamaño con plazos ajustados, garantizando una entrega rápida y confiable para satisfacer las necesidades de nuestros clientes.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-center bg-white">

                            <iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/FIERROSACEROSTITAN/videos/373578148397800/" width="400" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
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