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
            'nombre' => $objeto->nombre,
            'precio' => $objeto->precio,
            'descripcion_producto' => $objeto->descripcion_producto,
            'cantidad' => $objeto->cantidad,
            'imagen_producto' => '../vista/assets/img/inventario/'.$objeto->imagen_producto,
            'marca_producto' => $objeto->marca_producto,
            'categoria_designada' => $objeto->categoria_designada,
            'nombre_categoria' => $objeto->nombre_categoria,
            //'contrato_trab' => '../assets/img/contratos/' . $objeto->contrato_trab,
            
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//registrar producto
if ($_POST['funcion'] == 'crear_producto') {

    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $marca_producto = $_POST['marca_producto'];
    $categoria_producto = $_POST['categoria_producto'];

    //imagen varchar guardar
   $nombre_inventario = $_FILES['imagen_producto']['name'];
    if (isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['error'] == UPLOAD_ERR_OK) {
       $allowed_image_types = array('image/png', 'image/jpeg', 'image/gif', 'image/jpg');
        
        
        if (in_array($_FILES['imagen_producto']['type'], $allowed_image_types)) {
           $nombre_inventario =  $marca_producto . uniqid() . '-' . $_FILES['imagen_producto']['name'];
        } else {
           echo "Tipo de archivo no permitido.";
            exit;
        }
        $ruta = '../vista/assets/img/inventario/' . $nombre_inventario;
        move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $ruta);
        $imagen_producto = $nombre_inventario;
    } else {
       echo "No se proporcionó ninguna imagen o documento.";
    exit;
    }
    $inventario->crear_producto($nombre_producto,
    $precio_producto,
    $descripcion_producto,
    $cantidad_producto,
    $marca_producto,
    $categoria_producto,
    $imagen_producto);
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
            'nombre' => $objeto->nombre,
            'precio' => $objeto->precio,
            'descripcion_producto' => $objeto->descripcion_producto,
            'cantidad' => $objeto->cantidad,
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