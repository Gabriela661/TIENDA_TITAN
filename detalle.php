<?php include './assets/views/navbar.php';

?>
<?php
if (isset($_GET['id_categoria'])) {
    $idCategoria = $_GET['id_categoria'];
} else {
    $idCategoria = ""; // Puedes establecer un valor predeterminado si el parámetro no está presente
}
?>
<!-- Incluye jQuery desde CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <div id="modal2" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-dialog-scrollable" style="margin-left: auto; margin-right: 0;">
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
                            <div class="row">
                                <div class="col-auto">
                                    <img src="assets/img/fierros.png" alt="" style="height: 60px; width: 60px;">
                                </div>
                                <div class="col">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <label id="" name="" class="h4">Barra de construccion SP 5/8</label>
                                        </div>
                                        <div class="col-auto">
                                            <button id="eliminarProducto" type="button" class="close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label id="cantidad" name="cantidad" class="h5">1 x S/.41.60</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div id="carrito_contenedor">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="assets/img/tubos.jpg" alt="" style="height: 60px; width: 60px;">
                                </div>
                                <div class="col">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <label id="" name="" class="h4">Tubos acero inoxidable</label>
                                        </div>
                                        <div class="col-auto">
                                            <button id="eliminarProducto" type="button" class="close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label id="cantidad" name="cantidad" class="h5">1 x S/.30.99</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pie del modal -->
                <div class="row mb-3">
                    <div class="col">
                        <!-- sub total -->
                        <label class=" ml-3 h3" id="subtotal" name="subtotal"></label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="col-6 col-md-4 col-lg-5"> <!-- Utilizamos las clases de Bootstrap para definir el ancho -->

                        <a href="proforma.php" type="button" id="boton1" class="btn btn-lg btn-warning btn-block">
                            Finalizar Compra
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-5"> <!-- Utilizamos las clases de Bootstrap para definir el ancho -->

                        <a href="detalle.php" class="btn btn-lg btn-info btn-block">salir</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------fin de tubos----------------------------- -->
    <!-- Open Content -->

    <section class="bg-light">
        <div class="container pb-5">
            <input id="id_producto" class="d-none" type="text" value="<?php echo $idCategoria ?>">
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

    <!-- End Script -->


    <script src="vista/js/productos.js"></script>
    <!-- End Slider Script -->

</body>

</html>