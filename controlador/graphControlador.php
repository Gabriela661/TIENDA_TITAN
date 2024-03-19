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

if ($_POST['funcion'] == 'usuarioTotal') {
    $json = array();
    $graph->usuarioTotal();
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'totaluser' => $objeto->totaluser,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'productoTotal') {
    $json = array();
    $graph->productoTotal();
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'productot' => $objeto->productot,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'categoriasTotal') {
    $json = array();
    $graph->categoriasTotal();
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'cateffa' => $objeto->cateffa,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'ingresosTotal') {
    $json = array();
    $graph->ingresosTotal();
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'ingrestot' => $objeto->ingrestot,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'semanaComparar') {
    $json = array();
    $graph->semanaComparar();
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'fecha' => $objeto->fecha,
            'monto_total' => $objeto->monto_total,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'usuario_venta') {
    $json = array();
    $graph->usuario_venta();
    foreach ($graph->objetos as $objeto) {
        $json[] = array(
            'nombre_usuario' => $objeto->nombre_usuario,
            'total' => $objeto->total,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
