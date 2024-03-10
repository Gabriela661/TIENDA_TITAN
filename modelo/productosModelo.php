<?php
include_once 'conexion.php';

/**
 * Clase Productos
 */
class Productos
{
    var $objetos;
    var $acceso;

    /**
     * Constructor de la clase. Inicializa la conexión a la base de datos.
     */
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    /**
     * Obtiene y devuelve la lista de productos más vendidos.
     *
     * @return array Lista de productos más vendidos.
     */
    public function ListarMasVendidos()
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
            categoria c ON p.id_categoria = c.id_categoria
        LIMIT 4;";

        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    /**
     * Obtiene y devuelve la lista de categorías para ser mostradas en la página de inicio.
     *
     * @return array Lista de categorías.
     */
    public function listarCategoriaIndex()
    {
        $sql = "SELECT id_categoria, nombre_categoria FROM categoria";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    /**
     * Obtiene y devuelve la lista de productos de la tienda, filtrados por categoría si se proporciona una.
     *
     * @return array Lista de productos de la tienda.
     */
    public function productosTienda()
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
                    categoria c ON p.id_categoria = c.id_categoria;";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }

    /**
     * Obtiene y devuelve la lista de categorías para ser mostradas en la página de la tienda.
     *
     * @return array Lista de categorías.
     */
    public function listarCategoriaTienda()
    {
        $sql = "SELECT id_categoria, nombre_categoria FROM categoria";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    /**
     * Obtiene y devuelve los detalles de un producto específico.
     *
     * @param int $id_producto ID del producto a detallar.
     * @return array Detalles del producto.
     */
    public function detalleProducto($id_producto)
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
        $query->execute(array(':id_producto' => $id_producto));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
