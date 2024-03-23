<?php
include_once 'conexion.php';

//creacion de la class
class inventario
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }

    // listar inventario
    function inventario()
    {
        $sql = "SELECT 
        p.id_producto, 
        p.nombre_producto, 
        p.marca_producto, 
        p.descripcion_producto, 
        p.stock_producto, 
        p.precio_producto, 
        c.nombre_categoria, 
        GROUP_CONCAT(i.url_imagen SEPARATOR ',') AS url_imagenes 
        FROM producto p 
        INNER JOIN imagen i ON i.id_producto = p.id_producto 
        INNER JOIN categoria c ON c.id_categoria = p.id_categoria 
        GROUP BY p.id_producto";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    //listar categoria
    function listar_categoria()
    {
        $sql = "SELECT id_categoria, nombre_categoria FROM categoria";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    //crear producto
    function crear_producto($codigo_producto, $nombre_producto, $precio_producto, $descripcion_producto, $cantidad_producto, $marca_producto, $categoria_producto, $imagen_producto1, $imagen_producto2, $imagen_producto3, $imagen_producto4,$certificado_calidad, $doc_especificaciones)
    {
        $sql = "INSERT INTO producto (codigo_producto, nombre_producto, precio_producto, descripcion_producto, stock_producto, marca_producto, id_categoria,certificado_calidad) VALUES (:codigo_producto, :nombre_producto, :precio_producto, :descripcion_producto, :cantidad_producto, :marca_producto, :categoria_producto, :certificado_calidad)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':codigo_producto' => $codigo_producto,
            ':nombre_producto' => $nombre_producto,
            ':precio_producto' => $precio_producto,
            ':descripcion_producto' => $descripcion_producto,
            ':cantidad_producto' => $cantidad_producto,
            ':marca_producto' => $marca_producto,
            ':categoria_producto' => $categoria_producto,
            ':certificado_calidad' => $certificado_calidad,
        ));

        // Obtiene el ID del último producto insertado
        $producto_id = $this->acceso->lastInsertId();

        if ($imagen_producto1 == '') {
            $sql_imagen = "INSERT INTO imagen (id_producto) VALUES (:producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(':producto_id' => $producto_id));
        } else {
            $sql_imagen = "INSERT INTO imagen (url_imagen, id_producto) VALUES (:url_imagen, :producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(
                ':url_imagen' => $imagen_producto1,
                ':producto_id' => $producto_id
            ));
        }
        if ($imagen_producto2 != '') {
            $sql_imagen = "INSERT INTO imagen (url_imagen, id_producto) VALUES (:url_imagen, :producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(
                ':url_imagen' => $imagen_producto2,
                ':producto_id' => $producto_id
            ));
        } else {
            $sql_imagen = "INSERT INTO imagen (id_producto) VALUES (:producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(':producto_id' => $producto_id));
        }
        if ($imagen_producto3 != '') {
            $sql_imagen = "INSERT INTO imagen (url_imagen, id_producto) VALUES (:url_imagen, :producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(
                ':url_imagen' => $imagen_producto3,
                ':producto_id' => $producto_id
            ));
        } else {
            $sql_imagen = "INSERT INTO imagen (id_producto) VALUES (:producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(':producto_id' => $producto_id));
        }
        if ($imagen_producto4 != '') {
            $sql_imagen = "INSERT INTO imagen (url_imagen, id_producto) VALUES (:url_imagen, :producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(
                ':url_imagen' => $imagen_producto4,
                ':producto_id' => $producto_id
            ));
        } else {
            $sql_imagen = "INSERT INTO imagen (id_producto) VALUES (:producto_id)";
            $query_imagen = $this->acceso->prepare(($sql_imagen));
            $query_imagen->execute(array(':producto_id' => $producto_id));
        }
        foreach ($doc_especificaciones as $documento) {
            $sql_documento = "INSERT INTO especificacion_tecnica(url_especificacion, id_producto) VALUES (:documento, :producto_id)";
            $query_documento = $this->acceso->prepare($sql_documento);
            $query_documento->execute(
                array(
                    ':documento' => $documento,
                    ':producto_id' => $producto_id,
                )
            );
        }

        echo 'Producto Agregado';
    }
    //Datos para cargar en el modal de editar
    function cargar_inventario($id_producto)
    {
        $sql = "SELECT id_producto,nombre_producto,precio_producto,descripcion_producto,stock_producto,marca_producto FROM producto WHERE id_producto=:id_producto";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_producto' => $id_producto));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    //Editar producto del inventario
    function editar_inventario($id_productoe, $nombre_productoe, $precio_productoe, $descripcion_productoe, $cantidad_productoe, $marca_productoe)
    {
        try {
            $sql = "UPDATE producto SET nombre_producto=:nombre,precio_producto=:precio,descripcion_producto=:descripcion_producto,stock_producto=:cantidad,marca_producto=:marca_producto WHERE id_producto=:id";
            $query = $this->acceso->prepare($sql);
            $query->bindParam(':id', $id_productoe, PDO::PARAM_INT);
            $query->bindParam(':nombre', $nombre_productoe, PDO::PARAM_STR);
            $query->bindParam(':precio', $precio_productoe, PDO::PARAM_STR);
            $query->bindParam(':descripcion_producto', $descripcion_productoe, PDO::PARAM_STR);
            $query->bindParam(':cantidad', $cantidad_productoe, PDO::PARAM_STR);
            $query->bindParam(':marca_producto', $marca_productoe, PDO::PARAM_STR);
            $query->execute();
            echo 'edits';
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error al editar producto: ' . $e->getMessage();
        }
    }
    //eliminar producto del inventario
    function borrar_producto($id_producto_eliminar)
    {
        $sql = "DELETE FROM producto WHERE id_producto = :id_producto_eliminar;
        ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_producto_eliminar' => $id_producto_eliminar));
        if ($query->rowCount() >= 0) {
            echo 'delete';
        } else {
            echo 'dontdelete';
        }
    }


    //Actualizar stock del producto del inventario
    function actualizarStock($id_product, $cantidad)
    {
        try {
            // Obtener la cantidad actual de productos en la base de datos
            $sql_select = "SELECT cantidad FROM producto WHERE id_producto = :id";
            $query_select = $this->acceso->prepare($sql_select);
            $query_select->bindParam(':id', $id_product, PDO::PARAM_INT);
            $query_select->execute();
            $resultado = $query_select->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $cantidad_actual = $resultado['cantidad'];

                // Calcular la nueva cantidad después de restar el stock
                $nueva_cantidad = $cantidad_actual - $cantidad;

                // Actualizar el stock en la base de datos
                $sql_update = "UPDATE producto SET cantidad=:nueva_cantidad WHERE id_producto=:id";
                $query_update = $this->acceso->prepare($sql_update);
                $query_update->bindParam(':id', $id_product, PDO::PARAM_INT);
                $query_update->bindParam(':nueva_cantidad', $nueva_cantidad, PDO::PARAM_INT);
                $query_update->execute();

                // Imprimir un mensaje indicando el éxito de la actualización
                echo "Stock actualizado correctamente.";
            } else {
                // Si no se encuentra el producto en la base de datos
                echo "No se encontró el producto con el ID proporcionado en la base de datos.";
            }
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error al actualizar stock: ' . $e->getMessage();
        }
    }
}
