<?php
//instancias la clase
include_once '../modelo/inventarioModelo.php';
$inventario = new inventario();

//mostrar inventario
if ($_POST['funcion'] == 'inventario') {
    $json = array();
    $inventario->inventario();
    foreach ($inventario->objetos as $objeto) {

        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'descripcion_producto' => $objeto->descripcion_producto,
            'stock_producto' => $objeto->stock_producto,
            'url_imagenes' => $objeto->url_imagenes,
            'marca_producto' => $objeto->marca_producto,
            'nombre_categoria' => $objeto->nombre_categoria,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//registrar producto
if ($_POST['funcion'] == 'crear_producto') {

    $codigo_producto = $_POST['codigo_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $marca_producto = $_POST['marca_producto'];
    $categoria_producto = $_POST['categoria_producto'];
    $categoria_text = $_POST['categoria_text'];

    //imagen 1 varchar guardar
    $nombre_inventario = '';
    $imagen_producto1 = '';
    $imagen_producto2 = '';
    $imagen_producto3 = '';
    $imagen_producto4 = '';

    $categoria_text = strtolower($categoria_text);

    if (isset($_FILES['imagen_producto_principal']) && $_FILES['imagen_producto_principal']['error'] == UPLOAD_ERR_OK) {

        $nombre_inventario =  $marca_producto . uniqid() . '-' . $_FILES['imagen_producto_principal']['name'];

        $ruta = '../vista/assets/img/' . $categoria_text . '/' . $nombre_inventario;
        move_uploaded_file($_FILES['imagen_producto_principal']['tmp_name'], $ruta);
        $imagen_producto1 = $nombre_inventario;
    }
    //imagen 2 varchar guardar
    if (isset($_FILES['imagen_producto_s1']) && $_FILES['imagen_producto_s1']['error'] == UPLOAD_ERR_OK) {

        $nombre_inventario =  $marca_producto . uniqid() . '-' . $_FILES['imagen_producto_s1']['name'];

        $ruta = '../vista/assets/img/' . $categoria_text . '/' . $nombre_inventario;
        move_uploaded_file($_FILES['imagen_producto_s1']['tmp_name'], $ruta);
        $imagen_producto2 = $nombre_inventario;
    }
    //imagen 3 varchar guardar
    if (isset($_FILES['imagen_producto_s2']) && $_FILES['imagen_producto_s2']['error'] == UPLOAD_ERR_OK) {

        $nombre_inventario =  $marca_producto . uniqid() . '-' . $_FILES['imagen_producto_s2']['name'];

        $ruta = '../vista/assets/img/' . $categoria_text . '/' . $nombre_inventario;
        move_uploaded_file($_FILES['imagen_producto_s2']['tmp_name'], $ruta);
        $imagen_producto3 = $nombre_inventario;
    }
    //imagen 4 varchar guardar
    if (isset($_FILES['
    ']) && $_FILES['imagen_producto_s3']['error'] == UPLOAD_ERR_OK) {

        $nombre_inventario =  $marca_producto . uniqid() . '-' . $_FILES['imagen_producto_s3']['name'];

        $ruta = '../vista/assets/img/' . $categoria_text . '/' . $nombre_inventario;
        move_uploaded_file($_FILES['imagen_producto_s3']['tmp_name'], $ruta);
        $imagen_producto4 = $nombre_inventario;
    }
    
    $inventario->crear_producto(
        $codigo_producto,
        $nombre_producto,
        $precio_producto,
        $descripcion_producto,
        $cantidad_producto,
        $marca_producto,
        $categoria_producto,
        $imagen_producto1,
        $imagen_producto2,
        $imagen_producto3,
        $imagen_producto4
    );
}

//listar categoria
if ($_POST['funcion'] == 'listar_categoria') {
    $json = array();
    $inventario->listar_categoria();
    foreach ($inventario->objetos as $objeto) {
        $json[] = array(
            'id_categoria' => $objeto->id_categoria,
            'nombre_categoria' => $objeto->nombre_categoria,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

// Cargar Inventario
if ($_POST['funcion'] == 'cargar_inventario') {
    $json = array();
    $id_producto = $_POST['id_producto'];
    $inventario->cargar_inventario($id_producto);
    foreach ($inventario->objetos as $objeto) {
        $json[] = array(
            'id_producto' => $objeto->id_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'precio_producto' => $objeto->precio_producto,
            'descripcion_producto' => $objeto->descripcion_producto,
            'stock_producto' => $objeto->stock_producto,
            'marca_producto' => $objeto->marca_producto,

        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

// Editar inventario
if ($_POST['funcion'] == 'editar_inventario') {
    try {
        $id_productoe = $_POST['id_productoe'];
        $nombre_productoe = $_POST['nombre_productoe'];
        $precio_productoe = $_POST['precio_productoe'];
        $descripcion_productoe = $_POST['descripcion_productoe'];
        $cantidad_productoe = $_POST['cantidad_productoe'];
        $marca_productoe = $_POST['marca_productoe'];
        $inventario->editar_inventario($id_productoe, $nombre_productoe, $precio_productoe, $descripcion_productoe, $cantidad_productoe, $marca_productoe);
        // echo $id_categoriae;
        // echo $nombre_categoriae;
    } catch (Exception $e) {
        echo 'error';
    }
}

//eliminar inventario
if ($_POST['funcion'] == 'borrar_producto') {
    $id_producto_eliminar = $_POST['id_producto_eliminar'];
    $inventario->borrar_producto($id_producto_eliminar);
}
// Actualizar stock
if ($_POST['funcion'] == 'actualizarStock') {
    try {

        $stockJSON = $_POST['stockJSON'];
        $stock = json_decode($stockJSON, true);
        foreach ($stock as $producto) {
            // Aquí puedes llamar a la función actualizarStock y pasar los datos de cada producto
            $inventario->actualizarStock($producto['id_product'], $producto['cantidad']);
        }
    } catch (Exception $e) {
        echo 'error';
    }
}
