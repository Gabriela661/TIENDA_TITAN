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


    function ListarMasVendidos()
    {
        $sql = "SELECT 
    p.id_producto,
    p.nombre_producto,

    p.precio_producto,
    c.nombre_categoria AS categoria_producto,
    (
        SELECT url_imagen
        FROM imagen i
        WHERE i.id_producto = p.id_producto
        ORDER BY i.id_imagen ASC
        LIMIT 1
    ) AS imagen_producto
FROM
    producto p
JOIN
    categoria c ON p.id_categoria = c.id_categoria limit 4;
";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    // listar productos de la tienda
    function productosTienda()
    {
        if (!empty($_POST['consulta'])) {
            $idCategoria = $_POST['consulta'];
            $sql = "SELECT 
                p.id_producto,
                p.nombre_producto,
                p.marca_producto,
                p.descripcion_producto,
                p.stock_producto,
                p.precio_producto,
                c.nombre_categoria AS categoria_producto,
                (
                    SELECT url_imagen
                    FROM imagen i
                    WHERE i.id_producto = p.id_producto
                    ORDER BY i.id_imagen ASC
                    LIMIT 1
                ) AS imagen_producto
            FROM
                producto p
            JOIN
                categoria c ON p.id_categoria = c.id_categoria
            WHERE
                p.id_categoria = :idCategoria;";

            $query = $this->acceso->prepare($sql);
            $query->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        } else {
            $sql = "SELECT 
                    p.id_producto,
                    p.nombre_producto,
                    p.marca_producto,
                    p.descripcion_producto,
                    p.stock_producto,
                    p.precio_producto,
                    c.nombre_categoria AS categoria_producto,
                    (
                        SELECT url_imagen
                        FROM imagen i
                        WHERE i.id_producto = p.id_producto
                        ORDER BY i.id_imagen ASC
                        LIMIT 1
                    ) AS imagen_producto
                FROM
                    producto p
                JOIN
                    categoria c ON p.id_categoria = c.id_categoria; 
        ";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }


    /* FUNCION PARA LISTAR LA CATEGORIA  */
    function listarCategoriaTienda()
    {
        $sql = "SELECT id_categoria, nombre_categoria FROM categoria"; // Consulta SQL para seleccionar todas las categorías
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de las categorías obtenidas
    }
    /* FIN FUNCION PARA LISTAR LA CATEGORIA  */

    function detalleProducto($id_producto)
    {
        $sql = "SELECT 
                p.id_producto,
                p.nombre_producto,
                p.marca_producto,
                p.descripcion_producto,
                p.stock_producto,
                p.precio_producto,
                c.nombre_categoria AS categoria_producto,
                (
                    SELECT url_imagen
                    FROM imagen i
                    WHERE i.id_producto = p.id_producto
                    ORDER BY i.id_imagen ASC
                    LIMIT 1
                ) AS imagen_producto
            FROM
                producto p
            JOIN
                categoria c ON p.id_categoria = c.id_categoria
            WHERE
                p.id_producto = :id_producto;";
        $query = $this->acceso->prepare($sql);

        $query->execute(array(
            ':id_producto' => $id_producto
        ));
        $this->objetos = $query->fetchAll();

        return $this->objetos;
    }
}
