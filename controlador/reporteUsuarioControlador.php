<?php
//instancias la clase
include_once '../modelo/reporteUsuarioModelo.php';
$reporte_usuario = new reporte_usuario();

//mostrar vendedores
if ($_POST['funcion'] == 'reporte_usuario') {
    $json = array();
    $reporte_usuario->reporte_usuario();
    foreach ($reporte_usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre_usuario' => $objeto->nombre_usuario,
            'apellido_usuario' => $objeto->apellido_usuario,
            'cantidad_venta' => $objeto->cantidad_venta,
            'total_venta' => $objeto->total_venta,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//mostrar vendedores
if ($_POST['funcion'] == 'reporte_clientes') {
    $json = array();
    $reporte_usuario->reporte_clientes();
    foreach ($reporte_usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'id_cliente' => $objeto->id_cliente,
            'nombre_cliente' => $objeto->nombre_cliente,
            'apellido_cliente' => $objeto->apellido_cliente,
            'cantidad_compra' => $objeto->cantidad_compra,
            'total_compra' => $objeto->total_compra,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
