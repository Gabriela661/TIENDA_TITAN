<?php
//instancias la clase
include_once '../modelo/reporteProductosModelo.php';
$reporte_productos = new reporte_productos();

//mostrar facturas
if ($_POST['funcion'] == 'reporte_productos') {
    $json = array();
    $reporte_productos->reporte_productos();
    foreach ($reporte_productos->objetos as $objeto) {
        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'fecha' => $objeto->fecha,
            'id_venta' => $objeto->id_venta,
            'nombre_cliente' => $objeto->nombre_cliente,
            'cantidad_total' => $objeto->cantidad_total,
            'precio_producto' => $objeto->precio_unitario,
            'monto_total' => $objeto->monto_total,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//mostrar facturas del día
if ($_POST['funcion'] == 'dia_producto') {
    $json = array();
    /* $dia_facturas->dia_facturas($dia); */
    $reporte_productos->dia_producto();
    foreach ($reporte_productos->objetos as $objeto) {
        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'total_vendido' => $objeto->total_vendido,
            'monto_total' => $objeto->monto_total,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//mostrar facturas del mes
if ($_POST['funcion'] == 'mes_producto') {
    $json = array();
    /* $dia_facturas->dia_facturas($dia); */
    $reporte_productos->mes_producto();
    foreach ($reporte_productos->objetos as $objeto) {
        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'total_vendido' => $objeto->total_vendido,
            'monto_total' => $objeto->monto_total,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
//mostrar facturas entre fechas
if ($_POST['funcion'] == 'fechas_productos') {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $json = array();
    /* $dia_facturas->dia_facturas($dia); */
    $reporte_productos->fechas_productos($fechaInicio, $fechaFin);
    foreach ($reporte_productos->objetos as $objeto) {
        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'total_vendido' => $objeto->total_vendido,
            'monto_total' => $objeto->monto_total,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
