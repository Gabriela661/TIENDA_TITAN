<?php
// Inicia la sesión
session_start();

// Si no hay un ID de usuario en la sesión, genera uno nuevo
$_SESSION['user_id'] = 1;
$user_id =
    $_SESSION['user_id'];



include './assets/views/navbar.php';

?>
<?php
if (isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];
} else {
    $id_producto = ""; // Puedes establecer un valor predeterminado si el parámetro no está presente
}
?>

<link rel="stylesheet" href="assets/css/adminlte.min.css">
<link rel="stylesheet" href="assets/css/stilos.css">

<body>
    <!-- Input oculto para asignar el id del usuario-->
    <input id="id_usuario" type="hidden" value="<?php echo $user_id ?>">
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
                        <label class=" ml-3 h3" id="subtotal" name="subtotal"></label>
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="modal-footer d-flex justify-content-center ">
                    <div class="row col-12">
                        <div class="col-6 col-md-6 col-lg-6">
                            <a id="comprar" href="pagoProductos.php" type="button" class="btn btn-warning btn-block">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Finalizar la Compra
                            </a>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <button id="btnLimpiarCarrito" class="btn btn-danger btn-block">
                                <i class="fa-solid fa-trash-can"></i> Limpiar el Carrito
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------fin de tubos----------------------------- -->
    <!-- Open Content -->

    <section class="bg-light">
        <div class="container pb-5">
            <input id="id_producto" class="d-none" type="text" value="<?php echo $id_producto ?>">
            <div class="row" id="detalle_producto">

            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Close Content -->

    <!-- Start Article -->

    <!-- End Article -->


    <!-- Start Footer -->
    <?php include 'assets/views/footer.php' ?>
    <!-- End Footer -->



    <script src="vista/js/productos.js"></script>
    <script src="vista/js/detalleProducto.js"></script>
    <script src="vista/js/carrito.js"></script>
    <!-- End Slider Script -->
    <!-- Incluye jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/adminlte.min.js"></script>

</body>

</html>