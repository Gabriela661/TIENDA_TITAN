<title>Usuarios</title>
<?php
include_once "assets/views/nav.php";
?>

<body>
  <div class="wrapper">

    <!-- inicio Modal  crear usuario-->
    <div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="#crearUsuario" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="#crearUsuario">Registrar Nuevo Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_usuario" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre_usuario">Nombres</label>
                  <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombres" required>
                </div>
                <div class="form-group">
                  <label for="apellido_usuario">Apellidos</label>
                  <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellidos" required>
                </div>

                <div class="form-group">
                  <label for="correo_electronico_usuario">Correo Electrónico</label>
                  <input type="email" class="form-control" id="correo_electronico_usuario" name="correo_electronico_usuario" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group">
                  <label for="password_usuario">Contraseña</label>
                  <input type="text" class="form-control" id="password_usuario" name="password_usuario" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                  <label for="foto_usuario">Fotografia del Usuario</label>
                  <br>
                  <input type="file" name="foto_usuario" id="foto_usuario">
                  <center>
                    <div id="imagen_preview" style="margin-top: 10px;" class="img-thumbnail"></div>
                  </center>
                </div>
                <div class="form-group">
                  <label for="rol">Tipo de Usuario</label>
                  <select type="number" class="form-control" id="rol_usuario" name="rol_usuario" placeholder="Tipo Usuario">
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <!--final  Modal  crear usuario-->

    <!-- inicio Modal  crear cliente-->
    <div class="modal fade" id="crearCliente" tabindex="-1" role="dialog" aria-labelledby="#crearCliente" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="#crearCliente">Registrar Nuevo Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_cliente" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre_usuario">Nombres</label>
                  <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombres" required>
                </div>
                <div class="form-group">
                  <label for="apellido_cliente">Apellidos</label>
                  <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Apellidos" required>
                </div>

                <div class="form-group">
                  <label for="correo_electronico_cliente">Correo Electrónico</label>
                  <input type="email" class="form-control" id="correo_electronico_cliente" name="correo_electronico_cliente" placeholder="Correo Electrónico">
                </div>

                <div class="form-group">
                  <label for="contacto_cliente">Contacto</label>
                  <input type="text" class="form-control" id="contacto_cliente" name="contacto_cliente" placeholder="contacto_cliente">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <!--final  Modal  crear cliente-->

    <!-- inicio Modal  editar cliente-->
    <div class="modal fade" id="editar_cliente" tabindex="-1" role="dialog" aria-labelledby="#editar_cliente" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_cliente_editar" method="POST">
              <div class="card-body">
                <div class=" d-none form-group">
                  <input type="text" class="form-control" id="id_clientee">
                </div>
                <div class="form-group">
                  <label for="nombre_clientee">Nombres</label>
                  <input type="text" class="form-control" id="nombre_clientee" name="nombre_clientee" placeholder="Nombres">
                </div>
                <div class="form-group">
                  <label for="apellido_clientee">Apellidos</label>
                  <input type="text" class="form-control" id="apellido_clientee" name="apellido_clientee" placeholder="Apellidos">
                </div>
                <div class="form-group">
                  <label for="correo_clientee">Correo Electronico</label>
                  <input type="text" class="form-control" id="correo_clientee" name="correo_clientee" placeholder="Correo Electronico">
                </div>
              </div>
              <!-- /.card-body -->
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Guardar cambios</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <!--final  Modal  editar cliente-->

    <!-- inicio Modal  editar usuario-->
    <div class="modal fade" id="editar_usuario" tabindex="-1" role="dialog" aria-labelledby="#editar_usuario" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_usuario_editar" method="POST">
              <div class="card-body">
                <div class=" d-none form-group">
                  <input type="text" class="form-control" id="id_usuarioe">
                </div>
                <div class="form-group">
                  <label for="nombre_usuario">Nombres</label>
                  <input type="text" class="form-control" id="nombre_usuarioe" name="nombre_usuarioe" placeholder="Nombres">
                </div>
                <div class="form-group">
                  <label for="apellidos_usuario">Apellidos</label>
                  <input type="text" class="form-control" id="apellido_usuarioe" name="apellido_usuarioe" placeholder="Apellidos">
                </div>
                <div class="form-group">
                  <label for="correo_usuarioe">Correo Electronico</label>
                  <input type="text" class="form-control" id="correo_usuarioe" name="correo_usuarioe" placeholder="Correo Electronico">
                </div>
              </div>
              <!-- /.card-body -->
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Guardar cambios</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <!--final  Modal  editar usuario-->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4><i class="fas fa-users"></i> <b>Lista de Usuarios</b></h4>
              <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#crearUsuario">
                Nuevo Usuario</button></h1>
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
                <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal</a></li>
                <li class="nav-item"><a class="nav-link" href="#cliente" data-toggle="tab">Clientes</a></li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane btn-personal" id="personal">
                  <div class="timeline timeline-inverse">
                    <div class="card">
                      <!-- Tabla del personal -->
                      <div class="card-body table-responsive">
                        <div class="d-flex justify-content-between mb-2 align-items-center">
                          <div>
                            <h5>Mostrar/ocultar columnas:</h5>
                            <a class="toggle-visU btn btn-success" data-column="0">N°</a>
                            <a class="toggle-visU btn btn-success" data-column="1">Nombres</a>
                            <a class="toggle-visU btn btn-success" data-column="2">Apellidos</a>
                            <a class="toggle-visU btn btn-success" data-column="3">Correo</a>
                            <a class="toggle-vis btn btn-success" data-column="4">Rol</a>
                            <a class="toggle-visU btn btn-success" data-column="5">Foto</a>
                            <a class="toggle-visU btn btn-success" data-column="6">Editar</a>
                            <a class="toggle-visU btn btn-success" data-column="7">Eliminar</a>
                          </div>
                          <div><a type="button" class="btn btn-danger ml-4" href="#" id="generatePDFUsuarios"><i class="far fa-file-pdf"></i></a></div>
                        </div>
                        <table id="personalTable" class="table table-bordered table-striped">
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
                <div class="tab-pane btn-cliente" id="cliente">
                  <div class="card">
                    <div class="card-body table-responsive">
                      <div class="d-flex justify-content-between mb-2">
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
                      </div>
                      <table id="clienteTable" class="table table-bordered table-striped">
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