<?php
include_once 'conexion.php';

/* CREACION DE LA CLASE CARRITO */
class productosPago
{
    var $objetos; // Propiedad para almacenar los resultados de las consultas
    var $acceso; // Propiedad para acceder a la conexión PDO
 public function __construct()
    {
        $db = new conexion(); // Se instancia la clase de conexión a la base de datos
        $this->acceso = $db->pdo; // Se obtiene el objeto PDO para acceder a la base de datos
    }
    /* FUNCION PARA CARGAR LOS PRODUCTOS EN EL CARRITO  */
    public function cargarProductosPago()
    {
        if (!empty($_POST['consulta'])) {
            $id_usuario = $_POST['consulta'];
            $sql = "SELECT
                c.id_usuario,
                c.id_carrito,
                c.cantidad_carrito,
                c.id_producto,
                p.nombre_producto,
                p.precio_producto,
                ROUND((c.cantidad_carrito * p.precio_producto), 2) AS subtotal     
            FROM
                carrito c
            INNER JOIN producto p ON c.id_producto = p.id_producto
            WHERE
                c.id_usuario =:id;

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
