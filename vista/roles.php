<title>Roles</title>

<?php include_once "assets/views/nav.php"; ?>
<div class="wrapper">


  <!-- Modal para editar -->
  <div class="modal fade" id="editarRol" tabindex="-1" role="dialog" aria-labelledby="editarRolLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarRolLabel">Editar Rol</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_editar_rol" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="nombre_editar">Nombre</label>
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario">
                <input type="text" class="form-control" id="nombre_user" name="nombre_user" disabled>
              </div>
              <div class="form-group">
                <label for="rol_actual">Rol Actual</label>
                <input type="text" class="form-control" id="rol_actual" name="rol_actual" disabled>
              </div>
              <div class="form-group">
                <label for="rol_usuario">Nuevo Rol</label>
                <select type="number" class="form-control" id="rol_usuario" name="rol_usuario" placeholder="Rol del usuario"></select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ./Modal para editar la categoria -->

  <div class="content-wrapper">
    <!--Detalle de la navegacion-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="ml-5">ADMINISTRAR ROLES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="paginaPrincipal.php">Inicio</a></li>
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
          <div class="col-lg-10">
            <div class="card ml-5">
              <div class="card">
                <div class="card-body table-responsive">
                  <table id="rolesTable" class="table table-bordered table-striped">
                    <thead>
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