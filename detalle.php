<?php include './assets/views/navbar.php';

?>
<?php
if (isset($_GET['id_categoria'])) {
    $idCategoria = $_GET['id_categoria'];
} else {
    $idCategoria = ""; // Puedes establecer un valor predeterminado si el parámetro no está presente
}
?>

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
    <?php include 'footer.php' ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el identificador del producto de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const productoID = urlParams.get('producto');
            console.log(productoID)

            // Ocultar todas las secciones de productos
            const seccionesProductos = document.querySelectorAll('.container[id^="producto_"]');
            seccionesProductos.forEach(seccion => {
                seccion.style.display = 'none';
            });

            // Mostrar solo la sección correspondiente al producto indicado en la URL
            const productoMostrar = document.getElementById(productoID);
            if (productoMostrar) {
                productoMostrar.style.display = 'block';
            } else {
                console.error('El producto especificado no existe.');
            }
        });
    </script>
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <script src="vista/js/productos.js"></script>
    <!-- End Slider Script -->

</body>

</html>