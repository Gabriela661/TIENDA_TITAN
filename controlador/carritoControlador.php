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
            'id_carrito' => $objeto->id_carrito,
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
    $id_carrito = $_POST['id_carrito'];
    $cantidad_carrito = $_POST['cantidad_carrito'];
    $carrito->actualizar_carrito($id_carrito, $cantidad_carrito);
}
/* 
 * FIN FUNCION PARA ACTUALIZAR EL CARRITO
 */

/* 
 * FUNCION PARA LIMPIAR EL  CARRITO
 */
if ($_POST['funcion'] == 'limpiarCarrito') {
    $id_usuario = $_POST['id_usuario'];
    $carrito->limpiarCarrito($id_usuario);
}
/* 
 * FIN FUNCION PARA LIMPIAR EL  CARRITO
 */

/* 
 * FUNCION PARA LIMPIAR UN PRODUCTO DEL CARRITO
 */
if ($_POST['funcion'] == 'limpiarProductoCarrito') {
    $id_carrito = $_POST['id_carrito'];
    $carrito->limpiarProductoCarrito($id_carrito);
}
/* 
 * FIN FUNCION PARA LIMPIAR UN PRODUCTO DEL CARRITO
 */

/* 
 * FUNCION PARA VERIFICAR STOCK
 */
if ($_POST['funcion'] == 'verificarStock') {

    $carrito->verificarStock();
}
/* 
 * FIN FUNCION PARA OBTENER LA CANTIDAD DE PAGINAS
 */
