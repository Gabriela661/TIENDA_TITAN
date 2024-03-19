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
        SUM(dv.cantidad * p.precio_producto) AS monto_total
    FROM
        detalle_venta dv
        JOIN producto p ON dv.id_producto = p.id_producto
        JOIN venta v ON dv.id_venta = v.id_venta
        JOIN cliente c ON v.id_cliente = c.id_cliente
    GROUP BY
        p.nombre_producto, p.id_producto, p.precio_producto;";
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
        DATE(v.fecha) = CURDATE()
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
        $mes_actual = date('m');
        $year_actual = date('Y');
        $dia_actual = date('d');
        $dia_siguiente = date('d', strtotime('+1 day'));

        $year_siguiente = date('Y', strtotime('+1 year'));

        // Fecha inicial
        if ($fechai == '') {
            $fechai = "{$year_actual}-{$mes_actual}-01";
        }

        // Fecha final
        if ($dia_actual == date('t')) { // Último día del mes
            $fechaf = date('Y-m-d', strtotime('first day of +1 month'));
        } else if ($mes_actual == '12' && $dia_actual == '31') { // Último día del año
            $fechaf = "{$year_siguiente}-01-01";
        } else if ($fechaf == '') {
            $fechaf = "{$year_actual}-{$mes_actual}-{$dia_siguiente}";
        } else {
            // Incrementar la fecha final en un día
            $fechaf = date('Y-m-d', strtotime($fechaf . ' +1 day'));
        }
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
        v.fecha BETWEEN '$fechai' AND '$fechaf'
    GROUP BY
        p.nombre_producto, p.precio_producto, p.id_producto;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
