<?php include './assets/views/navbar.php';
$title = $_GET['title'];
$price = $_GET['price'];
$brand = $_GET['brand'];
$desc = $_GET['desc'];
$img = $_GET['img'];
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
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="assets/img/<?php echo $img; ?>" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/<?php echo $img; ?>" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <!-- <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_02.jpg" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_03.jpg" alt="Product Image 3">
                                            </a>
                                        </div> -->
                                    </div>
                                </div>
                                <!--/.First slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $title; ?></h1>
                            <p class="h3 py-2"><?php echo $price; ?></p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Puntuación 4.8 | 36 Comentarios</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Categoría:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $brand; ?></strong></p>
                                </li>
                            </ul>

                            <h6>Descripción:</h6>
                            <p><?php echo $desc; ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Colores disponibles :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Blanco / Negro</strong></p>
                                </li>
                            </ul>

                            <!-- <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li>Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li>Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul> -->

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
            
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Cantidad
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                    <a class="btn btn-success text-white mt-2" href="#" data-bs-toggle="modal" data-bs-target="#modal2"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Close Content -->

    <!-- Start Article -->

    <!-- End Article -->


    <!-- Start Footer -->
    <?php include 'footer.php'?>
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

    <!-- End Slider Script -->

</body>

</html>