<?php
include_once 'conexion.php';

class ingreso{
    var $objetos; // Propiedad para almacenar los resultados de las consultas
    var $acceso; // Propiedad para acceder a la conexión PDO

    public function __construct()
    {
        $db = new conexion(); // Se instancia la clase de conexión a la base de datos
        $this->acceso = $db->pdo; // Se obtiene el objeto PDO para acceder a la base de datos
    }

    /* FUNCION PARA LISTAR LA CATEGORIA  */
    function listarIngresos()
    {
        $sql = "SELECT cliente.nombre_cliente, v.id_venta, v.tipo_pago, v.cantidad_total, v.fecha, v.id_usuario
        FROM venta v
        INNER JOIN cliente 
        ON cliente.id_cliente = v.id_cliente;
        "; // Consulta SQL para seleccionar todas las categorías
        $query = $this->acceso->prepare($sql); 
        $query->execute(); // Ejecución de la consulta
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de las categorías obtenidas
    }
}