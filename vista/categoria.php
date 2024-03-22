<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3) {
?>

    <head>
        <title>Adm || Categorias</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    </head>

    <?php
    include_once "assets/views/nav.php";
    ?>

    <body>
        <div class="wrapper">
            <!-- Modal para agregar la categoria-->
            <div class="modal fade" id="crearCategoria" tabindex="-1" role="dialog" aria-labelledby="#crearCategoria" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #d1d5dd; color: black;">
                        <div class="modal-body">
                            <form id="form_categoria" class="m-0" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Nombre de la categoria">
                                        <label for="nombre_categoria">Nombre Categoria</label>
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
            <!-- ./Modal para agregar la categoria-->

            <!-- Modal para editar la categoria -->
            <div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="editarCategoriaLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #d1d5dd; color: black;">
                        <div class="modal-body">
                            <form id="form_editar_categoria" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_categoria" name="id_categoria">
                                        <input type="text" class="form-control" id="nombre_editar_categoria" name="nombre_editar_categoria" placeholder="Nombre de la Categoría">
                                        <label for="nombre_editar_categoria">Nombre Categoría</label>
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

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6 d-flex">
                                <h4><i class="fa fa-list-alt" aria-hidden="true"></i> <b>Lista Categorias</b></h4>
                                <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#crearCategoria">
                                    <i class="fas fa-plus"></i> Categoria
                                </button>
                                </h1>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive">
                                    <!-- Tabla de categorias -->
                                    <table id="categoriaTable" class="table table-bordered table-striped text-center mb-1">
                                        <thead style="background-color: #e85813; color: white;">
                                            <tr>
                                                <th>N°</th>
                                                <th>NOMBRES CATEGORIA</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
                                            </tr>
                                        </thead>
                                        <tbody id="categoria_lista">
                                        </tbody>
                                    </table>
                                    <!-- ./Tabla de categorias -->
                                </div>
                            </div>
                        </div>
                </section>
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

    <!-- Archivo js para las funcionalidades -->
    <script src="js/categoria.js"></script>
    </div>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>