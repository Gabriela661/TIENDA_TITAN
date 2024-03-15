<?php
// Inicia la sesión
session_start();

// Verifica si ya existe un ID de usuario en la sesión
if (!isset($_SESSION['user_id'])) {
    // Si no hay un ID de usuario en la sesión, genera uno nuevo
    $_SESSION['user_id'] = uniqid();
}

// Obtiene el ID de usuario de la sesión
$user_id = $_SESSION['user_id'];

// Muestra el ID de usuario
//echo "ID de usuario: " . $user_id;
include './assets/views/navbar.php'
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript de Bootstrap (requiere jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="assets/css/adminlte.min.css">

<!-- SE OBTIENE EL ID DE LA CATEGORIA SI ES QUE ELEGIO ALGUNA CATEGORIA -->
<?php
if (isset($_GET['id_categoria'])) {
    $idCategoria = $_GET['id_categoria'];
} else {
    $idCategoria = "";
}
?>

<body>
    <!-- Input oculto para asignar el id del usuario-->
    <input id_="id_usuario" class="d-none" type="text" value="1">
    <!-- Modal del carrito de compras -->

    <!--./Detalle de la navegacion-->

    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Detalle Facturación</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fecha_emision">Fecha de emisión:</label>
                                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" placeholder="Fecha de emisión" value="<?php echo date('Y-m-d'); ?>" readonly required>
                                </div>
                                <?php
                                date_default_timezone_set('America/Lima'); // Establecer el huso horario de Perú
                                ?>

                                <div class="col-md-6">
                                    <label for="fecha_vencimiento">Fecha de vencimiento:</label>
                                    <?php
                                    // Calcular la fecha de vencimiento sumando 30 días a la fecha de emisión
                                    $fecha_emision = date('Y-m-d'); // Obtener la fecha de emisión actual
                                    $fecha_vencimiento = date('Y-m-d', strtotime($fecha_emision . ' + 30 days')); // Sumar 30 días a la fecha de emisión
                                    ?>
                                    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento" value="<?php echo $fecha_vencimiento; ?>" readonly required>
                                </div>
                                <div class="col-md-12">
                                    <label for="Razon_social">Razon social:</label>
                                    <input class="form-control" id="razon_social" name="razon_social" placeholder="Nombre de la Empresa" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="ruc">RUC:</label>
                                    <span id="ruc_info" class="text-muted">El ruc empieza por 10 o 20</span>
                                    <input type="text" class="form-control" id="ruc" name="ruc" placeholder="RUC" maxlength="11" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="direccion">Dirección del cliente:</label>
                                    <input class="form-control" id="direccion" name="direccion" placeholder="Dirección de la Empresa" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="telefono">Teléfono:</label>
                                    <input class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                                </div>
                                <div class="d-none col-md-12">
                                    <label for="tipo_moneda">Tipo de Moneda:</label>
                                    <select class="form-control" id="tipo_moneda" name="tipo_moneda" required>
                                        <option value="SOL">Soles peruanos (PEN)</option>
                                        <option value="USD">Dólares estadounidenses (USD)</option>
                                        <option value="EUR">Euros (EUR)</option>
                                    </select>
                                </div>
                                <div class="d-none col-md-12">
                                    <label for="obs">Observaciones:</label>
                                    <input class="form-control" id="observaciones" name="observaciones" placeholder="observaciones" required>
                                </div>
                                <div class="d-none col-md-12">
                                    <label for="producto_json">Producto JSON:</label>
                                    <textarea id="producto_json" name="producto_json" rows="4" cols="50"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3>Tu pedido</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal S/</th>
                                    </tr>
                                </thead>
                                <tbody id="productos_carrito">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Total S/</th>
                                        <th><label for="totalCompra" id="totalCompra"></label></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">


                            <div class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Medios de pago</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Modo de pago Yape -->
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <input type="checkbox" id="imagen" name="imagen" onclick="image()">
                                                <label>Pago con Yape</label>
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                <div id='imagencargando' class="w-50">
                                                    <a class="brand-link">
                                                        <img src="assets/img/tienda/Yape.jpeg" class="brand-image img-elevation-3 img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modo de pago Plin -->
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <input type="checkbox" id="imagen1" name="imagen" onclick="image1()">
                                                <label>Pago con Plin</label>
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                <div id='imagencargandoplin' class="w-50">
                                                    <a class="brand-link">
                                                        <img src="assets/img/tienda/Plin.jpeg" class="brand-image img-elevation-3 img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Proceso de verificación del pago</h3>
                                    </div>
                                    <div class="card-body">
                                        <button id="notificar_pago" type="button" class="btn btn-warning btn-lg btn-block">Notificar el pago realizado</button>
                                    </div>
                                    <div class="card-body" id="codigo_confirmacion" style="display: none;">
                                        <input type="text" maxlength="6" id="codigo_input" class="form-control" placeholder="Ingrese el código de 6 digitos">
                                        <button id="confirmar_pago" type="button" class="btn btn-primary btn-lg  mt-3 btn-block">Verificar Codigo</button>
                                    </div>
                                </div>

                    <!-- FIN Boton pedido -->
                </div>
            </div>
        </div>
    </section>


    <div id="ObtenerResultadosMC"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Contenedor del PDF -->
    <div id="ObtenerResultadosMC"></div>
    <!-- ./Contenedor del PDF -->
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

    <script src="vista/js/busquedaProductos.js"></script>
    <script src="vista/js/pagoProductos.js"></script>
    <script src="vista/js/imagen.js"></script>

</body>

</html>