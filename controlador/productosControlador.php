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
            'descripcion_producto' => $objeto->descripcion_producto,
            'stock_producto' => $objeto->stock_producto,
            // 'imagen_producto' => 'vista/assets/img/inventario/' . $objeto->imagen_producto,
            'imagen_producto' => 'vista/assets/img/FIERRO_CORRUGADO2.jpg',
            'marca_producto' => $objeto->marca_producto,

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
            'imagen_producto' => 'vista/assets/img/inventario/' . $objeto->imagen_producto,
            'marca_producto' => $objeto->marca_producto,

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
