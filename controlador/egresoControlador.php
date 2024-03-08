<?php
// Se incluye el archivo que contiene la definición de la clase 'categoria'
include_once '../modelo/egresoModelo.php';

// Se instancia la clase 'categoria'
$egreso = new egreso();

/* FUNCION PARA LISTAR LA CATEGORIA  */
if ($_POST['funcion'] == 'listarEgresos') {
    $json = array(); // Se inicializa un array para almacenar los datos de las categorías
    $egreso->listarEgresos(); // Se llama al método 'listarCategoria()' del objeto '$categoria' para obtener las categorías desde la base de datos
    
    foreach ($egreso->objetos as $objeto) {
        // Se recorre el array de objetos de categorías y se crea un nuevo array asociativo para cada categoría
        $json[] = array(
            'codigo_producto' => $objeto->codigo_producto,
            'nombre_producto' => $objeto->nombre_producto,
            'cantidad_carrito' => $objeto->cantidad_carrito,
            'id_usuario' => $objeto->id_usuario,
        );
    }
    $jsonstring = json_encode($json); // Se convierte el array de categorías a formato JSON
    echo $jsonstring; // Se devuelve el JSON como respuesta al cliente
}
