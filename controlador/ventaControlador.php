<?php
//instancias la clase
include_once '../modelo/ventaModelo.php';
$venta = new venta();

//mostrar inventario
if ($_POST['funcion'] == 'mostrar_venta') {
    $json = array();
    $venta->venta();
    foreach ($venta->objetos as $objeto) {
        $json[] = array(
            'id_venta' => $objeto->id_venta,
            'id_cliente' => $objeto->id_cliente,
            'total_venta' => $objeto->total_venta,
            'fecha' => $objeto->fecha,
            'id_usuario' => $objeto->id_usuario,
            'nombre_cliente' => $objeto->nombre_cliente,
            'nombre_tipo_pago' => $objeto->nombre_tipo_pago,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
