<?php
//instancias la clase
include_once '../modelo/reporteUsuarioModelo.php';
$reporte_usuario = new reporte_usuario();

//mostrar inventario
if ($_POST['funcion'] == 'reporte_usuario') {
    $json = array();
    $reporte_usuario->reporte_usuario();
    foreach ($reporte_usuario->objetos as $objeto) {
        $json[] = array(
            'id_cliente' => $objeto->id_cliente,
            'id_usuario' => $objeto->id_usuario,
            'nombre_cliente' => $objeto->nombre_cliente,
            'apellido_cliente' => $objeto->apellido_cliente,
            'cantidad_compra' => $objeto->cantidad_compra,
            'total_compra' => $objeto->total_compra,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
