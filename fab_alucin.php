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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">


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
                <h2 class="text-white" style="font-family: 'Titan One', sans-serif;">FABRICACION DE ALUZIN</h2>


                <hr style="border-top: 2px solid orangered; width: 50%;">
            </center>
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-stretch">
                        <div class="text-white" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; height: 100%;">
                            <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                En Titan, ofrecemos la fabricación de aluzinc curvo o recto tecnología de vanguardia para satisfacer las necesidades más exigentes en la industria metalúrgica. Nuestro equipo de fabricación de aluzinc utiliza procesos avanzados y está respaldado por profesionales experimentados para ofrecer productos de alta calidad y rendimiento en una amplia variedad de aplicaciones.
                            </p>
                            <div style="color:black; background-color: #ffffff; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                                <h6 style="color: #007bff;">Características y Beneficios:</h6>
                                <ul style="list-style-type: none; padding-left: 0;">
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Durabilidad y Resistencia: El aluzinc ofrece una excelente resistencia a la corrosión y a los daños causados por la intemperie, lo que garantiza una vida útil prolongada y un rendimiento óptimo en diversas condiciones ambientales.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Versatilidad: Con su versatilidad en aplicaciones de revestimiento y construcción, el aluzinc es ideal para una amplia gama de proyectos, desde edificios industriales y comerciales hasta estructuras residenciales y agrícolas.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Eficiencia Energética: Gracias a su capacidad para reflejar el calor y la luz solar, el aluzinc ayuda a mantener un ambiente interior fresco durante el verano y reduce la necesidad de refrigeración, lo que contribuye a la eficiencia energética y ahorro de costos.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Sostenibilidad: El aluzinc es un material reciclable y respetuoso con el medio ambiente, lo que lo convierte en una opción eco-amigable para proyectos de construcción y fabricación que buscan minimizar su impacto ambiental.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Facilidad de Instalación: Con su ligereza y flexibilidad, el aluzinc es fácil de transportar, manipular e instalar, lo que reduce los tiempos de construcción y los costos asociados.</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-center bg-white">

                        <iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/reel/1773848133055564" width="400" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                    </div>
                </div>

            </div>
        </section>
        <center>
            <section class="mb-4">
                <h2 class="text-white">COTIZAR</h2>
                <hr style="border-top: 2px solid orangered; width: 50%;">
                <div>
                    <a href="https://api.whatsapp.com/send?phone=51943212297&text=Hola,%20estoy%20interesado%20en%20obtener%20una%20cotización%20para:." target="_blank" class="btn btn-secondary btn-lg mr-3" style="background-color: orangered;">
                        <i class="fab fa-whatsapp"></i> WhatsApp
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