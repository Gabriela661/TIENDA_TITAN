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

'id_carrito' => $objeto->id_carrito,
'cantidad_carrito' => $objeto->cantidad_carrito,
'id_producto' => $objeto->id_producto,
'nombre_producto' => $objeto->nombre_producto,
'precio_producto' => $objeto->precio_producto,
'subtotal' => $objeto->subtotal,
);
}
$jsonstring = json_encode($json);
echo $jsonstring;
}
/*
* FIN FUNCION PARA CARGAR EL CARRITO AL MODAL
*/
/* 
 * FUNCION PARA GUARDAR LA VENTA EN EL CARRITO
 */
if ($_POST['funcion'] == 'registrar_venta') {
    $id_usuario = $_POST['id_usuario'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $ruc = $_POST['ruc'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $metodo = $_POST['metodo'];
    $productosPago->registrar_venta($id_usuario, $metodo, $nombre_cliente, $telefono, $ruc, $direccion);
}
/* 
 * FIN FUNCION PARA GUARDAR LA VENTA EN EL CARRITO
 */