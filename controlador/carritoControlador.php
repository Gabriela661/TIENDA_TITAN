<?php
// Se incluye el archivo que contiene la definición de la clase 'categoria'
include_once '../modelo/carritoModelo.php';


$carrito = new carrito();

/* 
 * FUNCION PARA GUARDAR EL PRODUCTO EN EL CARRITO
 */
if ($_POST['funcion'] == 'añadir_carrito') {
    $id_producto = $_POST['id_producto'];
    $cantidad_carrito = $_POST['cantidad_carrito'];
    $id_usuario = $_POST['id_usuario']; 
    $carrito->añadir_carrito($id_producto, $cantidad_carrito, $id_usuario); 
}
/* 
 * FIN FUNCION PARA GUARDAR EL PRODUCTO EN EL CARRITO
 */
/* 
 * FUNCION PARA CARGAR EL CARRITO AL MODAL
 */
if ($_POST['funcion'] == 'cargarCarrito') {
    $json = array();
    $carrito->cargarCarrito();
    foreach ($carrito->objetos as $objeto) {

        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'cantidad_carrito' => $objeto->cantidad_carrito,
            'total_valor_carrito' => $objeto->total_valor_carrito,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'stock_producto' => $objeto->stock_producto,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->nombre_categoria) . '/' . $objeto->imagen_producto,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
/* 
 * FIN FUNCION PARA CARGAR EL CARRITO AL MODAL
 */
/* 
 * FUNCION VERIFICAR SI EL PRODUCTO EXISTE EN EL CARRITO
 */
if ($_POST['funcion'] == 'verificar_existencia_carrito') {

    $json = array();
    $carrito->verificar_existencia_carrito();
    foreach ($carrito->objetos as $objeto) {

        $json[] = array(
            'id_carrito' => $objeto->id_carrito,
            'cantidad' => $objeto->cantidad,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
/* 
 * FIN FUNCION VERIFICAR SI EL PRODUCTO EXISTE EN EL CARRITO
 */
/* 
 * FUNCION PARA ACTUALIZAR EL CARRITO
 */
if ($_POST['funcion'] == 'actualizar_carrito') {
    $id_producto = $_POST['id_producto'];
    $cantidad_carrito = $_POST['cantidad_carrito'];
    $carrito->actualizar_carrito($id_producto, $cantidad_carrito);
}
/* 
 * FIN FUNCION PARA ACTUALIZAR EL CARRITO
 */