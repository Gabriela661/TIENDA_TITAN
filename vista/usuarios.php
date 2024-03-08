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
                  <label for="nombre_usuario">Nombre</label>
                  <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombres" required>
                </div>
                <div class="form-group">
                  <label for="apellidos_usuario">Apellidos</label>
                  <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellidos" required>
                </div>
                <div class="form-group">
                  <label for="dni_usuario">Documento Nacional de Identidad</label>
                  <input type="text" class="form-control" id="dni_usuario" name="dni_usuario" placeholder="DNI" required maxlength="8">
                </div>
                <div class="form-group">
                  <label for="telefono_usuario">Número de teléfono</label>
                  <input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" placeholder="Número de teléfono" required maxlength="9">
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
                  <label for="direccion_usuario">Direccion</label>
                  <input type="text" class="form-control" id="direccion_usuario" name="direccion_usuario" placeholder="Direccion" required>
                </div>
                <div class="form-group">
                  <label for="foto_usuario">Fotografia del Usuario</label>
                  <br>
                  <input type="file" name="foto_usuario" id="foto_usuario" required>
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
                  <label for="dni_usuario">Documento Nacional de Identidad</label>
                  <input type="number" class="form-control" id="dni_usuarioe" name="dni_usuarioe" placeholder="DNI">
                </div>
                <div class="form-group">
                  <label for="telefono_usuario"> Numero de telefono </label>
                  <input type="number" class="form-control" id="telefono_usuarioe" name="telefono_usuarioe" placeholder="Numero de telefono">
                </div>
                <div class="form-group">
                  <label for="correo_electronico_usuario">Correo Electronico</label>
                  <input type="text" class="form-control" id="correo_electronico_usuarioe" name="correo_electronico_usuarioe" placeholder="Correo Electronico">
                </div>
                <div class="form-group">
                  <label for="direccion_usuario">Direccion</label>
                  <input type="text" class="form-control" id="direccion_usuarioe" name="direccion_usuarioe" placeholder="Direccion">
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
              <button type="button" class="btn btn-info ml-3" data-toggle="modal" data-target="#crearUsuario">
                Nuevo Usuario</button></h1>
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
                <!-- Tabla del personal -->
                <div class="active tab-pane btn-personal" id="personal">
                  <div class="timeline timeline-inverse">
                    <div class="card">
                      <div class="card-header">Personal</div>
                      <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>N°</th>
                              <th>Nombres Personal</th>
                              <th>Apellidos</th>
                              <th>DNI</th>
                              <th>Telefono</th>
                              <th>Correo Electronico</th>
                              <th>Direccion</th>
                              <th>Foto</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                            </tr>
                          </thead>
                          <tbody id="listar_personal">

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Tabla de clientes -->
                <div class="tab-pane btn-cliente" id="cliente">
                  <div class="card">
                    <div class="card-header">Clientes</div>
                    <div class="card-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>N°</th>
                            <th>Nombres Cliente</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Telefono</th>
                            <th>Correo Electronico</th>
                            <th>Direccion</th>
                            <th>Foto</th>
                            <?php if ($_SESSION['rol_usuario'] == 1) {
                            ?>
                              <th>Editar</th>
                              <th>Eliminar</th>
                            <?php
                            } ?>
                          </tr>
                        </thead>
                        <tbody id="listar_cliente">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- J query -->
</div>