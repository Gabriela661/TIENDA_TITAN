<?php
include_once 'modelo/usuarioModelo.php';
session_start();
$Usuario = new Usuario();

// Inicializar las variables de usuario y contraseña
$user = "";
$pass = "";
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos de usuario y contraseña están vacíos
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Por favor, completa todos los campos.";
    } else {
        $user = $_POST['email'];
        $pass = $_POST['password'];
        // Intentar iniciar sesión
        $Usuario->logearse($user, $pass);
        // Verificar si las credenciales son válidas
        if (!empty($Usuario->objetos)) {
            foreach ($Usuario->objetos as $objetos) {
                $_SESSION['id_usuario'] = $objetos->id_usuario;
                $_SESSION['id_rol'] = $objetos->id_rol;
                $_SESSION['nombre_rol'] = $objetos->nombre_rol;
                $_SESSION['nombre_usuario'] = $objetos->nombre_usuario;
                $_SESSION["apellido_usuario"] = $objetos->apellido_usuario;
                $_SESSION["foto_usuario"] = $objetos->foto_usuario;
            }
            // Redirigir según el rol del usuario
            switch ($_SESSION['id_rol']) {
                case 1:
                case 2:
                    header('location: ../vista/index_principal.php');
                    exit; // Salir del script después de redireccionar
                    break;
                case 3:
                    header('location: ../vista/inventario.php');
                    exit; // Salir del script después de redireccionar
                    break;
                case 4:
                    header('location: ../vista/inventario.php');
                    exit; // Salir del script después de redireccionar
                    break;
                case 5:
                    header('location: ../vista/secundario.php');
                    exit; // Salir del script después de redireccionar
                    break;
                default:
                    $error = "Usuario no autorizado.";
            }
        } else {
            // Credenciales incorrectas
            $error = "Usuario o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Adm|Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Site favicon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="container-form login">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Para unirte a nuestra comunidad por favor inicia sesión con tus datos</p>
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <?php if (isset($error)) : ?>
                    <div style="color: red;"><?php echo $error; ?></div>
                <?php endif; ?>
                <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label>
                        <i class='bx bx-envelope'></i>
                        <input type="email" name="email" id="email" placeholder="Usuario" value="<?php echo htmlspecialchars($user); ?>" required />
                    </label>
                    <label>
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" name="password" id="password" placeholder="Contraseña" value="<?php echo htmlspecialchars($pass); ?>" required />
                    </label>
                    <input type="submit" value="Iniciar">
                </form>
            </div>
        </div>
    </div>

    <div class="container-form register hide">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Para unirte a nuestra comunidad por favor inicia sesion con tus datos</p>
                <input type="button" value="Iniciar sesion" id="loguear">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Crear una cuenta</h2>
                <form id="registrar_cliente" action="" class="form" method="post">
                    <label>
                        <i class='bx bx-user'></i>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre Completo" required>
                    </label>
                    <label>
                        <i class='bx bx-user'></i>
                        <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellidos" required>
                    </label>
                    <label>
                        <i class='bx bx-phone'></i>
                        <input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" placeholder="Número de teléfono" maxlength="9" required>
                    </label>
                    <label>
                        <i class='bx bx-envelope'></i>
                        <input type="email" class="form-control" id="correo_electronico_usuario" name="correo_electronico_usuario" placeholder="Correo Electrónico" required>
                    </label>
                    <label>
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Contraseña" required>
                    </label>
                    <label>
                        <i class='bx bx-map'></i>
                        <input type="text" class="form-control" id="direccion_usuario" name="direccion_usuario" placeholder="Dirección" required>
                    </label>
                    <label>
                        <i class='bx bx-image-add'></i>
                        <input type="file" name="foto_usuario" id="foto_usuario">
                    </label>


                    <input type="submit" value="Registrarse">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
/* } */
?>
<!-- <script src="assets/script.js"></script> -->