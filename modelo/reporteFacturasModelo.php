<?php
include_once 'conexion.php';

//creacion de la class
class reporte_facturas
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
        JOIN tipo_pago tp ON v.id_tipo_pago = tp.id_tipo_pago
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
        tp.nombre_tipo_pago,
        c.nombre_cliente,
        v.id_cliente,
        v.id_usuario,
        v.total_venta,
        v.fecha,
        v.url_factura
        FROM 
            venta v
        JOIN 
            cliente c ON v.id_cliente = c.id_cliente
        JOIN 
            tipo_pago tp ON v.id_tipo_pago = tp.id_tipo_pago
        WHERE 
        DATE(v.fecha) = CURDATE();";
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
        tp.nombre_tipo_pago,
        c.nombre_cliente,
        v.id_cliente,
        v.id_usuario,
        v.total_venta,
        v.fecha,
        v.url_factura
        FROM 
            venta v
        JOIN 
            cliente c ON v.id_cliente = c.id_cliente
        JOIN 
            tipo_pago tp ON v.id_tipo_pago = tp.id_tipo_pago
        WHERE 
        MONTH(v.fecha) = MONTH(CURDATE()) AND YEAR(v.fecha) = YEAR(CURDATE());
    ";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function fechas_facturas($fechai, $fechaf)
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
        tp.nombre_tipo_pago,
        c.nombre_cliente,
        v.id_cliente,
        v.id_usuario,
        v.total_venta,
        v.fecha,
        v.url_factura
        FROM 
            venta v
        JOIN 
            cliente c ON v.id_cliente = c.id_cliente
        JOIN 
            tipo_pago tp ON v.id_tipo_pago = tp.id_tipo_pago
        WHERE 
        v.fecha BETWEEN '$fechai' AND '$fechaf';";

        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
