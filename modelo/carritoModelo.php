<?php
include_once 'conexion.php';

/* CREACION DE LA CLASE CATEGORIA */
class carrito
{
    var $objetos; // Propiedad para almacenar los resultados de las consultas
    var $acceso; // Propiedad para acceder a la conexión PDO

    public function __construct()
    {
        $db = new conexion(); // Se instancia la clase de conexión a la base de datos
        $this->acceso = $db->pdo; // Se obtiene el objeto PDO para acceder a la base de datos
    }

    /* FUNCION PARA AGREGAR UN NUEVO PRODUCTO AL CARRITO */
    function añadir_carrito($id_producto, $cantidad_carrito, $id_usuario)
    {
        $sql = "INSERT INTO carrito (id_producto, cantidad, id_usuario) VALUES (:id_producto, :cantidad, :id_usuario)";
        $query = $this->acceso->prepare($sql);

        // Asegúrate de que $id_producto, $cantidad_carrito y $id_usuario sean variables seguras
        $query->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        $query->bindParam(':cantidad', $cantidad_carrito, PDO::PARAM_INT);
        $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

        if ($query->execute()) {
            echo 'add_carrito'; 
        } else {
            echo 'error_add_carrito'; 
        }
    }

    /* FIN DE LA FUNCION PARA AGREGAR UNA NUEVA CATEGORIA  */
}