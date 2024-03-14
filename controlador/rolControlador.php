<?php
//instancias la clase
include_once '../modelo/rolModelo.php';
$rol = new rol();

//listar
if ($_POST['funcion'] == 'roles') {
    $json = array();
    $rol->roles();
    foreach ($rol->objetos as $objeto) {
        $json[] = array(
            'id_rol' => $objeto->id_rol,
            'nombre_rol' => $objeto->nombre_rol,
            'nombre_usuario' => $objeto->nombre_usuario,
            'apellido_usuario' => $objeto->apellido_usuario,
            'id_usuario' => $objeto->id_usuario,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//listar
if ($_POST['funcion'] == 'listar_roles') {
    $json = array();
    $rol->listar_roles();
    foreach ($rol->objetos as $objeto) {
        $json[] = array(
            'id_rol' => $objeto->id_rol,
            'nombre_rol' => $objeto->nombre_rol,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}


// Cargar 
if ($_POST['funcion'] == 'cargar_rol') {
    $json = array();
    $id_rol = $_POST['id_rol'];
    $rol->cargar_rol($id_rol);
    foreach ($rol->objetos as $objeto) {
        $json[] = array(
            'id_rol' => $objeto->id_rol,
            'nombre_rol' => $objeto->nombre_rol,
            'id_usuario' => $objeto->id_usuario,
            'nombre_usuario' => $objeto->nombre_usuario,
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
// Editar
if ($_POST['funcion'] == 'editar_rol') {
    try {
        $nuevo_id_rol = $_POST['nuevo_id_rol'];
        $id_usuario = $_POST['id_usuario'];
        $rol->editar_rol($nuevo_id_rol, $id_usuario);
        // echo $id_categoriae;
        // echo $nombre_categoriae;
    } catch (Exception $e) {
        echo 'error';
    }
}
