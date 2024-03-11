<?php
include_once 'conexion.php';

//creacion de la class
class venta
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }

    // listar ventas
    function venta()
    {
        $sql = "SELECT 
        v.id_venta,
        v.id_cliente,
        v.total_venta,
        v.fecha,
        v.id_usuario,
        c.nombre_cliente,
        t.nombre_tipo_pago  
        FROM venta v
        INNER JOIN cliente c ON c.id_cliente = v.id_cliente
        INNER JOIN tipo_pago t ON t.id_tipo_pago = v.id_tipo_pago";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
