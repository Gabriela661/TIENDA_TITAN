<?php
include_once 'conexion.php';

class egreso{
    var $objetos; // Propiedad para almacenar los resultados de las consultas
    var $acceso; // Propiedad para acceder a la conexión PDO

    public function __construct()
    {
        $db = new conexion(); // Se instancia la clase de conexión a la base de datos
        $this->acceso = $db->pdo; // Se obtiene el objeto PDO para acceder a la base de datos
    }

    /* FUNCION PARA LISTAR LA CATEGORIA  */
    function listarEgresos()
    {
        $sql = "SELECT p.codigo_producto,p.nombre_producto,c.cantidad_carrito, c.id_usuario FROM producto p
        INNER JOIN carrito c ON c.id_producto = p.id_producto
        "; // Consulta SQL para seleccionar todas las categorías
        $query = $this->acceso->prepare($sql); 
        $query->execute(); // Ejecución de la consulta
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de las categorías obtenidas
    }
}