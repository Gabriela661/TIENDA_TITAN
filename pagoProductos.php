<?php
// Inicia la sesión
session_start();

// Obtiene el ID de usuario de la sesión
$_SESSION['user_id'] = 1;
$user_id = $_SESSION['user_id'];
//se obtiene la categoria
if (isset($_GET['id_categoria'])) {
    $idCategoria = $_GET['id_categoria'];
} else {
    $idCategoria = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development">
    <meta name="author" content="Devcrud">
    <title>CONTACTO</title>
    <!-- librerias -->
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


    <!-- Menu de tienda -->
    <div class="has-bg-overlay middle-items wow fadeIn">
        <br>
        <br>
        <br>
        <br>
        <br>
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 mx-auto">
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
                                    <!-- Input oculto para asignar el id del usuario-->
                                    <input id="id_usuario" type="hidden" value="<?php echo $user_id ?>">
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
                                    <div tupe class=" col-md-12">
                                        <label for="obs">Metodo de pago:</label>
                                        <input class=" form-control" id="metodo" name="metodo" placeholder="Seleccione un metodo de pago y  se rellenara automaticamente esta casilla" readonly>
                                    </div>
                                    <div class="d-none col-md-12">
                                        <label for="factura">Factura:</label>
                                        <input type="number" id="numeroFactura" name="numeroFactura"></input>
                                    </div>
                                    <div class=" col-md-12 d-none">
                                        <label for="producto_json">Producto JSON:</label>
                                        <textarea id="producto_json" name="producto_json" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 mb-3">
                            <div class="card-header">
                                <h3>Tus Productos</h3>
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
                                            <td colspan="3" style="border-top: 1px solid black;"></td>
                                        </tr>
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
                    <div class="col-md-5 mx-auto">


                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Metodos de pago</h3>
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
                                    <button id="notificar_pago" type="button" class="btn btn-secondary btn-lg btn-block">Notificar el pago realizado</button>
                                </div>
                                <div class="card-body" id="codigo_confirmacion" style="display: none;">
                                    <input type="text" maxlength="6" id="codigo_input" class="form-control" placeholder="Ingrese el código de 6 dígitos">
                                    <button id="confirmar_pago" type="button" class="btn  btn-lg  mt-3 btn-block" style="background-color: orangered;">Verificar Código</button>
                                </div>

                            </div>

                            <!-- FIN Boton pedido -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenedor del PDF -->
        <div id="ObtenerResultadosMC"></div>
        <!-- ./Contenedor del PDF -->
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
    <script src="vista/js/busquedaProductos.js"></script>
    <script src="vista/js/pagoProductos.js"></script>
    <script src="vista/js/imagen.js"></script>

</body>

</html>
<!-- footer -->
<?php include 'assets/views/footer.php' ?>
<!-- end of page footer -->