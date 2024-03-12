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
        $this->acceso = $db->pdo; // Se obtiene el objeto PDO para acceder a la base de datos
    }

    /* FUNCION PARA AGREGAR UN NUEVO PRODUCTO AL CARRITO */
    function añadir_carrito($id_producto, $cantidad_carrito, $id_usuario)
    {
        $sql = "INSERT INTO carrito ( cantidad_carrito,id_producto, id_usuario) VALUES ( :cantidad,:id_producto, :id_usuario)";
        $query = $this->acceso->prepare($sql);

        // Asegúrate de que $id_producto, $cantidad_carrito y $id_usuario sean variables seguras
        $query->bindParam(':cantidad', $cantidad_carrito, PDO::PARAM_INT);
        $query->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

        if ($query->execute()) {
            echo 'add_carrito'; 
        } else {
            echo 'error_add_carrito'; 
        }
    }

    /* FIN DE LA FUNCION PARA AGREGAR UN NUEVO PRODUCTO AL CARRITO  */

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
      /* FUNCION PARA CARGAR LOS PRODUCTOS EN EL CARRITO  */

      /* FUNCION PARA VERIFICAR EXISTENCIA DEL PRODUCTO EN EL CARRITO */  
    public function verificar_existencia_carrito()
    {
        $id_usuario = $_POST['id_usuario'];
        $id_producto = $_POST['id_producto'];
        $sql = "SELECT id_carrito, COUNT(*) as cantidad
FROM carrito
WHERE id_producto = :id_producto AND id_usuario = :id_usuario
GROUP BY id_carrito;";

        $query = $this->acceso->prepare($sql);
        $query->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    /* FIN FUNCION PARA VERIFICAR EXISTENCIA DEL PRODUCTO EN EL CARRITO  */


    /* FUNCION PARA AGREGAR UN NUEVO PRODUCTO AL CARRITO */
    function actualizar_carrito($id_carrito, $cantidad_carrito)
    {
        $id_carrito = $_POST['id_carrito'];
        $nuevaCantidad = $_POST['cantidad_carrito'];

        // Obtener la cantidad actual
        $consultaCantidad = "SELECT cantidad_carrito FROM carrito WHERE id_carrito = :id_carrito";
        $queryCantidad = $this->acceso->prepare($consultaCantidad);
        $queryCantidad->bindParam(':id_carrito', $id_carrito, PDO::PARAM_INT);
        $queryCantidad->execute();
        $cantidadActual = $queryCantidad->fetchColumn();

        // Calcular la nueva cantidad
        $nuevaCantidadTotal = $cantidadActual + $nuevaCantidad;

        // Actualizar la cantidad en la base de datos
        $consultaActualizar = "UPDATE carrito SET cantidad_carrito = :nueva_cantidad WHERE id_carrito = :id_carrito";
        $queryActualizar = $this->acceso->prepare($consultaActualizar);
        $queryActualizar->bindParam(':id_carrito', $id_carrito, PDO::PARAM_INT);
        $queryActualizar->bindParam(':nueva_cantidad', $nuevaCantidadTotal, PDO::PARAM_INT);
        
        if ($queryActualizar->execute()) {
            echo 'Update_carrito';
        } else {
            echo 'error_Update_carrito';
        }
    }

    /* FIN DE LA FUNCION PARA AGREGAR UNA NUEVA CATEGORIA  */
}