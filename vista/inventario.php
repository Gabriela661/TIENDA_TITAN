<?php
session_start();
if ($_SESSION['rol_usuario'] == 1 || $_SESSION['rol_usuario'] == 2) {
?>
  <title>Inventario</title>

  <?php include_once "assets/views/nav.php"; ?>
  <div class="wrapper">

    <!-- Modal para agregar inventario-->
    <div class="modal fade" id="crearInventario" tabindex="-1" role="dialog" aria-labelledby="#crearInventario" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="#crearInventario">Registrar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_inventario" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre del Producto">
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input type="decimal" step="0.01" class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio  del Producto">
                </div>
                <div class="form-group">
                  <label for="descripcion_producto">Descripcion del Producto</label>
                  <textarea type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" placeholder="Descripcion del Producto"></textarea>
                </div>
                <div class="form-group">
                  <label for="Cantidad"> Cantidad </label>
                  <input type="decimal" step="0.0001" class="form-control" id="cantidad_producto" name="cantidad_producto" placeholder="Cantidad de Producto">
                </div>
                <div class="form-group">
                  <label for="marca">Marca del Producto</label>
                  <input type="text" class="form-control" id="marca_producto" name="marca_producto" placeholder="Marca del Producto">
                </div>
                <div class="form-group">
                  <label for="categoria">Categoria Producto</label>
                  <select type="number" class="form-control" id="categoria_producto" name="categoria_producto" placeholder="Categoria del producto"></select>
                </div>
                <div class="form-group">
                  <label for="imagen_producto">Imagen de Producto</label>
                  <br>
                  <input type="file" name="imagen_producto" id="imagen_producto">
                  <center>
                    <div id="imagen_preview" style="margin-top: 10px;" class="img-thumbnail"></div>
                  </center>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    </form>


    <!-- Modal para editar el inventario -->
    <div class="modal fade" id="editarInventario" tabindex="-1" role="dialog" aria-labelledby="editarProductoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editarProductoLabel">Editar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_editar_producto" method="POST">
              <div class="card-body">
                <div class="d-none">
                  <label for="id_editar">Id</label>
                  <input type="text" class="form-control" id="id_editar" name="id_editar" placeholder="ID del Producto">
                </div>
                <div class="form-group">
                  <label for="nombre_editar">Nombre</label>
                  <input type="text" class="form-control" id="nombre_editar" name="nombre_editar" placeholder="Nombre del Producto">
                </div>
                <div class="form-group">
                  <label for="">Precio</label>
                  <input type="decimal" step="0.01" class="form-control" id="precio_editar" name="precio_editar" placeholder="Precio del Producto">
                </div>
                <div class="form-group">
                  <label for="descripcion_producto_editar">Descripción del Producto</label>
                  <textarea type="text" class="form-control" id="descripcion_editar" name="descripcion_editar" placeholder="Descripción del Producto"></textarea>
                </div>
                <div class="form-group">
                  <label for="cantidad_editar">Cantidad</label>
                  <input type="decimal" step="0.0001" class="form-control" id="cantidad_editar" name="cantidad_editar" placeholder="Cantidad de Producto">
                </div>
                <div class="form-group">
                  <label for="marca_editar">Marca del Producto</label>
                  <input type="text" class="form-control" id="marca_editar" name="marca_editar" placeholder="Marca del Producto">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>INVENTARIO </h1>
              <div>
                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#crearInventario">
                  Registrar Producto</button>
              </div>

            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="paginaPrincipal.php">Inicio</a></li>
                <li class="breadcrumb-item active">Inventario</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <h2 class="text-center display-4">Buscar Productos</h2>
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <form action="simple-results.html">
                <div class="input-group">
                  <input id="buscar" type="search" class="form-control form-control-lg" placeholder="Ingrese el nombre del producto">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Tabla de productos -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Listado de Productos</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive"> <!-- Agrega la clase table-responsive al contenedor de la tabla -->
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>NOMBRE</th>
                          <th>MARCA</th>
                          <th>DESCRIPCION </th>
                          <th>CANTIDAD </th>
                          <th>PRECIO</th>
                          <th>IMAGEN PRODUCTO</th>
                          <th>EDITAR</th>
                          <th>ELIMINAR</th>
                        </tr>
                      </thead>
                      <tbody id="inventario">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>

    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="js/inventario.js"></script>
  <?php
  include_once "assets/views/footer.php";
} else {
  header('Location: ../login.php');
}
  ?>
  <!-- <script src="js/producto.js"></script> -->