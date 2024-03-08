<?php
// Se incluye el archivo que contiene la definición de la clase 'categoria'
include_once '../modelo/categoriaModelo.php';

// Se instancia la clase 'categoria'
$categoria = new categoria();

/* FUNCION PARA LISTAR LA CATEGORIA  */
if ($_POST['funcion'] == 'listarCategoria') {
    $json = array(); // Se inicializa un array para almacenar los datos de las categorías
    $categoria->listarCategoria(); // Se llama al método 'listarCategoria()' del objeto '$categoria' para obtener las categorías desde la base de datos
    foreach ($categoria->objetos as $objeto) {
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


/* FUNCION PARA AGREGAR UNA NUEVA CATEGORIA  */
if ($_POST['funcion'] == 'crear_categoria') {
    $nombre_categoria = $_POST['nombre_categoria']; // Se obtiene el nombre de la categoría desde la solicitud POST
    $categoria->crear_categoria($nombre_categoria); // Se llama al método 'crear_categoria()' del objeto '$categoria' para crear la categoría en la base de datos
}
/* FIN FUNCION PARA AGREGAR UNA NUEVA CATEGORIA  */


/* FUNCION PARA CARGAR DATOS AL FORMULARIO DE EDICIÓN  */
if ($_POST['funcion'] == 'cargar_categoria') {
    $json = array();
    $id_categoria = $_POST['id_categoria']; // Se obtiene el ID de la categoría desde la solicitud POST
    $categoria->cargar_categoria($id_categoria); // Se llama al método 'cargar_categoria()' del objeto '$categoria' para obtener los datos de la categoría desde la base de datos
    foreach ($categoria->objetos as $objeto) {
        // Se recorre el array de objetos de categorías y se crea un nuevo array asociativo para la categoría
        $json[] = array(
            'id_categoria' => $objeto->id_categoria,
            'nombre_categoria' => $objeto->nombre_categoria,
        );
    }
    $jsonstring = json_encode($json[0]); // Se convierte el array de categoría a formato JSON
    echo $jsonstring; // Se devuelve el JSON como respuesta al cliente
}
/* FIN FUNCION PARA CARGAR DATOS AL FORMULARIO DE EDICIÓN  */


/* FUNCION PARA EDITAR UNA NUEVA CATEGORIA  */
if ($_POST['funcion'] == 'editar_categoria') {
    try {
        $id_categoriae = $_POST['id_categoriae']; // Se obtiene el ID de la categoría a editar desde la solicitud POST
        $nombre_categoriae = $_POST['nombre_categoriae']; // Se obtiene el nuevo nombre de la categoría desde la solicitud POST
        $categoria->editar_categoria($id_categoriae, $nombre_categoriae); // Se llama al método 'editar_categoria()' del objeto '$categoria' para editar la categoría en la base de datos
    } catch (Exception $e) {
        echo 'error';
    }
}
/* FUNCION PARA EDITAR UNA NUEVA CATEGORIA  */


/* FUNCION PARA BORRAR UNA NUEVA CATEGORIA  */
if ($_POST['funcion'] == 'borrar_categoria') {
    try {
    $id_categoria = $_POST['id_categoria']; // Se obtiene el ID de la categoría desde la solicitud POST
    $categoria->borrar_categoria($id_categoria); // Se llama al método 'borrar_categoria()' del objeto '$categoria' para eliminar la categoría de la base de datos
    } catch (Exception $e) {
        echo 'error'. $id_categoria;
    }
}
/* FIN FUNCION PARA BORRAR UNA NUEVA CATEGORIA  */
