

  <?php include_once "assets/views/nav.php"; ?>

  <!-- LIBRERIAS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <div class="wrapper">
    <div class="content-wrapper">

      <!--Detalle de la navegacion-->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Compra</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                <li class="breadcrumb-item"><a href="paginaPrincipal.php">Inicio</a></li>
                <li class="breadcrumb-item active">Detalle de facturación</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!--./Detalle de la navegacion-->

      <section class="content">
        <div class="container-fluid">
          <form id="factura_form" action="factura.php" method="POST">
            <div class="row">

              <!-- Primera columna datos generales -->
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3>Detalle Facturación</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="fecha_emision">Fecha de emisión:</label>
                        <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" placeholder="Fecha de emisión" value="<?php echo date('Y-m-d'); ?>" readonly>
                      </div>
                      <?php
                      date_default_timezone_set('America/Lima'); // Establecer el huso horario de Perú
                      ?>

                      <div class="col-md-4">
                        <label for="hora_emision">Hora de emisión:</label>
                        <input type="time" class="form-control" id="hora_emision" name="hora_emision" placeholder="Hora de emisión" value="<?php echo date('H:i:s'); ?>" readonly>
                      </div>
                      <div class="col-md-4">
                        <label for="fecha_vencimiento">Fecha de vencimiento:</label>
                        <?php
                        // Calcular la fecha de vencimiento sumando 30 días a la fecha de emisión
                        $fecha_emision = date('Y-m-d'); // Obtener la fecha de emisión actual
                        $fecha_vencimiento = date('Y-m-d', strtotime($fecha_emision . ' + 30 days')); // Sumar 30 días a la fecha de emisión
                        ?>
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento" value="<?php echo $fecha_vencimiento; ?>" readonly>
                      </div>

                      <div class="col-md-12">
                        <label for="ruc">RUC:</label>
                        <span id="ruc_info" class="text-muted">El ruc empieza por 10 o 20</span>
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="RUC" maxlength="11" required>
                      </div>

                      <div class="col-md-12">
                        <label for="nombre_empresa">Nombre de la Empresa o persona:</label>
                        <input class="form-control" id="nombres_us" name="nombres_us" placeholder="Nombre de la Empresa">
                      </div>
                      <div class="col-md-12">
                        <label for="nombre_comercial">Nombre Comercial:</label>
                        <input class="form-control" id="nombre_comercial" name="nombre_comercial" placeholder="Nombre Comercial" required>
                      </div>
                      <div class="col-md-12">
                        <label for="pais_region">Distrito/Provincia/Departamento:</label>
                        <input class="form-control" id="pais_region" Value="Huanuco/Huanuco/Huanuco" name="pais_region" placeholder="Distrito/Provincia/Departamento" required>
                      </div>
                      <div class="col-md-12">
                        <label for="direccion_usuario">Dirección de la calle:</label>
                        <input class="form-control" id="direccion_usuario" name="direccion_usuario" placeholder="Direccion" required>
                      </div>
                      <div class="col-md-12">
                        <label for="correo_electronico">Dirección de correo electrónico:</label>
                        <input class="form-control" id="correo_electronico" name="correo_electronico" placeholder="Correo Electronico" required>
                      </div>
                      <div class="col-md-12">
                        <label for="telefono">Teléfono:</label>
                        <input class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                      </div>
                      <div class="d-none col-md-12">
                        <label for="producto_json">Producto JSON:</label>
                        <textarea id="producto_json" name="producto_json" rows="4" cols="50"></textarea>
                      </div>
                      <div class="col-md-12">
                        <label for="tipo_moneda">Tipo de Moneda:</label>
                        <select class="form-control" id="tipo_moneda" name="tipo_moneda" required>
                          <option value="PEN">Soles peruanos (PEN)</option>
                          <option value="USD">Dólares estadounidenses (USD)</option>
                          <option value="EUR">Euros (EUR)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- Segunda columna/pago-->
              <div class="col-md-6">
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
                      <tbody id="generar_compra">
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

                <!-- Boton pedido -->
                <div class="row">

                  <div class="col-md-12">

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
                                  <img src="assets/img/Yape.jpeg" class="brand-image img-elevation-3 img-fluid">
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
                                  <img src="assets/img/Plin.jpeg" class="brand-image img-elevation-3 img-fluid">
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
                          <button id="notificar_pago" type="button" class="btn btn-success btn-lg btn-block">Notificar el pago realizado</button>
                        </div>
                        <div class="card-body" id="codigo_confirmacion" style="display: none;">
                          <input type="text" maxlength="6" id="codigo_input" class="form-control" placeholder="Ingrese el código de 6 digitos">
                          <button id="confirmar_pago" type="button" class="btn btn-primary btn-lg  mt-3 btn-block">Verificar Codigo</button>
                        </div>
                      </div>
                      <div class="d-none card-body">
                        <button id="venta" type="submit" class="btn btn-warning btn-lg btn-block">Generar Factura</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- FIN Boton pedido -->
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
  <!-- Footer -->
<?php
  include_once "assets/views/footer.php";

?>

<!-- Archivos js -->
<script src="js/producto.js"></script>
<script src="js/cliente.js"></script>
<script src="js/imagen.js"></script>
<script src="js/pago_productos.js"></script>
<!-- ./Archivos js -->