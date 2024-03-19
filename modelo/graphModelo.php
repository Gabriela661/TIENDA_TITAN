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


    function venta_producto_categorias()
    {
        $sql = "SELECT c.nombre_categoria AS categoria,
            COUNT(v.id_venta) AS cantidad_ventas
            FROM venta v
            INNER JOIN detalle_venta dv ON v.id_venta = dv.id_venta
            INNER JOIN producto p ON dv.id_producto = p.id_producto
            INNER JOIN categoria c ON p.id_categoria = c.id_categoria
            GROUP BY c.nombre_categoria;";
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

    function usuarioTotal()
    {
        $sql = "SELECT COUNT(id_cliente) as totaluser from cliente;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function productoTotal()
    {
        $sql = "SELECT COUNT(id_producto) as productot from producto;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function categoriasTotal()
    {
        $sql = "SELECT COUNT(id_categoria) as cateffa from categoria;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function ingresosTotal()
    {
        $sql = "SELECT SUM(total_venta) as ingrestot from venta;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function semanaComparar()
    {
        $sql = "SELECT
        DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha,
        SUM(dv.cantidad * p.precio_producto) AS monto_total
    FROM
        venta v
        JOIN detalle_venta dv ON v.id_venta = dv.id_venta
        JOIN producto p ON dv.id_producto = p.id_producto
    WHERE
    v.fecha >= DATE_SUB(CURDATE(), INTERVAL 14 DAY) -- Selecting data for the last 14 days
    GROUP BY
        DATE_FORMAT(v.fecha, '%d-%m-%Y');";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function usuario_venta()
    {
        $sql = "select nombre_usuario, sum(total_venta) as total from venta v inner join usuario u on u.id_usuario = v.id_usuario GROUP BY nombre_usuario;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
