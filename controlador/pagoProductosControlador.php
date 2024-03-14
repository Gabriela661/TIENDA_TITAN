<?php
// Se incluye el archivo que contiene la definición de la clase 'categoria'
include_once '../modelo/carritoModelo.php';


$carrito = new carrito();

/*
* FUNCION PARA CARGAR EL CARRITO AL MODAL
*/
if ($_POST['funcion'] == 'cargarCarrito') {
$json = array();
$carrito->cargarCarrito();
foreach ($carrito->objetos as $objeto) {

$json[] = array(
'id_producto' => $objeto->id_producto,
'id_carrito' => $objeto->id_carrito,
'cantidad_carrito' => $objeto->cantidad_carrito,
'total_valor_carrito' => $objeto->total_valor_carrito,
'nombre_producto' => $objeto->nombre_producto,
'precio_producto' => $objeto->precio_producto,
'stock_producto' => $objeto->stock_producto,
'imagen_producto' => 'vista/assets/img/' . strtolower($objeto->nombre_categoria) . '/' . $objeto->imagen_producto,
);
}
$jsonstring = json_encode($json);
echo $jsonstring;
}
/*
* FIN FUNCION PARA CARGAR EL CARRITO AL MODAL
*/