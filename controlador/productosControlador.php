<?php
//instancias la clase
include_once '../modelo/productosModelo.php';
$productos = new productos();

//funcion para mostrar los productos mas vendidos
if ($_POST['funcion'] == 'ListarMasVendidos') {
    $json = array();
    $productos->ListarMasVendidos();
    foreach ($productos->objetos as $objeto) {

        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->categoria_producto) . '/' . $objeto->imagen_producto,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//mostrar los prodcutos en la tienda
if ($_POST['funcion'] == 'productosTienda') {
    $json = array();
    $productos->productosTienda();
    foreach ($productos->objetos as $objeto) {

        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'descripcion_producto' => $objeto->descripcion_producto,
            'stock_producto' => $objeto->stock_producto,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->categoria_producto) . '/' . $objeto->imagen_producto,
            'marca_producto' => $objeto->marca_producto,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

/* FUNCION PARA LISTAR LA CATEGORIA  */
if ($_POST['funcion'] == 'listarCategoriaTienda') {
    $json = array();
    $productos->listarCategoriaTienda(); // Se llama al método 'listarCategoria()' del objeto '$categoria' para obtener las categorías desde la base de datos
    foreach ($productos->objetos as $objeto) {
        // Se recorre el array de objetos de categorías y se crea un nuevo array asociativo para cada categoría
        $json[] = array(
            'id_categoria' => $objeto->id_categoria,
            'nombre_categoria' => $objeto->nombre_categoria,
        );
    }
    $jsonstring = json_encode($json); // Se convierte el array de categorías a formato JSON
    echo $jsonstring; // Se devuelve el JSON como respuesta al cliente
}
/* FIN FUNCION PARA LISTAR LA CATEGORIA  */

//Detallar el producto
if ($_POST['funcion'] == 'detalleProducto') {
    $id_producto = $_POST['idProducto'];

    $json = array();
    $productos->detalleProducto($id_producto);
    foreach ($productos->objetos as $objeto) {
        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'descripcion_producto' => $objeto->descripcion_producto,
            'stock_producto' => $objeto->stock_producto,
            'categoria_producto' => $objeto->categoria_producto,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->categoria_producto) . '/' . $objeto->imagen_producto,
            'marca_producto' => $objeto->marca_producto,

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}