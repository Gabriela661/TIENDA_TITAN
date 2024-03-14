<?php
// Se incluye el archivo que contiene la definición de la clase 'categoria'
include_once '../modelo/pagoProductosModelo.php';

$productosPago = new productosPago();

/*
* FUNCION PARA CARGAR EL CARRITO AL MODAL
*/
if ($_POST['funcion'] == 'cargarProductosPago') {
$json = array();
    $productosPago->cargarProductosPago();
foreach ($productosPago->objetos as $objeto) {

$json[] = array(
'id_producto' => $objeto->id_producto,
'id_carrito' => $objeto->id_carrito,
'cantidad_carrito' => $objeto->cantidad_carrito,
'subtotal' => $objeto->subtotal,
'nombre_producto' => $objeto->nombre_producto,
'precio_producto' => $objeto->precio_producto,
'stock_producto' => $objeto->stock_producto,
);
}
$jsonstring = json_encode($json);
echo $jsonstring;
}
/*
* FIN FUNCION PARA CARGAR EL CARRITO AL MODAL
*/