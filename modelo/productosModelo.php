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
        LIMIT 6;";

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
        $sql = "SELECT id_categoria, nombre_categoria,imagen FROM categoria";
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
        // Definir el número de productos por página
        $productosPorPagina = 12;

        // Verificar si se proporcionó la consulta y la página seleccionada
        if (!empty($_POST['consulta']) && !empty($_POST['pagina'])) {
            $idCategoria = $_POST['consulta'];
            $pagina = $_POST['pagina'];
            // Calcular el índice de inicio para la consulta
            $inicio = ($pagina - 1) * $productosPorPagina;

            // Consulta SQL para seleccionar los productos según la página y la categoría
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
            p.id_categoria = :idCategoria
        LIMIT :inicio, :productosPorPagina;";

            $query = $this->acceso->prepare($sql);
            $query->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
            $query->bindParam(':inicio', $inicio, PDO::PARAM_INT);
            $query->bindParam(':productosPorPagina', $productosPorPagina, PDO::PARAM_INT);
        } elseif (!empty($_POST['pagina'])) {
            // Si solo se proporciona la página
            $pagina = $_POST['pagina'];
            // Calcular el índice de inicio para la consulta
            $inicio = ($pagina - 1) * $productosPorPagina;

            // Consulta SQL para seleccionar los productos solo según la página
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
        LIMIT :inicio, :productosPorPagina;";

            $query = $this->acceso->prepare($sql);
            $query->bindParam(':inicio', $inicio, PDO::PARAM_INT);
            $query->bindParam(':productosPorPagina', $productosPorPagina, PDO::PARAM_INT);
        } else {
            // Si no se proporciona ni la consulta ni la página, devolver todos los productos sin límite
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
        }

        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }


    /**
     * Obtiene y devuelve la lista de categorías para ser mostradas en la página de la tienda.
     *
     * @return array Lista de categorías.
     */
    public function listarCategoriaTienda()
    {
        $sql = "SELECT id_categoria, nombre_categoria,imagen FROM categoria";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    /**
     * Obtiene y devuelve la lista de categorías para ser mostradas en la página de la tienda.
     *
     * @return array Lista de categorías.
     */
    public function listarCategoriaTiendaheader()
    {
        $sql = "SELECT c.id_categoria, c.nombre_categoria, c.imagen, COUNT(p.id_producto) AS cantidad_productos
FROM categoria c
INNER JOIN producto p ON c.id_categoria = p.id_categoria
GROUP BY c.id_categoria, c.nombre_categoria, c.imagen;";
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
        GROUP_CONCAT(i.url_imagen SEPARATOR ',') AS url_imagenes 
    FROM producto p 
    INNER JOIN imagen i ON i.id_producto = p.id_producto 
    INNER JOIN categoria c ON c.id_categoria = p.id_categoria 
    WHERE p.id_producto = :id_producto 
    GROUP BY p.id_producto";

        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_producto' => $id_producto));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }


    /**
     * Obtiene y devuelve la lista de productos de la tienda parecidos a lo que se esta buscando
     *
     * @return array Lista de resultado de la busqueda
     */
    public function busquedaProductos()
    {
        if (!empty($_POST['consulta'])) {
            $consulta = '%' . $_POST['consulta'] . '%'; // Agregar comodines para buscar parcialmente

            $sql = "SELECT 
                p.id_producto,
                p.nombre_producto,
                p.marca_producto,
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
                p.nombre_producto LIKE :consulta
                OR p.marca_producto LIKE :consulta
                OR p.descripcion_producto LIKE :consulta LIMIT 5;";

            $query = $this->acceso->prepare($sql);
            $query->bindParam(':consulta', $consulta, PDO::PARAM_STR);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }

    /**
     * limpia el carrito
     *
     */
    function CantidadPaginas()
    {
        $sql = "SELECT COUNT(*) AS cantidad_productos FROM producto";
        $query = $this->acceso->prepare($sql);
        $query->execute();

        // Obtener el resultado de la consulta
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Acceder al valor de cantidad_productos
            $cantidad_productos = $resultado['cantidad_productos'];
            echo $cantidad_productos;
        } else {
            echo 'Error al obtener la cantidad de productos';
        }
    }


    /**
     * Obtiene y devuelve la lista el numero de la factura
     *
     * @return array numero de factura.
     */
    function obtenerNumeroFactura()
    {
        $sql = "SELECT MAX(id_venta) AS id_ultimaCompra FROM  venta;";
        $query = $this->acceso->prepare($sql);
        $query->execute();


        // Obtener el resultado de la consulta
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if (isset($resultado['id_ultimacompra'])) {
            // Acceder al valor del último ID de compra
            $id_ultimaCompra = $resultado['id_ultimacompra'];
            echo $id_ultimaCompra;
        } else {
            echo 'Error: No se encontró el último ID de compra';
        }
    }


    /**
     * Obtiene y devuelve la lista de productos similares de la tienda  con respecto a un producto
     *
     * @return array Lista de productos similares de la tienda.
     */
    public function productosSimilares()
    {
        $idProducto = $_POST['idProducto'];

        // Consulta SQL para seleccionar la categoría del producto
        $sqlCategoria = "SELECT id_categoria FROM producto WHERE id_producto = :idProducto";
        $queryCategoria = $this->acceso->prepare($sqlCategoria);
        $queryCategoria->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        $queryCategoria->execute();
        $categoria = $queryCategoria->fetch(PDO::FETCH_ASSOC);

        $idCategoria = $categoria['id_categoria'];

        $sqlProductosSimilares = "SELECT 
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
            p.id_categoria = :idCategoria";

        $queryProductosSimilares = $this->acceso->prepare($sqlProductosSimilares);
        $queryProductosSimilares->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $queryProductosSimilares->execute();
        $this-> objetos = $queryProductosSimilares->fetchAll();
        return $this->objetos;
    }
    /**
     * Obtiene y devuelve la lista de productos similares de la tienda  con respecto a un producto
     *
     * @return array Lista de productos similares de la tienda.
     */
    public function mostrarOfertas()
    {    

        $sql = "SELECT 
            p.id_producto,
            p.nombre_producto,
            p.marca_producto,
            p.descripcion_producto,
            p.stock_producto,
            p.precio_producto,
            p.descuento,
            ROUND(p.precio_producto - (p.precio_producto * p.descuento / 100), 2) AS precio_descuento, -- Calculamos y redondeamos el precio de descuento
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
            p.descuento > 0; -- Filtramos por productos con descuento mayor a 0
        ";

        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
