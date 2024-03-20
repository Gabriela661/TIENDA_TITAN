<?php
include_once 'conexion.php';

//creacion de la class
class reporte_usuario
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }

    // listar vendedores
    function reporte_usuario()
    {
        $sql = "SELECT v.id_usuario, u.nombre_usuario, u.apellido_usuario, u.id_rol, COUNT(v.id_venta) AS cantidad_venta, SUM(v.total_venta) AS total_venta FROM venta v JOIN usuario u ON v.id_usuario = u.id_usuario WHERE u.id_rol = 4 GROUP BY v.id_usuario, u.nombre_usuario, u.apellido_usuario, u.id_rol;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    // listar vendedores
    function reporte_clientes()
    {
        $sql = "SELECT v.id_cliente, v.id_usuario, c.nombre_cliente, c.apellido_cliente, SUM(dv.cantidad) AS cantidad_compra, SUM(dv.sub_total) AS total_compra FROM venta v JOIN  cliente c ON v.id_cliente = c.id_cliente JOIN detalle_venta dv ON v.id_venta = dv.id_venta GROUP BY v.id_cliente, v.id_usuario, c.nombre_cliente, c.apellido_cliente;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
