<title>Productos</title>
<?php
include_once "assets/views/nav.php";
?>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
 
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css">-->
    <link rel="stylesheet" href="../vista/assets/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="assets/css/stilos.css">-->
    <link rel="stylesheet" href="../vista/assets/css/stilos.css">
<body>
<div class="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="registrarProducto" tabindex="-1" role="dialog" aria-labelledby="#registrarProducto" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="#registrarProducto">Productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="datos_usuario" method="POST">
              <div class="card-body">

                <div class="form-group">
                  <label for="nombre">Nombres: </label>
                  <input type="text" class="form-control" id="" name="" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                  <label for="marca">Marca: </label>
                  <input type="text" class="form-control" id="" name="" placeholder="Marca producto"></input>
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripcion: </label>
                  <textarea type="text" class="form-control" id="" name="" placeholder="Descripcion del producto"></textarea>
                </div>

                <div class="form-group">
                  <label for="cantidad">Cantidad: </label>
                  <input type="number" class="form-control" id="" name="" placeholder="Cantidad ">
                </div>

                <div class="form-group">
                  <label for="precio">Precio: </label>
                  <input type="number" class="form-control" id="" name="" placeholder="Precio del producto"></input>
                </div>

                <div class="form-group">
                  <label for="imagen_producto">Imagen Producto: </label>
                  <br>
                  <input type="file" name="" id="">

                  <center>
                    <div id="" style="margin-top: 10px;" class="img-thumbnail"></div>
                  </center>
                </div>


              </div>
              <!-- /.card-body -->

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    </form>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h4><i class="fa fa-briefcase" aria-hidden="true"></i><b>Productos</b></h4> 
            <button type="button" class="btn btn-info ml-3" data-toggle="modal" data-target="#registrarProducto">
                  Agregar Producto</button></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Productos</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>NOMBRE</th>
                          <th>MARCA</th>
                          <th>DESCRIPCION</th>
                          <th>CANTIDAD</th>
                          <th>PRECIO</th>
                          <th>IMAGEN PRODUCTO</th>
                          <th>EDITAR</th>
                          <th>ELIMINAR</th>
                        </tr>
                      </thead>
                      <tbody id="productos_lista">
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
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

    </div>