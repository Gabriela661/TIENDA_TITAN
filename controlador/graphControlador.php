<?php
//instancias la clase
include_once '../modelo/graphModelo.php';
$graph = new graph();

//mostrar facturas
if ($_POST['funcion'] == 'reporte_facturas') {
    $json = array();
    $reporte_facturas->reporte_facturas();
    foreach ($reporte_facturas->objetos as $objeto) {
        $json[] = array(
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
            'fecha' => $objeto->fecha,
            'monto_total' => $objeto->monto_total,
            'productos_cantidades' => $objeto->productos_cantidades
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
            'mes' => $objeto->mes,
            'monto_total' => $objeto->monto_total,
            'productos_cantidades' => $objeto->productos_cantidades
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
//mostrar facturas entre fechas
if ($_POST['funcion'] == 'fechas_graph3') {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $json = array();
    /* $dia_facturas->dia_facturas($dia); */
    $graph->fechas_graph3($fechaInicio, $fechaFin);
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'fecha' => $objeto->fecha,
            'monto_total' => $objeto->monto_total,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
