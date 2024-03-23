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
                <h2 class="text-white">ROLADO DE PLANCHAS</h2>
                <hr style="border-top: 2px solid orangered; width: 50%;">
            </center>
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-stretch">
                        <div class="text-white" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; height: 100%;">
                            <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                En Titan, ofrecemos un servicio especializado de rolado de planchas metálicas. Con nuestra maquinaria de alta precisión, podemos trabajar con planchas de hasta 5 mm de espesor y 2.40 m de largo. Nuestro proceso de rolado permite arquear todo tipo de láminas metálicas, logrando un radio adecuado para obtener la forma cilíndrica deseada en las piezas metálicas. Contamos con la experiencia y el conocimiento técnico necesario para garantizar resultados óptimos en cada proyecto.
                            </p>
                            <div style="color:black; background-color: #ffffff; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                                <h6 style="color: #007bff;">Características y Beneficios:</h6>
                                <ul style="list-style-type: none; padding-left: 0;">
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Especialización: Somos especialistas en el rolado de planchas metálicas, brindando soluciones adaptadas a las necesidades específicas de cada cliente.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Versatilidad: Nuestro servicio abarca todo tipo de láminas metálicas, permitiendo la creación de formas cilíndricas personalizadas.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Precisión y Calidad: Utilizando maquinaria de alta precisión, garantizamos resultados de rolado consistentes y de alta calidad.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Flexibilidad: Podemos trabajar con diferentes materiales y tamaños de planchas, adaptándonos a los requisitos específicos de cada proyecto.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Asesoramiento Técnico: Nuestro equipo técnico está disponible para brindar asesoramiento experto y garantizar la satisfacción del cliente en cada etapa del proceso.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="img-fluid">
                        <img src="assets/img/servicios/rolado_planchas.jpg" style="width: 550px;" alt="">
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