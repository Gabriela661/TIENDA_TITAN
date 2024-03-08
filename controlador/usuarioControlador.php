<?php
//instancias la clase
include_once '../modelo/usuarioModelo.php';
$usuario = new usuario();

//listar personal
if ($_POST['funcion'] == 'listar_personal') {
    $json = array();
    $usuario->listar_personal();
    foreach ($usuario->objetos as $objeto) {

        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre_usuario' => $objeto->nombre_usuario,
            'apellido_usuario' => $objeto->apellido_usuario,
            'correo_usuario' => $objeto->correo_usuario,
            'foto_usuario' => '../vista/assets/img/perfil_us/' . $objeto->foto_usuario,
            'nombre_rol' => $objeto->nombre_rol,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
//listar cliente
if ($_POST['funcion'] == 'listar_cliente') {
    $json = array();
    $usuario->listar_cliente();
    foreach ($usuario->objetos as $objeto) {

        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre_usuario' => $objeto->nombre_usuario,
            'apellido_usuario' => $objeto->apellido_usuario,
            'correo_usuario' => $objeto->correo_usuario,
            'foto_usuario' => '../vista/assets/img/perfil_us/' . $objeto->foto_usuario,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//listar rol
if ($_POST['funcion'] == 'rol_usuario') {
    $json = array();
    $usuario->rol_usuario();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id_rol' => $objeto->id_rol,
            'nombre_rol' => $objeto->nombre_rol,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
// Cargar Inventario
if ($_POST['funcion'] == 'cargar_usuario') {
    $json = array();
    $id_usuario = $_POST['id_usuario'];
    $usuario->cargar_usuario($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombres' => $objeto->nombres,
            'apellidos' => $objeto->apellidos,
            'dni' => $objeto->dni,
            'telefono' => $objeto->telefono,
            'correo_electronico' => $objeto->correo_electronico,
            'direccion_usuario' => $objeto->direccion_usuario,

        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
//Editar usuarios
if ($_POST['funcion'] == 'editar_usuario') {
    try {
        $id_usuarioe = $_POST['id_usuarioe'];
        $nombrese = $_POST['nombrese'];
        $apellidose = $_POST['apellidose'];
        $dnie = $_POST['dnie'];
        $telefonoe = $_POST['telefonoe'];
        $correo_electronicoe = $_POST['correo_electronicoe'];
        $direccion_usuarioe = $_POST['direccion_usuarioe'];
        $usuario->editar_usuario($id_usuarioe, $nombrese, $apellidose, $dnie, $telefonoe, $correo_electronicoe, $direccion_usuarioe);
    } catch (Exception $e) {
        echo 'error';
    }
}

//eliminar usuario
if ($_POST['funcion'] == 'borrar_usuario') {
    $id_usuario = $_POST['id_usuario'];
    $usuario->borrar_usuario($id_usuario);
}

//crear usuario
if ($_POST['funcion'] == 'crear_usuario') {

    $nombre_usuario = $_POST['nombre_usuario'];
    $apellido_usuario = $_POST['apellido_usuario'];
    $dni_usuario = $_POST['dni_usuario'];
    $telefono_usuario = $_POST['telefono_usuario'];
    $correo_electronico_usuario = $_POST['correo_electronico_usuario'];
    $password_usuario = $_POST['password_usuario'];
    $hashed_password = password_hash($password_usuario, PASSWORD_DEFAULT);

    $direccion_usuario = $_POST['direccion_usuario'];

    //imagen varchar guardar
    $nombre_inventario = $_FILES['foto_usuario']['name'];
    if (isset($_FILES['foto_usuario']) && $_FILES['foto_usuario']['error'] == UPLOAD_ERR_OK) {
        $allowed_image_types = array('image/png', 'image/jpeg', 'image/gif', 'image/jpg');


        if (in_array($_FILES['foto_usuario']['type'], $allowed_image_types)) {
            $nombre_inventario =  $nombre_usuario . uniqid() . '-' . $_FILES['foto_usuario']['name'];
        } else {
            echo "Tipo de archivo no permitido.";
            exit;
        }
        $ruta = '../vista/assets/img/perfil_us/' . $nombre_inventario;
        move_uploaded_file($_FILES['foto_usuario']['tmp_name'], $ruta);
        $foto_usuario = $nombre_inventario;
    } else {
        echo "No se proporcionó ninguna imagen o documento.";
        exit;
    }

    $rol_usuario = $_POST['rol_usuario'];

    $usuario->crear_usuario(
        $nombre_usuario,
        $apellido_usuario,
        $dni_usuario,
        $telefono_usuario,
        $correo_electronico_usuario,
        $hashed_password,
        $direccion_usuario,
        $foto_usuario,
        $rol_usuario
    );
}
