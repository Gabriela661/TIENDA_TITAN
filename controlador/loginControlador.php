<?php
include_once '../modelo/usuarioModelo.php';
session_start();
$Usuario = new Usuario();

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
                case 3:
                    header('location: ../vista/index_principal.php');
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