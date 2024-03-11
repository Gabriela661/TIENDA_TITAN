<?php
// Se incluye el archivo que contiene la definición de la clase 'categoria'
include_once '../modelo/carritoModelo.php';


$carrito = new carrito();

/* FUNCION PARA AGREGAR UNA NUEVA CATEGORIA  */
if ($_POST['funcion'] == 'añadir_carrito') {
    $id_producto = $_POST['id_producto'];
    $cantidad_carrito = $_POST['cantidad_carrito'];
    $id_usuario = $_POST['id_usuario']; 
    $carrito->añadir_carrito($id_producto, $cantidad_carrito, $id_usuario); 
}
