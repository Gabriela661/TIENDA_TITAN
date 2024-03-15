<?php
session_start();
/* if ($_SESSION['rol_usuario'] == 1 || $_SESSION['rol_usuario'] == 2) { */
?>



<title>Inventario</title>
<?php include_once "assets/views/nav.php"; ?>

<!-- Modal crear producto -->
<div class="modal fade" id="crearInventario" tabindex="-1" role="dialog" aria-labelledby="#crearInventario" aria-hidden="true">
  <div class="modal-dialog sm:modal-sm modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="#crearInventario">Registrar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/submit" id="form_inventario" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="codigo_producto">Código</label>
                  <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" placeholder="Código del Producto">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nombre_producto">Nombre</label>
                  <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre del Producto">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="precio_producto">Precio</label>
                  <input type="decimal" step="0.01" class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio del Producto">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cantidad_producto">Cantidad</label>
                  <input type="decimal" step="0.0001" class="form-control" id="cantidad_producto" name="cantidad_producto" placeholder="Cantidad de Producto">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion_producto">Descripcion del Producto</label>
              <textarea type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" placeholder="Descripcion del Producto"></textarea>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="marca">Marca del Producto</label>
                  <input type="text" class="form-control" id="marca_producto" name="marca_producto" placeholder="Marca del Producto">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="categoria">Categoria Producto</label>
                  <select type="number" class="form-control" id="categoria_producto" name="categoria_producto" placeholder="Categoria del producto"></select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_principal_producto">Imagen principal</label>
                  <input type="file" name="imagen_principal_producto" id="imagen_principal_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview1" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen principal" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_secundaria_1_producto">Imagen secundaria 1</label>
                  <input type="file" name="imagen_secundaria_1_producto" id="imagen_secundaria_1_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview2" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen secundaria 1" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_secundaria_2_producto">Imagen secundaria 2</label>
                  <input type="file" name="imagen_secundaria_2_producto" id="imagen_secundaria_2_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview3" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen secundaria 2" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_secundaria_3_producto">Imagen secundaria 3</label>
                  <input type="file" name="imagen_secundaria_3_producto" id="imagen_secundaria_3_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview4" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen secundaria 3" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
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
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_principal_producto">Imagen principal</label>
                  <input type="file" name="imagen_principal_producto" id="imagen_principal_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview1" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen principal" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_secundaria_1_producto">Imagen secundaria 1</label>
                  <input type="file" name="imagen_secundaria_1_producto" id="imagen_secundaria_1_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview2" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen secundaria 1" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_secundaria_2_productoe">Imagen secundaria 2</label>
                  <input type="file" name="imagen_secundaria_2_productoe" id="imagen_secundaria_2_productoe" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview3e" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen secundaria 2" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="imagen_secundaria_3_productoe">Imagen secundaria 3</label>
                  <input type="file" name="imagen_secundaria_3_productoe" id="imagen_secundaria_3_productoe" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                  <div id="imagen_preview4e" style="margin-top: 10px;" class="text-center mt-2">
                    <img src="" alt="Imagen secundaria 3" class="img-thumbnail" style="max-height: 150px;">
                  </div>
                </div>
              </div>
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
            <!-- Botón superior izquierdo 'Registrar producto' -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#crearInventario">
              Registrar Producto</button>
          </div>
        </div>
        <!-- Enlace superior -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="paginaPrincipal.php">Inicio</a></li>
            <li class="breadcrumb-item active">Inventario</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Buscador productos -->
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
              <!-- /.card-header -->
              <div class="card-body table-responsive"> <!-- Agrega la clase table-responsive al contenedor de la tabla -->
                <div class="d-flex justify-content-between mb-2">
                  <div>
                    <h5>Mostrar/ocultar columnas:</h5>
                    <a class="toggle-visIn btn btn-success" data-column="0">N°</a>
                    <a class="toggle-visIn btn btn-success" data-column="1">Nombre</a>
                    <a class="toggle-visIn btn btn-success" data-column="2">Marca</a>
                    <!-- <a class="toggle-visIn btn btn-success" data-column="2">Descripción</a> -->
                    <a class="toggle-visIn btn btn-success" data-column="3">Cantidad</a>
                    <a class="toggle-visIn btn btn-success" data-column="4">Precio</a>
                    <a class="toggle-visIn btn btn-success" data-column="5">Imagen</a>
                    <a class="toggle-visIn btn btn-success" data-column="6">Editar</a>
                    <a class="toggle-visIn btn btn-success" data-column="7">Eliminar</a>
                  </div>
                  <div><a type="button" class="btn btn-danger ml-4" href="#" id="generatePDFInventario"><i class="far fa-file-pdf"></i></a></div>
                </div>
                <table id="inventarioTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>NOMBRE</th>
                      <th>MARCA</th>
                      <!-- <th>DESCRIPCION </th> -->
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
</div>
<!-- ./wrapper -->
<!-- Bootstrap 4 -->

<script src="../vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

<script src="js/inventario.js"></script>
<?php
/* include_once "assets/views/footer.php"; */
/* } else {
  header('Location: ../login.php');
} */
?>
<!-- <script src="js/producto.js"></script> -->