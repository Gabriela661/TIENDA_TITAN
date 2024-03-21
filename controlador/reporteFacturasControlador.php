<?php
//instancias la clase
include_once '../modelo/reporteFacturasModelo.php';
$reporte_facturas = new reporte_facturas();

//mostrar facturas
if ($_POST['funcion'] == 'reporte_facturas') {
    $json = array();
    $reporte_facturas->reporte_facturas();
    foreach ($reporte_facturas->objetos as $objeto) {
        $json[] = array(
            'id_venta' => $objeto->id_venta,
            'nombre_tipo_pago' => $objeto->nombre_tipo_pago,
            'id_usuario' => $objeto->id_usuario,
            'id_cliente' => $objeto->id_cliente,
            'nombre_cliente' => $objeto->nombre_cliente,
            'total_venta' => $objeto->total_venta,
            'fecha' => $objeto->fecha,
            'url_factura' => $objeto->url_factura,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//mostrar facturas del día
if ($_POST['funcion'] == 'dia_facturas') {
    $json = array();
    /* $dia_facturas->dia_facturas($dia); */
    $reporte_facturas->dia_facturas();
    foreach ($reporte_facturas->objetos as $objeto) {
        $json[] = array(
            'id_venta' => $objeto->id_venta,
            'id_usuario' => $objeto->id_usuario,
            'id_cliente' => $objeto->id_cliente,
            'nombre_tipo_pago' => $objeto->nombre_tipo_pago,
            'nombre_cliente' => $objeto->nombre_cliente,
            'total_venta' => $objeto->total_venta,
            'fecha' => $objeto->fecha,
            'total_venta' => $objeto->total_venta,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//mostrar facturas del mes
if ($_POST['funcion'] == 'mes_facturas') {
    $json = array();
    /* $dia_facturas->dia_facturas($dia); */
    $reporte_facturas->mes_facturas();
    foreach ($reporte_facturas->objetos as $objeto) {
        $json[] = array(
            'id_venta' => $objeto->id_venta,
            'id_usuario' => $objeto->id_usuario,
            'id_cliente' => $objeto->id_cliente,
            'nombre_tipo_pago' => $objeto->nombre_tipo_pago,
            'nombre_cliente' => $objeto->nombre_cliente,
            'total_venta' => $objeto->total_venta,
            'fecha' => $objeto->fecha,
            'total_venta' => $objeto->total_venta,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
//mostrar facturas entre fechas
if ($_POST['funcion'] == 'fechas_facturas') {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $json = array();
    /* $dia_facturas->dia_facturas($dia); */
    $reporte_facturas->fechas_facturas($fechaInicio, $fechaFin);
    foreach ($reporte_facturas->objetos as $objeto) {
        $json[] = array(
            'id_venta' => $objeto->id_venta,
            'id_usuario' => $objeto->id_usuario,
            'id_cliente' => $objeto->id_cliente,
            'nombre_tipo_pago' => $objeto->nombre_tipo_pago,
            'nombre_cliente' => $objeto->nombre_cliente,
            'total_venta' => $objeto->total_venta,
            'fecha' => $objeto->fecha,
            'total_venta' => $objeto->total_venta,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
