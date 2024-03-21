<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3 || $_SESSION['id_rol'] == 4 || $_SESSION['id_rol'] == 5) {
?>
    <title>Soporte</title>
    <?php
    include_once "assets/views/nav.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->
    <link rel="stylesheet" href="../vista/assets/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="assets/css/stilos.css"> -->
    <link rel="stylesheet" href="../vista/assets/css/stilos.css">

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4><i class="fa fa-info-circle" aria-hidden="true"></i><b>Ayuda</b></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) ? 'index_principal.php' : '#'; ?>">Inicio</a></li>
                            <li class="breadcrumb-item active">Ayuda</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <strong>
                                            ¿Qué hacer en caso de errores de la página?
                                        </strong>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h4>Pasos</h4>
                                    <div class="row">
                                        <div class="col-5 col-sm-3">
                                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">1° paso - Recargar la pagina </a>
                                                <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">2° paso - volver a ingresar al pagina web</a>
                                                <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">3° paso - Contacte a soporte tecnico</a>

                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-9">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                                    Cuando la pagina muestre algun error o se quede congelado , debe precionar F5 o recargar la pagina en su icono para corregir las fallas.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                                    Si el paso anterior no funciona, se recomienda cerrar la pestaña del navegador y vover a ingresa a url de la pagina en una nueva ventana.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                                    Si no se puedo solucionar las fallas con los pasos anteriores, se procede a contactar con soporte ´para que realize un diagnostico del sistema.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Seccion de ayuda -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <strong>
                                            ¿Como se compra en la pagina?
                                        </strong>

                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h4>Pasos</h4>
                                    <div class="row">
                                        <div class="col-5 col-sm-3">
                                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="vert-tabs-paso1-tab" data-toggle="pill" href="#vert-tabs-paso1" role="tab" aria-controls="vert-tabs-paso1" aria-selected="true">1° paso - Buscar Productos</a>
                                                <a class="nav-link" id="vert-tabs-paso2-tab" data-toggle="pill" href="#vert-tabs-paso2" role="tab" aria-controls="vert-tabs-paso2" aria-selected="false">2° paso - Agregar al Carrito</a>
                                                <a class="nav-link" id="vert-tabs-paso3-tab" data-toggle="pill" href="#vert-tabs-paso3" role="tab" aria-controls="vert-tabs-paso3" aria-selected="false">3° paso - Iniciar Sesión o Registrarse</a>
                                                <a class="nav-link" id="vert-tabs-paso4-tab" data-toggle="pill" href="#vert-tabs-paso4" role="tab" aria-controls="vert-tabs-paso4" aria-selected="false">4° paso - Seleccionar método de pago y confirmar la Orden </a>
                                                <a class="nav-link" id="vert-tabs-paso5-tab" data-toggle="pill" href="#vert-tabs-paso5" role="tab" aria-controls="vert-tabs-paso5" aria-selected="false">5° paso - Realizar el Pago </a>

                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-9">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                <div class="tab-pane text-left fade show active" id="vert-tabs-paso1" role="tabpanel" aria-labelledby="vert-tabs-paso1-tab">
                                                    Navega por el sitio web de la tienda para encontrar los productos que deseas comprar. Utiliza la barra de búsqueda o navega por las categorías disponibles.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-paso2" role="tabpanel" aria-labelledby="vert-tabs-paso2-tab">
                                                    Una vez que hayas decidido qué productos comprar, selecciona la cantidad deseada y añádelos al carrito de compras haciendo clic en el botón "Agregar al Carrito" .
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-paso3" role="tabpanel" aria-labelledby="vert-tabs-paso3-tab">
                                                    Si ya tienes una cuenta, inicia sesión. Si no, crea una nueva cuenta proporcionando la información requerida, como nombre, dirección de correo electrónico y dirección de envío.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-paso4" role="tabpanel" aria-labelledby="vert-tabs-paso4-tab">
                                                    Elige el método de pago que prefieras como Yape, Plin , tarjeta de crédito/débito. Antes de finalizar la compra, revisa cuidadosamente los detalles de tu pedido, incluyendo productos, cantidades, información de envío y método de pago. Asegúrate de que todo sea correcto.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-paso5" role="tabpanel" aria-labelledby="vert-tabs-paso5-tab">
                                                    Una vez que estés satisfecho con tu pedido, procede a realizar el pago. Sigue las instrucciones proporcionadas para completar la transacción de forma segura.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <strong>
                                            ¿Cómo se genera la proforma?
                                        </strong>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h4>Pasos</h4>
                                    <div class="row">
                                        <div class="col-5 col-sm-3">
                                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="vert-tabs-home1-tab" data-toggle="pill" href="#vert-tabs-home1" role="tab" aria-controls="vert-tabs-home1" aria-selected="true">1° paso - Buscar Productos</a>
                                                <a class="nav-link" id="vert-tabs-profile1-tab" data-toggle="pill" href="#vert-tabs-profile1" role="tab" aria-controls="vert-tabs-profile1" aria-selected="false">2° paso - Agregar al Carrito</a>
                                                <a class="nav-link" id="vert-tabs-messages1-tab" data-toggle="pill" href="#vert-tabs-messages1" role="tab" aria-controls="vert-tabs-messages1" aria-selected="false">3° paso Generar Proforma </a>
                                                <a class="nav-link" id="vert-tabs-settings1-tab" data-toggle="pill" href="#vert-tabs-settings1" role="tab" aria-controls="vert-tabs-settings1" aria-selected="false">4° paso - Iniciar Sesión o Registrarse</a>
                                                <a class="nav-link" id="vert-tabs-messages2-tab" data-toggle="pill" href="#vert-tabs-messages2" role="tab" aria-controls="vert-tabs-messages2" aria-selected="false">5° paso - Realizar el pago</a>
                                                <a class="nav-link" id="vert-tabs-settings2-tab" data-toggle="pill" href="#vert-tabs-settings2" role="tab" aria-controls="vert-tabs-settings2" aria-selected="false">6° paso - Generacion y descargar del PDF</a>

                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-9">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                <div class="tab-pane text-left fade show active" id="vert-tabs-home1 role=" tabpanel" aria-labelledby="vert-tabs-home1-tab">
                                                    Navega por el sitio web de la tienda para encontrar los productos que deseas comprar. Utiliza la barra de búsqueda o navega por las categorías disponibles.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-profile1" role="tabpanel" aria-labelledby="vert-tabs-profile1-tab">
                                                    Una vez que hayas decidido qué productos comprar, selecciona la cantidad deseada y añádelos al carrito de compras haciendo clic en el botón "Agregar al Carrito" .
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-messages1" role="tabpanel" aria-labelledby="vert-tabs-messages1-tab">
                                                    Despues de seleccionar todos los productos, precionar en el boton genera proformar para la creacion del documento en formato PDF .
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-settings1" role="tabpanel" aria-labelledby="vert-tabs-settings1-tab">
                                                    Si ya tienes una cuenta, inicia sesión. Si no, crea una nueva cuenta proporcionando la información requerida, como nombre, dirección de correo electrónico y dirección de envío.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-messages2" role="tabpanel" aria-labelledby="vert-tabs-messages2-tab">
                                                    Elige el método de pago que prefieras como Yape, Plin , tarjeta de crédito/débito. Antes de finalizar la compra, revisa cuidadosamente los detalles de tu pedido y método de pago. Asegúrate de que todo sea correcto.
                                                </div>
                                                <div class="tab-pane fade" id="vert-tabs-settings2" role="tabpanel" aria-labelledby="vert-tabs-settings2-tab">
                                                    Despues de la confirmacion del pago se procede a mostrar la proforma en el documento PDF que puede descargar, imprimir y compartir.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Preguntas frecuentes -->
        <section class="content">
            <div class="row">
                <div class="col-12" id="accordion">

                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    1. ¿Cuáles son sus horarios de atención?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Nuestros horarios de atención son de lunes a viernes de 8:00 AM a 6:00 PM y los sábados de 9:00 AM a 3:00 PM.
                            </div>
                        </div>
                    </div>

                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    2. ¿Dónde están ubicados?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Estamos ubicados en Jr. Crespo castillo #550
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    3. ¿Cuáles son los métodos de pago aceptados?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Aceptamos pagos con Yape, Plin, tarjeta de crédito, débito y efectivo en la tienda.
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    4. ¿Cómo puedo devolver productos si no estoy satisfecho con ellos?
                                </h4>
                            </div>
                        </a>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Para devolver un producto, simplemente contáctanos dentro de los 30 días posteriores a la compra, siempre y cuando estén en condiciones originales y con el recibo de compra te proporcionaremos un proceso de devolución sin complicaciones.
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse5">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    5. ¿Ofrecen asesoramiento técnico sobre los materiales que venden?
                                </h4>
                            </div>
                        </a>
                        <div id="collapse5" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Sí, nuestro equipo está capacitado para brindarte asesoramiento técnico sobre todos los materiales que vendemos. No dudes en consultarnos si tienes preguntas sobre cómo utilizar o instalar algún producto.
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse6">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    6. ¿Cuáles son las marcas que venden?
                                </h4>
                            </div>
                        </a>
                        <div id="collapse6" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Trabajamos con una amplia gama de marcas reconocidas en la industria de la construcción. Algunas de las marcas que vendemos incluyen
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse7">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    7. ¿Cómo puedo contactar con el servicio de atención al cliente en caso de tener preguntas o problemas?
                                </h4>
                            </div>
                        </a>
                        <div id="collapse7" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Puedes contactar con nuestro servicio de atención al cliente llamando al 964215342, enviando un correo electrónico a construtienda@gmail.com, o visitándonos en nuestra tienda durante nuestros horarios de atención.
                            </div>
                        </div>
                    </div>
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse8">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    8. ¿Tienen algún tipo de garantía en los productos que venden?
                                </h4>
                            </div>
                        </a>
                        <div id="collapse8" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Muchos de nuestros productos vienen con garantía del fabricante. Consulta la garantía específica de cada producto para conocer los términos y condiciones de cobertura.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-12 mt-3 text-center">
                    <p class="lead">
                        <a href="contact-us.html">Contáctanos</a>,
                        en caso de no encontrar la respuesta correcta o tenga alguna duda.<br¿/>
                    </p>
                </div>
            </div>
        </section>
        <!--/.Catalogo de productos -->
        <!-- jQuery -->
        <script src="../vista/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->

        <script src="../vista/assets/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->

    </div>
    </div>

<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>