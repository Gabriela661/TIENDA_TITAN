<?php
include_once 'conexion.php';

//creacion de la class
class reporte_productos
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }

    // listar facturas
    function reporte_productos()
    {
        $sql = "SELECT
        p.nombre_producto,
        p.id_producto,
        SUM(dv.cantidad) AS cantidad_total,
        p.precio_producto AS precio_unitario,
        SUM(dv.cantidad * p.precio_producto) AS monto_total,
        dv.id_venta,
        c.nombre_cliente,
        v.fecha
    FROM
        detalle_venta dv
        JOIN producto p ON dv.id_producto = p.id_producto
        JOIN venta v ON dv.id_venta = v.id_venta
        JOIN cliente c ON v.id_cliente = c.id_cliente
    GROUP BY
        p.nombre_producto, p.id_producto, dv.id_venta, c.nombre_cliente, v.fecha, p.precio_producto;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    // listar facturas día
    /* function dia_facturas($dia) */
    function dia_producto()
    { //CURDATE()
        $sql = "SELECT
        p.nombre_producto,
        p.precio_producto,
         p.id_producto,
        SUM(dv.cantidad) AS total_vendido,
        SUM(dv.cantidad * p.precio_producto) AS monto_total
    FROM
        detalle_venta dv
        JOIN producto p ON dv.id_producto = p.id_producto
        JOIN venta v ON dv.id_venta = v.id_venta
    WHERE
        DATE(v.fecha) = '2024-03-09'
    GROUP BY
        p.nombre_producto, p.precio_producto, p.id_producto;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    // listar facturas MES
    /* function dia_facturas($dia) */
    function mes_producto()
    { //CURDATE()
        $sql = "SELECT
        p.nombre_producto,
        p.precio_producto,
        p.id_producto,
        SUM(dv.cantidad) AS total_vendido,
        SUM(dv.cantidad * p.precio_producto) AS monto_total
    FROM
        detalle_venta dv
        JOIN producto p ON dv.id_producto = p.id_producto
        JOIN venta v ON dv.id_venta = v.id_venta
    WHERE
        MONTH(v.fecha) = MONTH(CURDATE()) AND YEAR(v.fecha) = YEAR(CURDATE())
    GROUP BY
        p.nombre_producto, p.precio_producto, p.id_producto;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function fechas_Productos($fechai, $fechaf)
    { //CURDATE()
        $sql = "SELECT
        p.nombre_producto,
        p.precio_producto,
        p.id_producto,
        SUM(dv.cantidad) AS total_vendido,
        SUM(dv.cantidad * p.precio_producto) AS monto_total
    FROM
        detalle_venta dv
        JOIN producto p ON dv.id_producto = p.id_producto
        JOIN venta v ON dv.id_venta = v.id_venta
    WHERE
        v.fecha BETWEEN '2024-03-09' AND '2024-03-10'
    GROUP BY
        p.nombre_producto, p.precio_producto, p.id_producto;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
