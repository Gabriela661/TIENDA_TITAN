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
        $sql = "SELECT c.nombre_cliente, v.id_venta, t.nombre_tipo_pago, v.cantidad_total, v.fecha, u.nombre_usuario FROM venta v
        INNER JOIN cliente c ON c.id_cliente = v.id_cliente
        INNER JOIN usuario u ON u.id_usuario=v.id_usuario
        INNER JOIN tipo_pago t ON t.id_tipo_pago= v.tipo_pago
        "; // Consulta SQL para seleccionar todas las categorías
        $query = $this->acceso->prepare($sql); 
        $query->execute(); // Ejecución de la consulta
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de las categorías obtenidas
    }
}