<?php
include_once '../modelo/cajaModelo.php';
// Se instancia la clase 'usuario'
$caja = new caja();

/* FUNCION PARA LISTAR INGRESOS DE LA BASE DE DATOS*/
if ($_POST['funcion'] == 'listarIngresos') {
    $json = array();
    // Se llama al método listarIngresos() del objeto '$caja' 
    $caja->listarIngresos();
    foreach ($caja->objetos as $objeto) {
        // Se recorre el array de objetos de caja y se crea un nuevo array asociativo para cada ingreso
        $json[] = array(
            'id_caja' => $objeto->id_caja,
            'concepto' => $objeto->concepto,
            'accion' => $objeto->accion,
            'monto' => $objeto->monto,
            'created_at' => $objeto->created_at,
        );
    }
    //Se convierte el array a formato JSON y se devuelve como respuesta 
    $jsonstring = json_encode($json);
    echo $jsonstring; //Se devuelve el JSON como respuesta 
}

if ($_POST['funcion'] == 'listar') {
    $json = array();
    // Se llama al método listarIngresos() del objeto '$caja'
    $id_caja = $_POST['id_caja'];
    $caja->listar($id_caja);
    foreach ($caja->objetos as $objeto) {
        // Se recorre el array de objetos de caja y se crea un nuevo array asociativo para cada ingreso
        $json[] = array(
            'id_caja' => $objeto->id_caja,
            'concepto' => $objeto->concepto,
            'accion' => $objeto->accion,
            'monto' => $objeto->monto,
            'created_at' => $objeto->created_at,
        );
    }
    //Se convierte el array a formato JSON y se devuelve como respuesta 
    $jsonstring = json_encode($json[0]);
    echo $jsonstring; //Se devuelve el JSON como respuesta 
}
/*FIN FUNCION PARA LISTAR LOS INGRESOS DE LA BASE DE DATOS*/

/* FUNCION PARA LISTAR EL PERSONAL DE LA BASE DE DATOS*/
if ($_POST['funcion'] == 'listarEgresos') {
    $json = array();
    // Se llama al método listarEgresos() del objeto '$caja' 
    $caja->listarEgresos();
    foreach ($caja->objetos as $objeto) {
        // Se recorre el array de objetos de caja y se crea un nuevo array asociativo para cada egreso
        $json[] = array(
            'id_caja' => $objeto->id_caja,
            'concepto' => $objeto->concepto,
            'accion' => $objeto->accion,
            'monto' => $objeto->monto,
            'created_at' => $objeto->created_at,
        );
    }
    //Se convierte el array a formato JSON y se devuelve como respuesta 
    $jsonstring = json_encode($json);
    echo $jsonstring; //Se devuelve el JSON como respuesta 
}
/*FIN FUNCION PARA LISTAR LOS INGRESOS DE LA BASE DE DATOS*/

//crear caja movement
if ($_POST['funcion'] == 'crear_caja') {

    $accion = $_POST['action'];
    $monto = $_POST['monto'];
    $concepto = $_POST['concepto'];
    $id_usuario = 1;
    /* $id_usuario = $_POST['id_usuario']; cuando haya session tomar el id del usuario */

    $caja->crear_caja(
        $accion,
        $monto,
        $concepto,
        $id_usuario
    );
}

//Editar usuario
if ($_POST['funcion'] == 'editar_caja') {
    try {
        $id_caja = $_POST['id_cajae'];
        $concepto = $_POST['conceptoe'];
        $accion = $_POST['actione'];
        $monto = $_POST['montoe'];
        $id_usuario = 1;
        /* $id_usuario = $_POST['id_usuario']; cuando haya session tomar el id del usuario */
        $caja->editar_caja($id_caja, $concepto, $accion, $monto, $id_usuario);
    } catch (Exception $e) {
        echo 'error';
    }
}

//eliminar usuario
if ($_POST['funcion'] == 'borrar_caja') {
    try {
        $id_caja = $_POST['id_caja'];
        $caja->borrar_caja($id_caja);
    } catch (Exception $e) {
        echo 'error controller';
    }
}
