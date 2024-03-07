<?php include './assets/views/navbar.php' ?>
<section class="proforma">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4><i class="fas fa-box"></i> <b>Compra</b></h4>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <!-- Contenedor de las filas -->
                    <div class="row">
                        <!-- Primera columna datos generales -->
                        <div class="col-md-6">
                            <div class="card funcion">
                                <div class="card-header">
                                    <h5>Detalle Facturación</h5>
                                </div>
                                <div class="card-body">
                                    <form id="datos_cliente">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre:</label>
                                                <input class="form-control" id="nombres_us" name="nombres_us">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Apellidos: </label>
                                                <input class="form-control" id="apellidos_us" name="apellidos_us">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Nombre de la empresa(Opcional): </label>
                                                <input class="form-control" id="nombre_empresa" name="nombre_empresa">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Pais/Región: </label>
                                                <input class="form-control" id="pais_region" name="pais_region">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Direccion de la calle: </label>
                                                <input class="form-control" id="direccion_usuario" name="direccion_usuario">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Población: </label>
                                                <input class="form-control" id="poblacion" name="poblacion">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Región/Provincia: </label>
                                                <input class="form-control" id="region_provincia" name="region_provincia">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Código postal/ZIP: </label>
                                                <input class="form-control" id="codigo_postal" name="codigo_postal">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Teléfono: </label>
                                                <input class="form-control" id="telefono" name="telefono">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Dirección de correo electrónico: </label>
                                                <input class="form-control" id="correo_electronico" name="correo_electronico">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><br>
                            <!-- Informacion adicional -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card funcion">
                                        <div class="card-header">
                                            <h5>Información Adicional</h5>
                                        </div>
                                        <div class="card-body">
                                            <label>Notas del pedido(opcional)</label>
                                            <textarea class="form-control" id="notas_pedido" name="notas_pedido" placeholder="Notas sobre tu pedido, por ejemplo, notas especiales para la entrega"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin informacion adicional -->
                        </div>

                        <!-- Segunda columna/pago-->
                        <div class="col-md-6">
                            <div class="card funcion">
                                <div class="card-header">
                                    <h5>Tu pedido</h5>
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
                                        <tbody id="generar_compra">
                                            <tr>
                                                <td>Barra de acero</td>
                                                <td>1</td>
                                                <td>250</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Total S/</th>
                                                <th><label for="" id="totalCompra"></label>250</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><br>
                            <!--Modo de pago YAPE-->
                            <div class="card none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" id="imagen" name="imagen" onclick="image()">
                                        <label>Pago con Yape</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="brand-link d-flex justify-content-center">
                                            <img src="assets/img/Captura.JPG" style="width:20px; height:20px" class="brand-image img-elevation-3">
                                        </a>
                                    </div>

                                    <div id='imagencargando'></div>
                                </div>
                                <!-- Modo de pago PLIN -->
                                <div class="row">

                                    <div class="col-md-6">
                                        <input type="checkbox" id="imagen" name="imagen" onclick="image1()">
                                        <label>Pago con Plin</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="brand-link d-flex justify-content-center">
                                            <img src="assets/img/Plin.JPG" style="width:20px; height:20px" class="brand-image img-elevation-3">
                                        </a>
                                    </div>
                                    <div id='imagencargandoplin'></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" id="imagen" name="imagen" onclick="tarjeta()">
                                        <label>Pago con Tarjeta</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="brand-link d-flex justify-content-center">
                                            <img src="assets/img/Plin.JPG" style="width:20px; height:20px" class="brand-image img-elevation-3">
                                        </a>
                                    </div>
                                    <div id="formularioTarjeta" style="display: none; padding: 20px; background-color: #f9f9f9;">
                                        <h1>nbpji</h1>
                                        <!-- Aquí va tu formulario de pago con tarjeta -->
                                        <!-- <label>Nombre en la tarjeta:</label>
    <input type="text" name="nombreTarjeta"><br>
    <label>Número de tarjeta:</label>
    <input type="text" name="numeroTarjeta"><br> -->
                                        <!-- Otros campos del formulario -->
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" id="imagen" name="imagen" onclick="">
                                        <label>Pago Efectivo</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="brand-link d-flex justify-content-center">
                                            <img src="assets/img/Plin.JPG" style="width:20px; height:20px" class="brand-image img-elevation-3">
                                        </a>
                                    </div>
                                    <div id=''></div>
                                </div>
                            </div><br>
                            <!--FIN Modo de pago-->
                            <!-- Boton pedido -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card funcion">
                                        <div class="card-header">
                                            <p>Tus datos personales se utilizarán para tu pedido, mejorar tu experiencia en esta web y otros propósitos descritos en nuestra política de privacidad.</p>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary btn-lg btn-block">Realizar el Pedido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIN Boton pedido -->
                        </div>
                    </div>
                    <!-- Fin del contenedor de las filas -->
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.control-sidebar -->
    </div>
</section>
<?php include 'assets/views/footer.php' ?>
<!-- End Footer -->

<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<script src="vista/js/imagen.js"></script>