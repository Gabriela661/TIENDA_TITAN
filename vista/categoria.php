<title>Adm || Categorias</title>
<?php
include_once "assets/views/nav.php";
?>
<!-- J QUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<body>
    <div class="wrapper">
        <!-- Modal para agregar la categoria-->
        <div class="modal fade" id="crearCategoria" tabindex="-1" role="dialog" aria-labelledby="#crearCategoria" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="#crearCategoria">Registrar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_categoria" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombres">Nombre Categoria:</label>
                                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Nombre de la categoria">
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
        <!-- ./Modal para agregar la categoria-->

        <!-- Modal para editar la categoria -->
        <div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="editarCategoriaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarCategoriaLabel">Editar Categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_editar_categoria" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre_editar">Nombre Categoría</label>
                                    <input type="hidden" class="form-control" id="id_categoria" name="id_categoria">
                                    <input type="text" class="form-control" id="nombre_editar_categoria" name="nombre_editar_categoria" placeholder="Nombre de la Categoría">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Cambios</button>
                    </div>
                    </form>
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
                        <div class="col-sm-6">
                            <h4><i class="fa fa-list-alt" aria-hidden="true"></i> <b>Lista Categorias</b></h4>
                            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#crearCategoria">
                                <i class="fas fa-plus"></i> Nueva Categoria
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
                            <div class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Listado de Categorias</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <!-- Tabla de categorias -->
                                            <table id="" class="table table-bordered table-striped ">
                                                <thead>
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