<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) {
?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  </head>

  <?php
  include_once "assets/views/nav.php";
  ?>

  <body>
    <div class="wrapper">
      <!-- inicio Modal  crear usuario-->
      <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
        <div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="#crearUsuario" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #d1d5dd; color: black;">
              <div class="modal-body">
                <form id="form_usuario" class="m-0 p-0" method="POST">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombres" required>
                          <label class="form-label" for="nombre_usuario">Nombres</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellidos" required>
                          <label class="form-label" for="apellido_usuario">Apellidos</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="email" class="form-control" id="correo_electronico_usuario" name="correo_electronico_usuario" placeholder="Correo" required>
                          <label for="correo_electronico_usuario">Correo Electrónico</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Contraseña" required>
                          <label for="password_usuario">Contraseña</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="rol_usuario">Tipo de Usuario</label>
                      <select type="number" class="form-control" id="rol_usuario" name="rol_usuario" placeholder="Tipo Usuario">
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="foto_usuario">Fotografia del Usuario</label>
                      <br>
                      <input type="file" name="foto_usuario" id="foto_usuario">
                      <center>
                        <div id="imagen_preview" style="margin-top: 10px;" class="img-thumbnail"></div>
                      </center>
                    </div>
                    <div class="pt-1 mb-2">
                      <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--final  Modal  crear usuario-->
      <?php } ?>
      <!-- inicio Modal  crear cliente-->
      <div class="modal fade" id="crearCliente" tabindex="-1" role="dialog" aria-labelledby="#crearCliente" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #d1d5dd; color: black;">
            <div class="modal-body">
              <form id="form_cliente" class="m-0 p-0" method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombres" required>
                        <label for="nombre_cliente">Nombres</label>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Apellidos" required>
                        <label for="apellido_cliente">Apellidos</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="correo_electronico_cliente" name="correo_electronico_cliente" placeholder="Correo Electrónico">
                    <label for="correo_electronico_cliente">Correo Electrónico</label>
                  </div>

                  <div class="form-group">
                    <input type="number" class="form-control" id="contacto_cliente" name="contacto_cliente" placeholder="contacto_cliente">
                    <label for="contacto_cliente">Contacto</label>
                  </div>
                  <div class="pt-1 mb-2">
                    <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!--final  Modal  crear cliente-->

      <!-- inicio Modal  editar cliente-->
      <div class="modal fade" id="editar_cliente" tabindex="-1" role="dialog" aria-labelledby="#editar_cliente" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #d1d5dd; color: black;">
            <div class="modal-body">
              <form id="form_cliente_editar" class="m-0 p-0" method="POST">
                <div class="card-body">
                  <div class=" d-none form-group">
                    <input type="text" class="form-control" id="id_clientee">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="nombre_clientee" name="nombre_clientee" placeholder="Nombres">
                    <label for="nombre_clientee">Nombres</label>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="apellido_clientee" name="apellido_clientee" placeholder="Apellidos">
                    <label for="apellido_clientee">Apellidos</label>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="correo_clientee" name="correo_clientee" placeholder="Correo Electronico">
                    <label for="correo_clientee">Correo Electronico</label>
                  </div>
                  <div class="pt-1 mb-1">
                    <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>
        </div>
      </div>

      <!--final  Modal  editar cliente-->

      <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
        <!-- inicio Modal  editar usuario-->
        <div class="modal fade" id="editar_usuario" tabindex="-1" role="dialog" aria-labelledby="#editar_usuario" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #d1d5dd; color: black;">
              <div class="modal-body">
                <form id="form_usuario_editar" class="m-0" method="POST">
                  <div class="card-body">
                    <div class=" d-none form-group">
                      <input type="text" class="form-control" id="id_usuarioe">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="nombre_usuarioe" name="nombre_usuarioe" placeholder="Nombres">
                      <label for="nombre_usuarioe">Nombres</label>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="apellido_usuarioe" name="apellido_usuarioe" placeholder="Apellidos">
                      <label for="apellido_usuarioe">Apellidos</label>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="correo_usuarioe" name="correo_usuarioe" placeholder="Correo Electronico">
                      <label for="correo_usuarioe">Correo Electronico</label>
                    </div>
                    <div class="pt-1 mb-1">
                      <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--final  Modal  editar usuario-->
      <?php } ?>



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="font-family: 'Open Sans', sans-serif;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h4><i class="fas fa-users"></i> <b>Lista de Usuarios</b></h4>
                <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                  <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#crearUsuario">
                    Nuevo Usuario</button></h1>
                <?php } ?>
                <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#crearCliente">
                  Nuevo Cliente</button></h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- contenedor de usuarios -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <!-- botones para cambiar entre personal y clientes -->
                <ul class="nav nav-pills">
                  <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                    <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal</a></li>
                  <?php } ?>
                  <li class="nav-item"><a class="nav-link <?php if ($_SESSION['id_rol'] == 4) { echo 'active';}?>" href="#cliente" data-toggle="tab">Clientes</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                    <div class="active tab-pane btn-personal" id="personal">
                      <div class="timeline timeline-inverse">
                        <div class="card">
                          <!-- Tabla del personal -->
                          <div class="card-body table-responsive">
                            <!--                         <div class="d-flex justify-content-between mb-2 align-items-center">
                          <div>
                            <h5>Mostrar/ocultar columnas:</h5>
                            <a class="toggle-visU btn btn-success" data-column="0">N°</a>
                            <a class="toggle-visU btn btn-success" data-column="1">Nombres</a>
                            <a class="toggle-visU btn btn-success" data-column="2">Apellidos</a>
                            <a class="toggle-visU btn btn-success" data-column="3">Correo</a>
                            <a class="toggle-visU btn btn-success" data-column="4">Rol</a>
                            <a class="toggle-visU btn btn-success" data-column="5">Foto</a>
                            <a class="toggle-visU btn btn-success" data-column="6">Editar</a>
                            <a class="toggle-visU btn btn-success" data-column="7">Eliminar</a>
                          </div>
                          <div><a type="button" class="btn btn-danger ml-4" href="#" id="generatePDFUsuarios"><i class="far fa-file-pdf"></i></a></div>
                        </div> -->

                            <table id="personalTable" class="table table-bordered table-striped text-center mb-3">
                              <thead style="background-color: #e85813; color: white;">
                                <tr>
                                  <th>N°</th>
                                  <th>Nombres</th>
                                  <th>Apellidos</th>
                                  <th>Correo</th>
                                  <th>Rol</th>
                                  <th>Foto</th>
                                  <th>Editar</th>
                                  <th>Eliminar</th>
                                </tr>
                              </thead>
                              <tbody id="listar_personal">
                              </tbody>
                            </table>
                          </div>
                          <!-- ./Tabla del personal -->
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="<?php if ($_SESSION['id_rol'] == 4) { echo 'active';}?> tab-pane btn-cliente" id="cliente">
                    <div class="card">
                      <div class="card-body table-responsive">
                        <!--      <div class="d-flex justify-content-between mb-2">
                        <div>
                          <h5>Mostrar/ocultar columnas:</h5>
                          <a class="toggle-visC btn btn-success" data-column="0">N°</a>
                          <a class="toggle-visC btn btn-success" data-column="1">Nombres</a>
                          <a class="toggle-visC btn btn-success" data-column="2">Apellidos</a>
                          <a class="toggle-visC btn btn-success" data-column="3">Correo</a>
                          <a class="toggle-visC btn btn-success" data-column="4">Tipo de cliente</a>
                          <a class="toggle-visC btn btn-success" data-column="5">Editar</a>
                          <a class="toggle-visC btn btn-success" data-column="6">Eliminar</a>
                        </div>
                        <div><a type="button" class="btn btn-danger ml-4" href="#" id="generatePDFCliente"><i class="far fa-file-pdf"></i></a></div>
                      </div> -->
                        <table id="clienteTable" class="table table-bordered table-striped text-center mb-4" style="width: 100%;">
                          <thead style="background-color: #e85813; color: white;">
                            <tr>
                              <th>N°</th>
                              <th>Nombres</th>
                              <th>Apellidos</th>
                              <th>Correo Electronico</th>
                              <th>Tipo de cliente</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                            </tr>
                          </thead>
                          <tbody id="listar_clientes">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- contenedor de usuarios -->
        </section>
        <!-- /.content -->
      </div>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>

  </body>

  <script src="../vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../vista/assets/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->


  <script src="js/usuario.js"></script>
  </div>

<?php
  include_once "assets/views/footer.php";
} else {
  header('Location: ../login.php');
}
?>