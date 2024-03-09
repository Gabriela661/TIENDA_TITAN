<?php
include_once 'conexion.php';

//creacion de  la class
class productos
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }


    // listar inventario
    function ListarMasVendidos()
    {
        $sql = "SELECT
    p.id_producto,
    p.nombre_producto,
    p.descripcion_producto,
    p.marca_producto,
    p.stock_producto,
    p.precio_producto,
    i.url_imagen AS primera_imagen
FROM
    producto p
LEFT JOIN
    imagen i ON p.id_producto = i.id_producto
LEFT JOIN
    (
        SELECT
            id_producto,
            MIN(id_imagen) AS id_primera_imagen
        FROM
            imagen
        GROUP BY
            id_producto
    ) subquery ON p.id_producto = subquery.id_producto
        AND i.id_imagen = subquery.id_primera_imagen;
";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
