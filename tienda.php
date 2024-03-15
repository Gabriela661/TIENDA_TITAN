<?php
// Inicia la sesión
session_start();
// Verifica si ya existe un ID de usuario en la sesión
if (!isset($_SESSION['user_id'])) {
    // Si no hay un ID de usuario en la sesión, genera uno nuevo
    $_SESSION['user_id'] = rand(1, 100000);
}

// Obtiene el ID de usuario de la sesión (ya convertido a número)
//$user_id = 2;



// Muestra el ID de usuario
//echo "ID de usuario: " . $user_id;


include './assets/views/navbar.php';

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="./assets/css/style-prefix.css">
<link rel="stylesheet" href="assets/css/stilos.css">
<!--
    - google font link
  -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- SE OBTIENE EL ID DE LA CATEGORIA SI ES QUE ELEGIO ALGUNA CATEGORIA -->
<?php
if (isset($_GET['id_categoria'])) {
    $idCategoria = $_GET['id_categoria'];
} else {
    $idCategoria = "";
}
?>

<body>
    <!-- Input oculto para asignar el id de la categoria para el filtrado -->
    <input id="idCategoria" class="d-none" type="text" value="<?php echo $idCategoria ?>">
    <!-- Input oculto para asignar el id del usuario-->
    <input id_="id_usuario" class="d-none" type="text" value="<?php echo $user_id ?>">
    <!-- Modal del carrito de compras -->

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
                            <button id="btnLimpiarCarrito" data-id_usuario="<?php echo $user_id ?>" class="btn btn-danger btn-block">
                                <i class="fa-solid fa-trash-can"></i> Limpiar el Carrito
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Modal del carrito de compras -->

    <!-- Menu de tienda -->
    <div>
        <div class="category">

            <div class="container">

                <div class="category-item-container has-scrollbar" id="categoriaMenuHeader">
                </div>

            </div>

        </div>
        <!--
      - PRODUCT
    -->
        <div class="product-container">
            <div class="container">
                <!--
          - SIDEBAR
        -->

                <div class="sidebar  has-scrollbar" data-mobile-menu>

                    <div class="sidebar-category">

                        <div class="sidebar-top">
                            <h2 class="sidebar-title">Categorias</h2>

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

                        <h2 class="title">Nuestros Productos</h2>

                        <div class="product-grid" id="productos_tienda">



                        </div>

                    </div>

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


    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <script src="vista/js/productos.js"></script>
    <script src="vista/js/busquedaProductos.js"></script>
    <script src="vista/js/carrito.js"></script>

    <!--
        - custom js link
    -->
    <script src="./assets/js/script.js"></script>
    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>