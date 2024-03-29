<?php
//instancias la clase
include_once '../modelo/productosModelo.php';
$productos = new productos();

/* 
 * FUNCION PARA LISTAR LA CATEGORIA  
 */
if ($_POST['funcion'] == 'listarCategoriaIndex') {
    $json = array();
    $productos->listarCategoriaIndex(); // Se llama al método 'listarCategoria()' del objeto '$categoria' para obtener las categorías desde la base de datos
    foreach ($productos->objetos as $objeto) {
        // Se recorre el array de objetos de categorías y se crea un nuevo array asociativo para cada categoría
        $json[] = array(
            'id_categoria' => $objeto->id_categoria,
            'nombre_categoria' => $objeto->nombre_categoria,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->nombre_categoria) . '/' . $objeto->imagen,
        );
    }
    $jsonstring = json_encode($json); // Se convierte el array de categorías a formato JSON
    echo $jsonstring; // Se devuelve el JSON como respuesta al cliente
}
/* 
 * FIN FUNCION PARA LISTAR LA CATEGORIA  
 */

/* 
 * FUNCION PARA LISTAR LOS PRODUCTOS MÁS VENDIDOS
 */
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
/* 
 * FIN FUNCION PARA LISTAR LOS PRODUCTOS MÁS VENDIDOS
 */

/* 
 * FUNCION PARA MOSTRAR LOS PRODUCTOS EN LA TIENDA
 */
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
/* 
 * FIN FUNCION PARA MOSTRAR LOS PRODUCTOS EN LA TIENDA
 */

/* 
 * FUNCION PARA LISTAR LA CATEGORIA EN LA TIENDA
 */
if ($_POST['funcion'] == 'listarCategoriaTienda') {
    $json = array();
    $productos->listarCategoriaTienda(); // Se llama al método 'listarCategoria()' del objeto '$categoria' para obtener las categorías desde la base de datos
    foreach ($productos->objetos as $objeto) {
        // Se recorre el array de objetos de categorías y se crea un nuevo array asociativo para cada categoría
        $json[] = array(
            'id_categoria' => $objeto->id_categoria,
            'nombre_categoria' => $objeto->nombre_categoria,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->nombre_categoria) . '/' . $objeto->imagen,
        );
    }
    $jsonstring = json_encode($json); // Se convierte el array de categorías a formato JSON
    echo $jsonstring; // Se devuelve el JSON como respuesta al cliente
}
/* 
 * FIN FUNCION PARA LISTAR LA CATEGORIA EN LA TIENDA
 */

/* 
 * FUNCION PARA LISTAR LA CATEGORIA EN LA TIENDA EN EL HEADER
 */
if ($_POST['funcion'] == 'listarCategoriaTiendaheader') {
    $json = array();
    $productos->listarCategoriaTiendaheader(); // Se llama al método 'listarCategoria()' del objeto '$categoria' para obtener las categorías desde la base de datos
    foreach ($productos->objetos as $objeto) {
        // Se recorre el array de objetos de categorías y se crea un nuevo array asociativo para cada categoría
        $json[] = array(
            'id_categoria' => $objeto->id_categoria,
            'nombre_categoria' => $objeto->nombre_categoria,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->nombre_categoria) . '/' . $objeto->imagen,
            'cantidad_productos' =>  $objeto->cantidad_productos,
        );
    }
    $jsonstring = json_encode($json); // Se convierte el array de categorías a formato JSON
    echo $jsonstring; // Se devuelve el JSON como respuesta al cliente
}
/* 
 * FIN FUNCION PARA LISTAR LA CATEGORIA EN LA TIENDA
 */

/* 
 * FUNCION PARA DETALLAR UN PRODUCTO
 */

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
            'url_imagenes' => $objeto->url_imagenes,
            'marca_producto' => $objeto->marca_producto,

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
/* 
 * FIN FUNCION PARA DETALLAR UN PRODUCTO
 */

/* 
 * FUNCION PARA MOSTRAR LOS PRODUCTOS BUSCADOS
 */
if ($_POST['funcion'] == 'busquedaProductos') {
    $json = array();
    $productos->busquedaProductos();
    foreach ($productos->objetos as $objeto) {
        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->categoria_producto) . '/' . $objeto->imagen_producto,
            'marca_producto' => $objeto->marca_producto,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
/* 
 * FIN FUNCION  PARA MOSTRAR LOS PRODUCTOS BUSCADOS
 */

/* 
 * FUNCION PARA OBTENER LA CANTIDAD DE PAGINAS
 */
if ($_POST['funcion'] == 'CantidadPaginas') {

    $productos->CantidadPaginas();
}
/* 
 * FIN FUNCION PARA OBTENER LA CANTIDAD DE PAGINAS
 */
/* 
 * FUNCION PARA OBTENER EL NUMERO DE LA FACTURA
 */
if ($_POST['funcion'] == 'obtenerNumeroFactura') {

    $productos->obtenerNumeroFactura();
}
/* 
 * FIN FUNCION PARA OBTENER EL NUMERO DE LA FACTURA
 */

/* 
 * FUNCION PARA LISTAR LOS PRODUCTOS SIMILARES
 */
if ($_POST['funcion'] == 'productosSimilares') {
    $json = array();
    $productos->productosSimilares();
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
/* 
 * FIN FUNCION PARA LISTAR LOS PRODUCTOS SIMILARES
 */

/* 
 * FUNCION PARA LISTAR LOS PRODUCTOS SIMILARES
 */
if ($_POST['funcion'] == 'mostrarOfertas') {
    $json = array();
    $productos->mostrarOfertas();
    foreach ($productos->objetos as $objeto) {

        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'precio_descuento' => $objeto->precio_descuento,
            'descuento' => $objeto->descuento,
            'descripcion_producto' => $objeto->descripcion_producto,
            'stock_producto' => $objeto->stock_producto,
            'imagen_producto' => 'vista/assets/img/' .  strtolower($objeto->categoria_producto) . '/' . $objeto->imagen_producto,
            'marca_producto' => $objeto->marca_producto,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
/* 
 * FIN FUNCION PARA LISTAR LOS PRODUCTOS SIMILARES
 */