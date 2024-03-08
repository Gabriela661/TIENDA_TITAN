<?php
// Se incluye el archivo que contiene la definición de la clase 'categoria'
include_once '../modelo/ingresoModelo.php';

// Se instancia la clase 'categoria'
$ingreso = new ingreso();

/* FUNCION PARA LISTAR LA CATEGORIA  */
if ($_POST['funcion'] == 'listarIngresos') {
    $json = array(); // Se inicializa un array para almacenar los datos de las categorías
    $ingreso->listarIngresos(); // Se llama al método 'listarCategoria()' del objeto '$categoria' para obtener las categorías desde la base de datos
    foreach ($ingreso->objetos as $objeto) {
        // Se recorre el array de objetos de categorías y se crea un nuevo array asociativo para cada categoría
        $json[] = array(
            'nombre_cliente' => $objeto->nombre_cliente,
            'id_venta' => $objeto->id_venta,
            'nombre_tipo_pago' => $objeto->nombre_tipo_pago,
            'cantidad_total' => $objeto->cantidad_total,
            'fecha' => $objeto->fecha,
            'nombre_usuario' => $objeto->nombre_usuario,
        );
    }
    $jsonstring = json_encode($json); // Se convierte el array de categorías a formato JSON
    echo $jsonstring; // Se devuelve el JSON como respuesta al cliente
}
