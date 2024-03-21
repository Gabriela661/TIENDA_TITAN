<?php
// Inicia la sesión
session_start();

// Si no hay un ID de usuario en la sesión, genera uno nuevo
$_SESSION['user_id'] = 1;
//id_usuario
$user_id = $_SESSION['user_id'];
if (isset($_GET['id_categoria'])) {
    $idCategoria = $_GET['id_categoria'];
} else {
    $idCategoria = "";
}
//PAGINACION
// Obtener el valor de la página desde el parámetro "pagina" en la URL
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : '';
// Asignar el valor predeterminado de 1 si $pagina está vacío
$pagina = !empty($pagina) ? $pagina : 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <title>TIENDA</title>
    <!-- librerias -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/foodhut.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="stylesheet" href="assets/css/stilos.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Navbar -->
    <?php
    include_once "assets/views/navbar.php";
    ?>
    <!-- ./Navbar -->



    <!-- ./Modal del carrito de compras -->
    <div id="modalCarrito" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content h-100">
                <!-- Cabecera del modal -->
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Carrito de compras</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <div class="modal-body">
                        <div id="carrito_contenedor">

                        </div>
                    </div>
                </div>
                <!-- sub total -->
                <div class="row mb-3">
                    <div class="col">
                        <label class=" ml-3 h5" id="subtotal" name="subtotal"></label>
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="modal-footer d-flex justify-content-center ">
                    <div class="row col-12">
                        <div class="col-6 col-md-6 col-lg-5">
                            <a id="comprar" href="pagoProductos.php" type="button" class="btn btn-warning btn-block">
                                <i class="fas fa-shopping-cart"></i>
                                Comprar
                            </a>
                        </div>
                        <div class="col-6 col-md-6 col-lg-7">
                            <a id="btnLimpiarCarrito" class="btn btn-danger btn-block">
                                <i class="fas fa-broom"></i>Limpiar el Carrito
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Modal del carrito de compras -->

    <!-- Menu de tienda -->
    <div class="has-bg-overlay middle-items wow fadeIn">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Input oculto para asignar el id de la categoria para el filtrado -->
        <input id="idCategoria" class="d-none" type="text" value="<?php echo $idCategoria ?>">
        <!-- Input oculto para asignar el id del usuario-->
        <input id="id_usuario" type="hidden" value="<?php echo $user_id ?>">
        <input id="paginaSeleccionada" class="d-none" name="pagina" value="<?php echo $pagina; ?>">
        <!-- Categorias -->
        <div id="gallary" class="text-center text-light  middle-items wow fadeIn">
            <h4 class="section-title ">APROVECHA NUESTRAS OFERTAS</h4>
        </div>

        <!-- carrusel de categorias -->
        <div class="container-fluid wow fadeIn  text-dark has-height-md ">
            <div id="carouselOfertas" class="carousel slide justify-content-center" data-ride="carousel row">
                <!-- Indicadores -->
                <ol class="carousel-indicators">
                </ol>

                <!-- Contenido del carrusel -->
                <div class=" carousel-inner ">
                    <div class="product-box">
                        <div class="product-main">
                            <div class="product-grid " id="h">
                            </div>
                        </div>
                    </div>
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
        <div class="category">
            <div class="container pt-5">
                <div class="category-item-container has-scrollbar" id="categoriaMenuHeader">
                </div>
            </div>
        </div>
        <div class="product-container ">
            <div class="container">
                <div class="sidebar  has-scrollbar" data-mobile-menu>
                    <div class="sidebar-category">
                        <div class="sidebar-top">
                            <h2 class="sidebar-title">CATEGORIAS</h2>
                            <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                                <ion-icon name="close-outline"></ion-icon>
                            </button>
                        </div>
                        <!--Listado de categorias  -->
                        <ul id="categoriaMenu" class="sidebar-menu-category-list">
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-main">
                        <div class="product-grid " id="productos_tienda">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin productos -->

    <div class="has-bg-overlay pb-3" id="paginacion">

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
    <script src="vista/js/productos.js"></script>
    <script src="vista/js/contactanos.js"></script>
    <script src="vista/js/busquedaProductos.js"></script>
    <script src="vista/js/carrito.js"></script>

</body>

</html>
<!-- footer -->
<?php include 'assets/views/footer.php' ?>
<!-- end of page footer -->