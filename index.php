<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <title>TITAN_TIENDA</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/foodhut.css">
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>
<!-- Preloader -->

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
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
                <span class="brand-txt">TIENDA TITAN</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Preguntas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testmonial">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Buscar</a>
                </li>
                <li class="nav-item">
                    <a href="components.html" class="btn btn-primary ml-xl-4">Iniciar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">TITAN TIENDA</h1>
            <h2 class="display-4 mb-5">Mejores productos a mejores precios</h2>
            <a class="btn btn-lg btn-primary" href="tienda.php">Ver productos</a>
        </div>
    </header>
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
                        <img src="assets/img/publicidad/publicidad3.png" alt="Slide 3" class="d-block w-100">
                    </a>
                </div>
                <!-- Agregar más imágenes según sea necesario -->
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
    <div class="container-fluid has-bg-secondary text-center text-light pb-4 middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-3">Calcular</h2>
            <div class="row mb-3">
                <div class="col-sm-6 col-md-3 col-xs-12">
                    <input type="email" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="EMAIL">
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
            <a href="#" class="btn btn-lg btn-primary" id="rounded-btn">VER PDF DE RESULTADOS</a>
        </div>
    </div>

    <!-- Categorias -->
    <div id="gallary" class="text-center has-bg-overlay text-light  middle-items wow fadeIn">
        <h2 class="section-title">Nuestras Categorias</h2>
    </div>

    <!-- HTML del carrusel -->
    <div class="container-fluid wow fadeIn has-bg-overlay text-dark has-height-md middle-items">
        <div id="carouselProductos" class="carousel slide justify-content-center" data-ride="carousel">
            <!-- Indicadores -->
            <ol class="carousel-indicators">
                <!-- Los indicadores se generan dinámicamente con JavaScript -->
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
    <div id="gallary" class="text-center text-light has-height-sm middle-items wow fadeIn">
        <h2 class="section-title">Productos más vendidos</h2>
    </div>
    <div class="gallary row justify-content-center" id="masVendidos">
    </div>
    <!-- Seccion de calcular  -->
    <div class="container-fluid has-bg-overlay text-center text-light pb-4 middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-3">CONTACTENOS</h2>
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
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script> -->

    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>
    <script src="vista/js/productos.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>
    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>
</body>

</html>