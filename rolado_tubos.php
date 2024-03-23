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
                <h2 class="text-white">ROLADO DE TUBOS </h2>
                <hr style="border-top: 2px solid orangered; width: 50%;">
            </center>
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-stretch">
                        <div class="card text-dark" style="border-radius: 10px; background-color: #f8f9fa;">
                            <div class="card-body">
                                <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                    En Fierros y Aceros Titán ofrecemos un servicio de rolado de tubos con la máxima precisión y calidad para satisfacer las necesidades de nuestros clientes. Nuestro equipo altamente calificado utiliza tecnología de vanguardia para garantizar curvas perfectas en planchas y tubos, cumpliendo con los estándares más exigentes de la industria.
                                </p>
                                <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                    Contamos con la experiencia y el compromiso necesarios para realizar los proyectos de rolado de tubos con eficiencia y rapidez. Nuestro enfoque en la calidad nos permite ofrecer resultados excepcionales en cada trabajo, asegurando la plena satisfacción de nuestros clientes.
                                </p>
                                <p class="h5" style="color:black; text-align: justify; margin-bottom: 20px;">
                                    En Fierros y Aceros Titán, valoramos la importancia de la precisión y la excelencia en cada proyecto. Confíe en nosotros para obtener las curvas más precisas y la más alta calidad en rolado de tubos.
                                </p>
                                <p class="h5" style="color:black; text-align: justify;">
                                    ¡Contacte con nosotros hoy mismo y descubra cómo podemos ayudarle con sus proyectos estructurales en acero!
                                </p>
                                <div style="color:black; background-color: #ffffff; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                                    <hr>
                                    <h6 style="color: #007bff;">Características y Beneficios:</h6>
                                    <ul style="list-style-type: none; padding-left: 0;">
                                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Curvas perfectas en planchas y tubos</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Tecnología de vanguardia</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Eficiencia y rapidez en los proyectos</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Resultados excepcionales garantizados</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Satisfacción del cliente asegurada</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center align-items-center bg-white">
                        <div class="img-fluid">
                            <img src="assets/img/servicios/rolado_tubos.jpg" style="height: 500px;" alt="">
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