<?php include './assets/views/navbar.php' ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<?php
if (isset($_GET['id_categoria'])) {
    $idCategoria = $_GET['id_categoria'];
} else {
    $idCategoria = ""; // Puedes establecer un valor predeterminado si el parámetro no está presente
}
?>

<body>

    <!-- Modal del carrito de compras -->

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
                        <label class=" ml-3 h3" id="subtotal" name="subtotal"></label>
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="modal-footer d-flex justify-content-center ">
                    <div class="col-12 col-md-4 col-lg-5">
                        <a id="comprar" href="datos_usuario.php" type="button" class="btn  btn-warning btn-block">
                            Finalizar Compra
                        </a>
                    </div>
                    <div class="col-12 col-md-4 col-lg-5">
                        <a href="pagoProforma.php" class="btn  btn-info btn-block">Generar Proforma</a>
                    </div>
                    <div class="col-12 col-md-4 col-lg-5">
                        <button id="btnResetearCarrito" class="btn  btn-danger btn-block">Limpiar Carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Modal del carrito de compras -->
    <!-- Menu de tienda -->
    <div class="encuadre py-4">
        <div class="row">
            <div class="col-lg-2">
                <img src="assets/img/CATEGORIAS (1) (1).png">
                <br><br>
                <ul id="categoriaMenu" class="list-unstyled templatemo-accordion">
                </ul>
            </div>
            <!-- Fin menu tienda -->
            <!-- Productos -->
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">

                        </ul>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="row" id="productos_tienda">

                </div>
                <div div="row">
                    <input id="idCategoria" class="d-none" type="text" value="<?php echo $idCategoria ?>">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Fin productos -->

    <a href="https://api.whatsapp.com/send?phone=51916232342&text=Hola!%20Estoy%20interesado%20en%20comprar%20productos%20de%20la%20categor%C3%ADa%20Perfiles%20met%C3%A1licos%20%C2%BFPodr%C3%ADas%20asistirme?" class="btnchat" target="_blank">
        <i class="fab fa-whatsapp my-btnchat "></i>
    </a>


    <!-- page whatsapp  -->
    <?php include 'whatsapp.php' ?>
    <!-- Start Footer -->
    <?php include 'assets/views/footer.php' ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <script src="vista/js/productos.js"></script>
    <script src="vista/js/busquedaProductos.js"></script>
    <script src="vista/js/carrito.js"></script>


</body>

</html>