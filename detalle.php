<?php
// Inicia la sesión
session_start();

// Si no hay un ID de usuario en la sesión, genera uno nuevo
$_SESSION['user_id'] = 1;
$user_id =  $_SESSION['user_id'];
//obtengo el id del producto
if (isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];
} else {
    $id_producto = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <title>DETALLE PRODUCTO</title>
    <!-- librerias -->
    <link rel="stylesheet" href="assets/css/style-prefix.css">
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



    <!-- ./Modal del carrito de compras -->
    <div id="modalCarrito" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content h-100">
                <!-- Cabecera del modal -->
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Carrito de compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                <i class="fas fa-broom"></i>Limpiar Carrito
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
        <!-- Input oculto para asignar el id del usuario-->
        <input id="id_usuario" type="hidden" value="<?php echo $user_id ?>">
        <div class="container pb-5">
            <input id="id_producto" class="d-none" type="text" value="<?php echo $id_producto ?>">
            <div class="row" id="detalle_producto">

            </div>
        </div>
        <!-- PRODUCTOS SIMILARES -->
        <div id="gallary" class="text-center  text-light  middle-items wow fadeIn ">
            <h4 class="h4 mb-4">PRODUCTOS SIMILARES</h4>
        </div>

        <!-- carrusel de productos similares -->
        <div class="container-fluid wow fadeIn  text-dark has-height-md middle-items">
            <div id="carouselProductosSimilares" class=" product-main carousel slide justify-content-center" data-ride="carousel">
                <!-- Indicadores -->
                <ol class="carousel-indicators">
                </ol>
                <!-- Contenido del carrusel -->
                <div class="carousel-inner row product-grid ">
                    <!-- Los productos se agregan dinámicamente aquí -->
                </div>
                <!-- Flecha izquierda -->
                <a class="carousel-control-prev" href="#carouselProductosSimilares" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <!-- Flecha derecha -->
                <a class="carousel-control-next" href="#carouselProductosSimilares" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- ./PRODUCTOS SIMILARES -->
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
    <script src="vista/js/detalleProducto.js"></script>
    <script src="vista/js/carrito.js"></script>

</body>

</html>
<!-- footer -->
<?php include 'assets/views/footer.php' ?>
<!-- end of page footer -->