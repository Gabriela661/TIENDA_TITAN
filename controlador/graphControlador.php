<?php
//instancias la clase
include_once '../modelo/graphModelo.php';
$graph = new graph();

//mostrar 
if ($_POST['funcion'] == 'venta_producto_categorias') {
    $json = array();
    $graph->venta_producto_categorias();
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'categoria' => $objeto->categoria,
            'cantidad_ventas' => $objeto->cantidad_ventas,
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
