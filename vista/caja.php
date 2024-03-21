<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) {
?>
    <title>Caja</title>
    <?php include_once "assets/views/nav.php"; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <div class="wrapper">


        <!-- inicio Modal editar movimiento caja-->
        <div class="modal fade" id="editar_caja" tabindex="-1" role="dialog" aria-labelledby="#editar_caja" aria-hidden="true">
            <div class="modal-dialog sm:modal-sm modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container h-100" style="background-color: #d1d5dd; color: black;">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col col-xl-10">
                                    <div class="row g-0">
                                        <div class="col-md-5 d-none d-md-block pt-5">
                                            <img src="./assets/img/caja.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                        </div>
                                        <div class="col-md-7 d-flex align-items-center">
                                            <div class="card-body">
                                                <form id="form_editar_caja" method="POST">

                                                    <div class="d-flex align-items-center mb-3 pb-1">
                                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                        <span class="h2 fw-bold mb-0">Movimiento</span>
                                                    </div>
                                                    <div class="d-none form-group">
                                                        <input type="text" class="form-control" id="id_cajae" name="id_cajae">
                                                    </div>

                                                    <div class="d-none form-group">
                                                        <input type="text" class="form-control" id="id_usuarioCe" name="id_usuarioCe" value="<?php echo $_SESSION['id_usuario']; ?>">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-4">
                                                            <div class="form-outline">
                                                                <input type="number" id="montoe" name="montoe" class="form-control form-control-lg" />
                                                                <label class="form-label" for="monto">Monto</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-4">
                                                            <div class="form-outline">
                                                                <select id="actione" name="actione" class="form-control form-control-lg">
                                                                    <option value="retirar">Retirar</option>
                                                                    <option value="depositar">Depositar</option>
                                                                </select>
                                                                <label class="form-label" for="actione">Acción</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="conceptoe" name="conceptoe" class="form-control form-control-lg" />
                                                        <label class="form-label" for="conceptoe">Concepto</label>
                                                    </div>

                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="desce" name="desce" class="form-control form-control-lg" />
                                                        <label class="form-label" for="desce">Descripción</label>
                                                    </div>

                                                    <div class="pt-1 mb-4">
                                                        <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </form>
        <!--final  Modal  editar-->


        <!-- style="font-family: 'Roboto', sans-serif;" -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="font-family: 'Open Sans', sans-serif;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 p-1 d-flex sm:flex-row justify-content-between align-items-start">
                        <div class="sm:col-md-12 col-md-4 row d-flex">
                            <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                                <div class="col-md-6 mb-3 d-flex justify-content-end align-items-center" id="cajaTotal">
                                    <button class="btn btn-outline-secondary d-flex justify-content-around p-2 align-items-center" type="button" id="toggleButton" style="width: 200px; height: 50px;">
                                        <div> <span id="eyeIcon" class="fa fa-eye"></span> <span id="toggleText">Ver Caja</span></div>
                                        <div>
                                            <p class="ml-2 mb-0" id="valorMostrado"></p>
                                        </div>
                                    </button>
                                </div>
                            <?php } ?>
                            <div class="container mt-2" style="background-color: #d1d5dd; color: black;">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        <div class="row">
                                            <!--  <div class="col-md-5 d-none d-md-block pt-5">
                                            <img src="./assets/img/caja.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                        </div> -->
                                            <div class="col-md-12 d-flex align-items-center">
                                                <div class="card-body p-3 p-lg-4 text-black">
                                                    <!--  <button type="button" class="close d-none d-md-block" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button> -->
                                                    <form id="form_caja" method="POST">

                                                        <div class="d-flex align-items-center mb-3 pb-1">
                                                            <i class="d-none fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                            <span class="h3 fw-bold mb-0">Movimiento</span>
                                                        </div>

                                                        <div class="d-none form-group">
                                                            <input type="text" class="form-control" id="id_usuarioC" name="id_usuarioC" value="<?php echo $_SESSION['id_usuario']; ?>">
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 mb-4">
                                                                <div class="form-outline">
                                                                    <input type="number" id="monto" name="monto" class="form-control form-control-lg" />
                                                                    <label class="form-label" for="monto">Monto</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-4">
                                                                <div class="form-outline">
                                                                    <select id="action" name="action" class="form-control form-control-lg">
                                                                        <option value="retirar">Retirar</option>
                                                                        <option value="depositar">Depositar</option>
                                                                    </select>
                                                                    <label class="form-label" for="action">Acción</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-outline mb-4">
                                                            <input type="text" id="concepto" name="concepto" class="form-control form-control-lg" />
                                                            <label class="form-label" for="concepto">Concepto</label>
                                                        </div>

                                                        <div class="form-outline mb-4">
                                                            <input type="text" id="desc" name="desc" class="form-control form-control-lg" />
                                                            <label class="form-label" for="desc">Descripción</label>
                                                        </div>

                                                        <div class="pt-1 mb-4">
                                                            <button class="btn btn-dark" type="submit"><i class="fas fa-save mr-2"></i>Guardar</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i> Cancelar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">

                            <div class="card">
                                <div class="card-header p-3 d-flex justify-content-between align-items-center">
                                    <!-- botones para cambiar entre personal y clientes -->
                                    <h4><i class="fas fa-users"></i> <b>Movimientos de caja</b></h4>
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#ingresos" data-toggle="tab">Ingresos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#egresos" data-toggle="tab">Egresos</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane btn-ingresos" id="ingresos">
                                            <div class="timeline timeline-inverse">
                                                <div class="card">
                                                    <!-- Tabla de ingresos -->
                                                    <div class="card-body table-responsive">
                                                        <div class="d-flex justify-content-between mb-2 align-items-center">
                                                            <!-- <div class="d-none">
                                                                <h5>Mostrar/ocultar columnas:</h5>
                                                                <a class="toggle-visI btn btn-success" data-column="0">N°</a>
                                                                <a class="toggle-visI btn btn-success" data-column="1">Concepto</a>
                                                                <a class="toggle-visI btn btn-success" data-column="2">Acción</a>
                                                                <a class="toggle-visI btn btn-success" data-column="3">Monto</a>
                                                                <a class="toggle-visI btn btn-success" data-column="4">Fecha</a>
                                                                <a class="toggle-visI btn btn-success" data-column="5">Editar</a>
                                                                <a class="toggle-visI btn btn-success" data-column="6">Eliminar</a>
                                                            </div> -->
                                                            <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                                                                <div id="ingresoTotal">
                                                                </div>
                                                            <?php } ?>
                                                            <!--  <div><a type="button" class="btn btn-danger ml-4" href="#" id="generatePDFIngreso"><i class="far fa-file-pdf"></i></a></div> -->
                                                        </div>
                                                        <table id="ingresoTable" class="<?php echo ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) ? 'editdelete' : ''; ?> table table-bordered table-striped mt-1 mb-4 text-center">
                                                            <thead style="background-color: #f34005; color: white;">
                                                                <tr>
                                                                    <th>N°</th>
                                                                    <th>Concepto</th>
                                                                    <th>Acción</th>
                                                                    <th>Monto</th>
                                                                    <th>Fecha</th>
                                                                    <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                                                                        <th>Editar</th>
                                                                        <th>Borrar</th>
                                                                    <?php } ?>

                                                                </tr>
                                                            </thead>
                                                            <tbody id="ingresos_lista">
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <!-- ./Tabla del personal -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane btn-egresos" id="egresos">
                                            <div class="card">
                                                <div class="card-body table-responsive">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <!-- <div>
                                                        <h5>Mostrar/ocultar columnas:</h5>
                                                        <a class="toggle-visE btn btn-success" data-column="0">N°</a>
                                                        <a class="toggle-visE btn btn-success" data-column="1">Concepto</a>
                                                        <a class="toggle-visE btn btn-success" data-column="2">Acción</a>
                                                        <a class="toggle-visE btn btn-success" data-column="3">Monto</a>
                                                        <a class="toggle-visE btn btn-success" data-column="4">Fecha</a>
                                                        <a class="toggle-visE btn btn-success" data-column="5">Editar</a>
                                                        <a class="toggle-visE btn btn-success" data-column="6">Eliminar</a>
                                                    </div> -->
                                                        <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                                                            <div id="egresoTotal">
                                                            </div>
                                                        <?php } ?>
                                                        <!-- <div><a type="button" class="btn btn-danger ml-4" href="#" id="generatePDFEgreso"><i class="far fa-file-pdf"></i></a></div> -->
                                                    </div>
                                                    <table id="egresoTable" class="<?php echo ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) ? 'editdelete' : ''; ?> table table-bordered table-striped mt-1 mb-4 text-center" style="width: 100%;">
                                                        <thead style="background-color: #f34005; color: white;">
                                                            <tr>
                                                                <th>N°</th>
                                                                <th>Concepto</th>
                                                                <th>Acción</th>
                                                                <th>Monto</th>
                                                                <th>Fecha</th>
                                                                <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
                                                                    <th>Editar</th>
                                                                    <th>Borrar</th>
                                                                <?php } ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="egresos_lista">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- contenedor de usuarios -->
                <div class="col-md-12">

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

    </div>

    <script src="../vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../vista/assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- Footer -->

    <script src="js/caja.js"></script>

<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>