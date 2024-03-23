<?php
session_start();
if ($_SESSION['id_rol'] == 1) {
?>

  <head>
    <title>Roles</title>
    <?php include_once "assets/views/nav.php"; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <div class="wrapper">

    <!-- Modal para editar -->
    <div class="modal fade" id="editarRol" tabindex="-1" role="dialog" aria-labelledby="editarRolLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #d1d5dd; color: black;">
          <div class="modal-body">
            <form id="form_editar_rol" class="m-0" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id_usuario" name="id_usuario">
                  <input type="text" class="form-control" id="nombre_user" name="nombre_user" disabled>
                  <label for="nombre_user">Nombre</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="rol_actual" name="rol_actual" disabled>
                  <label for="rol_actual">Rol Actual</label>
                </div>
                <div class="form-group">
                  <select type="number" class="form-control" id="rol_usuario" name="rol_usuario" placeholder="Rol del usuario"></select>
                  <label for="rol_usuario">Nuevo Rol</label>
                </div>
                <div class="pt-1 mb-1">
                  <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- ./Modal para editar la categoria -->

    <div class="content-wrapper" style="font-family: 'Open Sans', sans-serif;">
      <!--Detalle de la navegacion-->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h3 class="ml-2 text-xl"><strong>Administrar Roles</strong></h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) ? 'index_principal.php' : '#'; ?>">Inicio</a></li>
                <li class="breadcrumb-item active">Roles</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!--./Detalle de la navegacion-->

      <!-- Listado de categorias en una tabla -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body table-responsive">
                <table id="rolesTable" class="table table-bordered table-striped text-center mb-2">
                  <thead style="background-color: #e85813; color: white;">
                    <tr>
                      <th>N°</th>
                      <th>USUARIO</th>
                      <th>APELLIDOS</th>
                      <th>ROL</th>
                      <th>EDITAR</th>
                    </tr>
                  </thead>
                  <tbody id="roles">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ./Listado de categorias en una tabla -->
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>

  <script src="../vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Footer -->
  <script src="js/roles.js"></script>

<?php
/*   include_once "assets/views/footer.php"; */
} else {
  header('Location: ../login.php');
}
?>