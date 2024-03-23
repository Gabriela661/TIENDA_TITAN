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
                <h2 class="text-white">DOBLES DE CODOS</h2>
                <hr style="border-top: 2px solid orangered; width: 50%;">
            </center>
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-stretch">
                        <div class="text-white" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; height: 100%;">
                            <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                En Titan, ofrecemos un servicio especializado en el rolado de tubos, brindando las curvas más precisas para las planchas y tubos que necesitan nuestros clientes. Nuestro compromiso es ofrecer un servicio de calidad en la habilitación de material, asegurando estándares óptimos en cada proceso.
                            </p>
                            <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                Contamos con la tecnología más avanzada y personal altamente calificado para garantizar la precisión y rapidez en cada proyecto. Desde la selección del material hasta el acabado final, mantenemos un enfoque constante en la calidad.
                            </p>
                            <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                Nuestro servicio de rolado cubre tubos de todas las medidas. Somos especialistas en proporcionar soluciones adaptadas a las necesidades específicas de cada cliente, garantizando resultados sobresalientes en cada trabajo.
                            </p>
                            <div style="color:black; background-color: #ffffff; padding: 15px; border-radius: 5px;">
                                <h6 style="color: #007bff;">Características y Beneficios:</h6>
                                <ul style="list-style-type: none; padding-left: 0;">
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Precisión en las curvas: Nuestra tecnología y personal altamente calificado garantizan curvas precisas en cada tubo.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Rapidez en el servicio: Gracias a nuestra experiencia y eficiencia, ofrecemos un servicio rápido sin comprometer la calidad.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Adaptabilidad: Podemos manejar tubos de todas las medidas, adaptándonos a las necesidades específicas de cada proyecto.</li>
                                    <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Calidad garantizada: Mantenemos un enfoque constante en la calidad, asegurando resultados sobresalientes en cada trabajo.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-center">
                        <div class="img-fluid">
                            <img src="assets/img/servicios/rolado_planchas.jpg" style="width: 600px;" alt="">
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