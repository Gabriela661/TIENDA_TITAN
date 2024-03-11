<?php
include_once 'conexion.php';

//creacion de la class
class graph
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }

    // listar facturas
    function reporte_facturas()
    {
        $sql = "SELECT tp.nombre_tipo_pago, c.nombre_cliente, v.id_cliente, v.id_usuario, v.total_venta, v.fecha, v.url_factura
        FROM venta v
        JOIN cliente c ON v.id_cliente = c.id_cliente
        JOIN tipo_pago tp ON v.id_tipo_pago = tp.id_tipo_pago;
        ;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    // listar facturas día
    /* function dia_facturas($dia) */
    function dia_facturas()
    { //CURDATE()
        $sql = "SELECT
        DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha,
        SUM(dv.cantidad * p.precio_producto) AS monto_total,
        GROUP_CONCAT(CONCAT(p.nombre_producto, ':', dv.cantidad) SEPARATOR '; ') AS productos_cantidades
        FROM
        venta v
        JOIN detalle_venta dv ON v.id_venta = dv.id_venta
        JOIN producto p ON dv.id_producto = p.id_producto
        WHERE
        DATE(v.fecha) ='2024-03-09'
        GROUP BY
        DATE_FORMAT(v.fecha, '%d-%m-%Y');";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    // listar facturas MES
    /* function dia_facturas($dia) */
    function mes_facturas()
    { //CURDATE()
        $sql = "SELECT
        DATE_FORMAT(v.fecha, '%m-%Y') AS mes,
        SUM(dv.cantidad * p.precio_producto) AS monto_total,
        GROUP_CONCAT(CONCAT(p.nombre_producto, ':', dv.cantidad) SEPARATOR '; ') AS productos_cantidades
        FROM
        venta v
        JOIN detalle_venta dv ON v.id_venta = dv.id_venta
        JOIN producto p ON dv.id_producto = p.id_producto
        WHERE
        YEAR(v.fecha) = YEAR(CURDATE()) AND MONTH(v.fecha) = MONTH(CURDATE())
        GROUP BY
        DATE_FORMAT(v.fecha, '%m-%Y');";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }


    public function fechas_graph3($fechai, $fechaf)
    {
        $mes_actual = date('m');
        $year_actual = date('Y');
        $dia_actual = date('d');
        $dia_siguiente = date('d', strtotime('+1 day'));
        $mes_siguiente = date('m', strtotime('+1 month'));
        $year_siguiente = date('Y', strtotime('+1 year'));

        if ($fechai == '') {
            $fechai = "{$year_actual}-{$mes_actual}-01";
        }
        // Verificar si es el último día del mes
        if ($dia_actual == date('t')) {
            $fechaf = "{$year_actual}-{$mes_siguiente}-{$dia_siguiente}";
        } else {
            $fechaf = "{$year_actual}-{$mes_actual}-{$dia_siguiente}";
        }

        // Verificar si es el último día del año
        if ($mes_actual == '12' && $dia_actual == '31') {
            $fechaf = "{$year_siguiente}-01-01";
        }

        

        $sql = "SELECT
            DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha,
            SUM(dv.cantidad * p.precio_producto) AS monto_total
            FROM
            venta v
            JOIN detalle_venta dv ON v.id_venta = dv.id_venta
            JOIN producto p ON dv.id_producto = p.id_producto
            WHERE
            v.fecha BETWEEN '$fechai' AND '$fechaf'
            GROUP BY
            DATE_FORMAT(v.fecha, '%d-%m-%Y');";

        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
