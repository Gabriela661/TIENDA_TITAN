<?php
include_once 'conexion.php';

/* CREACION DE LA CLASE CARRITO */
class carrito
{
    var $objetos; // Propiedad para almacenar los resultados de las consultas
    var $acceso; // Propiedad para acceder a la conexión PDO

    public function __construct()
    {
        $db = new conexion(); // Se instancia la clase de conexión a la base de datos
    }
    /* FUNCION PARA CARGAR LOS PRODUCTOS EN EL CARRITO  */
    public function cargarCarrito()
    {
        if (!empty($_POST['consulta'])) {
            $id_usuario = $_POST['consulta'];
            $sql = "SELECT 
            c.id_usuario,
            c.id_carrito,
            c.cantidad_carrito,
            p.id_producto,
            p.nombre_producto,
            p.precio_producto,
            p.stock_producto,
            ct.nombre_categoria,
            SUM(c.cantidad_carrito) AS total_cantidad_carrito,
            ROUND(SUM(c.cantidad_carrito * p.precio_producto), 2) AS total_valor_carrito,
            (
                SELECT url_imagen
                FROM imagen i
                WHERE i.id_producto = p.id_producto
                ORDER BY i.id_imagen ASC
                LIMIT 1
            ) AS imagen_producto
        FROM
            carrito c
            INNER JOIN producto p ON c.id_producto = p.id_producto
            INNER JOIN categoria ct ON p.id_categoria = ct.id_categoria
        WHERE
            c.id_usuario =:id
        GROUP BY
                c.id_carrito,c.cantidad_carrito,c.id_usuario, p.id_producto, p.nombre_producto, p.precio_producto, ct.nombre_categoria;
        ";

            $query = $this->acceso->prepare($sql);
            $query->bindParam(':id', $id_usuario, PDO::PARAM_INT);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }
      /* FIN FUNCION PARA CARGAR LOS PRODUCTOS EN EL CARRITO  */
}