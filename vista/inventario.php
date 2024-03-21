<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3 || $_SESSION['id_rol'] == 4) {
?>


  <title>Inventario</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

  <?php include_once "assets/views/nav.php"; ?>

<?php /* if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3) { */ ?> 
  <!-- Modal crear producto -->
    <div class="modal fade" id="crearInventario" tabindex="-1" role="dialog" aria-labelledby="#crearInventario" aria-hidden="true">
      <div class="modal-dialog sm:modal-sm modal-lg" role="document">
        <div class="modal-content" style="background-color: #d1d5dd; color: black;">
          <div class="modal-body">
            <form action="/submit" class="m-0 p-0" id="form_inventario" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" placeholder="Código del Producto">
                      <label for="codigo_producto">Código</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre del Producto">
                      <label for="nombre_producto">Nombre</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="decimal" step="0.01" class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio del Producto">
                      <label for="precio_producto">Precio</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="decimal" step="0.0001" class="form-control" id="cantidad_producto" name="cantidad_producto" placeholder="Cantidad de Producto">
                      <label for="cantidad_producto">Cantidad</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" placeholder="Descripcion del Producto"></textarea>
                  <label for="descripcion_producto">Descripcion del Producto</label>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="marca_producto" name="marca_producto" placeholder="Marca del Producto">
                      <label for="marca_producto">Marca del Producto</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select type="number" class="form-control" id="categoria_producto" name="categoria_producto" placeholder="Categoria del producto"></select>
                      <label for="categoria_producto">Categoria Producto</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_principal_producto" id="imagen_principal_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_principal_producto">Imagen principal</label>
                      <div id="imagen_preview1" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="../vista/assets/img/default.png" alt="Imagen principal" class="img-thumbnail" style="max-height: 100px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_secundaria_1_producto" id="imagen_secundaria_1_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_secundaria_1_producto">Imagen secundaria 1</label>
                      <div id="imagen_preview2" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="../vista/assets/img/default.png" alt="Imagen secundaria 1" class="img-thumbnail" style="max-height: 100px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_secundaria_2_producto" id="imagen_secundaria_2_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_secundaria_2_producto">Imagen secundaria 2</label>
                      <div id="imagen_preview3" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="../vista/assets/img/default.png" alt="Imagen secundaria 2" class="img-thumbnail" style="max-height: 100px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_secundaria_3_producto" id="imagen_secundaria_3_producto" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_secundaria_3_producto">Imagen secundaria 3</label>
                      <div id="imagen_preview4" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="../vista/assets/img/default.png" alt="Imagen secundaria 3" class="img-thumbnail" style="max-height: 100px;">
                      </div>
                    </div>
                  </div>
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
  <?php /* } */ ?>


  <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3) { ?>
    <!-- Modal para editar el inventario -->
    <div class="modal fade" id="editarInventario" tabindex="-1" role="dialog" aria-labelledby="editarProductoLabel" aria-hidden="true">
      <div class="modal-dialog  sm:modal-sm modal-lg" role="document">
        <div class="modal-content" style="background-color: #d1d5dd; color: black;">
          <div class="modal-body">
            <form id="form_editar_producto" method="POST">
              <div class="card-body">
                <div class="d-none">
                  <label for="id_editar">Id</label>
                  <input type="text" class="form-control" id="id_editar" name="id_editar" placeholder="ID del Producto">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="nombre_editar" name="nombre_editar" placeholder="Nombre del Producto">
                      <label for="nombre_editar">Nombre</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="decimal" step="0.01" class="form-control" id="precio_editar" name="precio_editar" placeholder="Precio del Producto">
                      <label for="precio_editar">Precio</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea type="text" class="form-control" id="descripcion_editar" name="descripcion_editar" placeholder="Descripción del Producto"></textarea>
                  <label for="descripcion_editar">Descripción del Producto</label>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="decimal" step="0.0001" class="form-control" id="cantidad_editar" name="cantidad_editar" placeholder="Cantidad de Producto">
                      <label for="cantidad_editar">Cantidad</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="marca_editar" name="marca_editar" placeholder="Marca del Producto">
                      <label for="marca_editar">Marca del Producto</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_principal_productoe" id="imagen_principal_productoe" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_principal_productoe">Imagen principal</label>
                      <div id="imagen_preview1e" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="" alt="Imagen principal" class="img-thumbnail" style="max-height: 150px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_secundaria_1_productoe" id="imagen_secundaria_1_productoe" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_secundaria_1_productoe">Imagen secundaria 1</label>
                      <div id="imagen_preview2e" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="" alt="Imagen secundaria 1" class="img-thumbnail" style="max-height: 150px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_secundaria_2_productoe" id="imagen_secundaria_2_productoe" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_secundaria_2_productoe">Imagen secundaria 2</label>
                      <div id="imagen_preview3e" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="" alt="Imagen secundaria 2" class="img-thumbnail" style="max-height: 150px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" name="imagen_secundaria_3_productoe" id="imagen_secundaria_3_productoe" accept="image/jpg, image/jpeg, image/png" class="form-control-file">
                      <label for="imagen_secundaria_3_productoe">Imagen secundaria 3</label>
                      <div id="imagen_preview4e" style="margin-top: 10px;" class="text-center mt-2">
                        <img src="" alt="Imagen secundaria 3" class="img-thumbnail" style="max-height: 150px;">
                      </div>
                    </div>
                  </div>
                  <div class="pt-1 mb-1">
                    <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="font-family: 'Open Sans', sans-serif;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <div class="d-flex align-items-center">
              <!-- Botón superior izquierdo 'Registrar producto' -->
              <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3) { ?>
              <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#crearInventario">
                Registrar Producto</button>  <?php } ?>
              <!-- <div><a type="button" class="btn btn-danger ml-4" href="#" id="generatePDFInventario"><i class="far fa-file-pdf"></i></a></div> -->
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
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                      <!--                     <h5>Mostrar/ocultar columnas:</h5>
                    <a class="toggle-visIn btn btn-success" data-column="0">N°</a>
                    <a class="toggle-visIn btn btn-success" data-column="1">Nombre</a>
                    <a class="toggle-visIn btn btn-success" data-column="2">Marca</a>                    
                    <a class="toggle-visIn btn btn-success" data-column="3">Cantidad</a>
                    <a class="toggle-visIn btn btn-success" data-column="4">Precio</a>
                    <a class="toggle-visIn btn btn-success" data-column="5">Imagen</a>
                    <a class="toggle-visIn btn btn-success" data-column="6">Editar</a>
                    <a class="toggle-visIn btn btn-success" data-column="7">Eliminar</a> -->
                    </div>
                  </div>
                  <table id="inventarioTable" class="table table-bordered table-striped text-center">
                    <thead style="background-color: #e85813; color: white;">
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
  include_once "assets/views/footer.php";
} else {
  header('Location: ../login.php');
}
?>
<!-- <script src="js/producto.js"></script> -->