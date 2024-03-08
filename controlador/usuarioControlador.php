<?php
include_once '../modelo/usuarioModelo.php';
// Se instancia la clase 'usuario'
$usuario = new usuario();

/* FUNCION PARA LISTAR EL PERSONAL DE LA BASE DE DATOS*/
if ($_POST['funcion'] == 'listar_personal') {
    $json = array();
    // Se llama al método listarpersonal() del objeto '$categoria' 
    $usuario->listar_personal();
    foreach ($usuario->objetos as $objeto) {
    // Se recorre el array de objetos de usuaris y se crea un nuevo array asociativo para cada usuario
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre_usuario' => $objeto->nombre_usuario,
            'apellido_usuario' => $objeto->apellido_usuario,
            'correo_usuario' => $objeto->correo_usuario,
            'foto_usuario' => '../vista/assets/img/perfil_us/' . $objeto->foto_usuario,
            'nombre_rol' => $objeto->nombre_rol,
        );
    }
    //Se convierte el array a formato JSON y se devuelve como respuesta 
    $jsonstring = json_encode($json);
    echo $jsonstring; //Se devuelve el JSON como respuesta 
}
/*FIN FUNCION PARA LISTAR LOS USUARIOS DE LA BASE DE DATOS*/

/*FUNCION PARA LISTAR LOS CLIENTES DE LA BASE DE DATOS*/
if ($_POST['funcion'] == 'listar_cliente') {
    $json = array();
    $usuario->listar_cliente();
    foreach ($usuario->objetos as $objeto) {
    // Se recorre el array de objetos de usuario y se crea un nuevo array asociativo para cada cliente
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre_usuario' => $objeto->nombre_usuario,
            'apellido_usuario' => $objeto->apellido_usuario,
            'correo_usuario' => $objeto->correo_usuario,
            'foto_usuario' => '../vista/assets/img/perfil_us/' . $objeto->foto_usuario,
        );
    }
    //Se convierte el array a formato JSON y se devuelve como respuesta 
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
/*FIN FUNCION PARA LISTAR LOS CLIENTES DE LA BASE DE DATOS*/

/*FUNCION PARA LISTAR LOS ROLES EN EL MODAL DE AGREGAR PRODUCTOS*/
if ($_POST['funcion'] == 'rol_usuario') {
    $json = array();
    $usuario->rol_usuario();
    foreach ($usuario->objetos as $objeto) {
         // Se recorre el array de objetos de usuario y se crea un nuevo array asociativo para cada rol
        $json[] = array(
            'id_rol' => $objeto->id_rol,
            'nombre_rol' => $objeto->nombre_rol,
        );
    }
     //Se convierte el array a formato JSON y se devuelve como respuesta
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
/*FIN FUNCION PARA LISTAR LOS ROLES EN EL MODAL DE AGREGAR PRODUCTOS*/

//crear usuario
if ($_POST['funcion'] == 'crear_usuario') {

    $nombre_usuario = $_POST['nombre_usuario'];
    $apellido_usuario = $_POST['apellido_usuario'];
    $correo_electronico_usuario = $_POST['correo_electronico_usuario'];
    $password_usuario = $_POST['password_usuario'];
    $hashed_password = password_hash($password_usuario, PASSWORD_DEFAULT);

    //imagen varchar guardar
    $nombre_foto = $_FILES['foto_usuario']['name'];
    // Verificamos si se proporcionó un archivo y no hubo errores durante la carga
    if (isset($_FILES['foto_usuario']) && $_FILES['foto_usuario']['error'] == UPLOAD_ERR_OK) {
        // Definimos los tipos de imágenes permitidos
        $allowed_image_types = array('image/png', 'image/jpeg', 'image/gif', 'image/jpg');

        // Verificamos si el tipo de archivo está permitido
        if (in_array($_FILES['foto_usuario']['type'], $allowed_image_types)) {
            // Creamos un nombre único para el archivo utilizando el nombre del usuario, un identificador único y el nombre original del archivo
            $nombre_foto =  $nombre_usuario . uniqid() . '-' . $_FILES['foto_usuario']['name'];
        } else {
            // Si el tipo de archivo no está permitido, mostramos un mensaje de error y salimos del script
            echo "Tipo de archivo no permitido.";
            exit;
        }

        // Definimos la ruta donde se almacenará el archivo
        $ruta = '../vista/assets/img/perfil_us/' . $nombre_foto;

        // Movemos el archivo desde la ubicación temporal a la ruta especificada
        move_uploaded_file($_FILES['foto_usuario']['tmp_name'], $ruta);

        // Asignamos el nombre único del archivo a la variable $foto_usuario
        $foto_usuario = $nombre_foto;
    } else {
        // Si no se proporcionó ningún archivo, mostramos un mensaje de error y salimos del script
        $foto_usuario = "default.png";
    }


    $rol_usuario = $_POST['rol_usuario'];

    $usuario->crear_usuario(
        $nombre_usuario,
        $apellido_usuario,
        $correo_electronico_usuario,
        $hashed_password,
        $foto_usuario,
        $rol_usuario
    );
}
// Cargar Inventario
if ($_POST['funcion'] == 'cargar_usuario') {
    $json = array();
    $id_usuario = $_POST['id_usuario'];
    $usuario->cargar_usuario($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre_usuario' => $objeto->nombre_usuario,
            'apellido_usuario' => $objeto->apellido_usuario,
            'correo_usuario' => $objeto->correo_usuario,
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
        $correo_usuarioe = $_POST['correo_usuarioe'];
        $usuario->editar_usuario($id_usuarioe, $nombrese, $apellidose,$correo_usuarioe);
    } catch (Exception $e) {
        echo 'error';
    }
}

//eliminar usuario
if ($_POST['funcion'] == 'borrar_usuario') {
    $id_usuario = $_POST['id_usuario'];
    $usuario->borrar_usuario($id_usuario);
}
