<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <title>TITAN</title>
    <!-- librerias -->
    <!-- <link rel="stylesheet" href="assets/css/templatemo.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/foodhut.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <!-- Preloader -->
    <!-- Carga del logo en la pantalla principal -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img src="assets/img/logo_titan1.png" class="brand-image img-elevation-3" style="opacity: .8">
    </div>

    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tienda.php">TIENDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nosotros.php">NOSOTROS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">CONTACTO</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/img/logo_titan1.png" class="brand-img" alt="">
                <span class="brand-txt">
                    <img src="assets/img/logo_titan_oficial.png" alt="" style="width: 100px; height: 60px;">
                </span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item mr-2  mb-3">
                    <div class="nav-icon position-relative text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <div class="dropdown">
                            <div class="input-group" style="border-radius: 20px;">
                                <input type="text" name="buscar" class="form-control border-0" id="dropdownInput" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon3" oninput="toggleDropdown()" style="font-size: 14px; padding: 0.375rem 0.75rem;">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="button-addon3" style="background-color: orangered;"><i class="fas fa-search" style="color: white;"></i></span>
                                </div>
                            </div>



                            <ul class="dropdown-menu w-100 z-index-1000 dropdown-menu-end" id="dropdownMenu">
                                <!-- SE MUESTRAN LOS ARCHIVOS QUE SE BUSCAN -->
                            </ul>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <a href="components.html" class=" nav-link btn ml-xl-4" style="background-color: orangered; color: white; ">
                        <i class="fas fa-sign-in-alt"></i> INICIAR SESION
                    </a>

                </li>
            </ul>
        </div>
    </nav>
    <!-- ./Navbar -->

    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <img src="assets/img/logo_titan_oficial.png" style="width:700px;" alt="">

            <a class="nav-link btn ml-xl-4 " style=" background-color: orangered; color: white;font-weight: bold;" href="tienda.php">VER PRODUCTOS</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 class="section-title mb-5">MEJORES PRODUCTOS A MEJOR PRECIO</h1>
        </div>
    </header>
    <!-- ./header -->
    <br>
    <!-- CARRUSEL DE PRODUCTOS -->

    <div class="container-fluid wow fadeIn bg-light text-dark has-height-md middle-items ">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicadores -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Contenido del carrusel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="vermasproductos.php?id=1">
                        <img src="assets/img/publicidad/publicidad1.png" alt="Slide 1" class="d-block w-100">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="vermasproductos.php?id=2">
                        <img src="assets/img/publicidad/publicidad2.png" alt="Slide 2" class="d-block w-100">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="vermasproductos.php?id=3">
                        <img src="assets/img/publicidad/publicidad1.png" alt="Slide 3" class="d-block w-100">
                    </a>
                </div>
            </div>

            <!-- Controles del carrusel -->
            <a class="carousel-control-prev " href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Seccion de calcular  -->
    <div class="container-fluid has-bg-overlay text-center text-light pb-4 middle-items" id="book-table">
        <div class="">
            <h4 class="section-title  mb-3 mt-3">CALCULAR </h4>
            <div class="row mb-3">
                <div class="col-sm-6 col-md-3 col-xs-12">
                    <input type="email" id="booktable" class="form-control form-control-lg custom-form-control " placeholder="EMAIL">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12">
                    <input type="number" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="NUMBER OF GUESTS" max="20" min="0">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12">
                    <input type="time" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="TIME">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12">
                    <input type="date" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="DATE">
                </div>

            </div>
            <!-- <input type="submit" value="Calcular" class="form-control btn btn-success"> -->
        </div>
    </div>
    <!-- ./Seccion de calcular  -->

    <!-- Categorias -->
    <div id="gallary" class="text-center has-bg-overlay text-light  middle-items wow fadeIn">
        <h4 class="section-title ">NUESTRAS CATEGORIAS</h4>
    </div>

    <!-- carrusel de categorias -->
    <div class="container-fluid wow fadeIn has-bg-overlay text-dark has-height-md middle-items">
        <div id="carouselProductos" class="carousel slide justify-content-center" data-ride="carousel">
            <!-- Indicadores -->
            <ol class="carousel-indicators">
            </ol>
            <!-- Contenido del carrusel -->
            <div class="carousel-inner row ">
                <!-- Los productos se agregan dinámicamente aquí -->
            </div>
            <!-- Flecha izquierda -->
            <a class="carousel-control-prev" href="#carouselProductos" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <!-- Flecha derecha -->
            <a class="carousel-control-next" href="#carouselProductos" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--  Productos mas vendidos  -->
    <div id="gallary" class="text-center has-bg-overlay text-light has-height-sm middle-items wow fadeIn">
        <h4 class="section-title">PRODUCTOS MAS VENDIDOS</h4>
    </div>
    <div class="gallary row has-bg-overlay justify-content-center" id="masVendidos">
    </div>
    <!--  Productos mas vendidos  -->
    <!-- CONTACTANOS Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-sm middle-items" id="calcular" style="background-image:url(assets/img/calcular.jpg)">
        <div class="container-fluid">
            <h4 class="section-title">CONTACTANOS</h4>
            <form>
                <div class="row mb-6">
                    <div class="col-sm-3 col-md-3 col-xs-12 my-1">
                        <input type="text" class="form-control" id="nombres" placeholder="Nombres">
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-12 my-1">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-12 my-1">
                        <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-12 my-1">
                        <input id="contactanos" type="submit" value="Contactarse" class="form-control btn" style="background-color: orange; color: white;">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- page whatsapp  -->
    <?php include 'whatsapp.php' ?>
    <!-- end of page footer -->
    <!-- page footer  -->
    <?php include 'assets/views/footer.php' ?>
    <!-- end of page footer -->

    <!-- core  -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <!-- google maps -->


    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>
    <script src="vista/js/productos.js"></script>
    <script src="vista/js/contactanos.js"></script>
    <script src="vista/js/busquedaProductos.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>
    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>
</body>

</html>
<script>
    // Una vez que todos los recursos de la página hayan terminado de cargar
    window.addEventListener('load', function() {
        // Agregar un retraso de 3 segundos
        setTimeout(function() {
            // Ocultar el preloader
            $(".preloader").fadeOut("slow", function() {
                // Una vez que el preloader se ha ocultado completamente, mostrar el contenido de la página
                $("#main-content").fadeIn("slow");
            });
        }, 2000); // Tiempo en milisegundos (3 segundos)
    });
</script>