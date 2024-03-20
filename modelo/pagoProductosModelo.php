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

    /* FUNCION PARA REGISTRAR LA VENTA  */
    public function registrar_venta($id_usuario, $metodo, $nombre_cliente, $telefono, $ruc, $direccion)
    {

            $sql = "CALL Proceso_Pago_Usuario(:id_usuario, :metodo_pago, :nombre_cliente, :telefono, :ruc, :direccion)";

            $query = $this->acceso->prepare($sql);
            $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $query->bindParam(':metodo_pago', $metodo, PDO::PARAM_INT);
            $query->bindParam(':nombre_cliente', $nombre_cliente, PDO::PARAM_STR);
            $query->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $query->bindParam(':ruc', $ruc, PDO::PARAM_STR);
            $query->bindParam(':direccion', $direccion, PDO::PARAM_STR);

            if ($query->execute()) {
                echo 'vendido';
            } else {
                echo 'error';
            }

    }


    /* FIN FUNCION PARA REGISTRAR LA VENTA */
    
}
