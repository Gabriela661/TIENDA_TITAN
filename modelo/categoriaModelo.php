<?php
include_once 'conexion.php';

/* CREACION DE LA CLASE CATEGORIA */
class categoria
{
    var $objetos; // Propiedad para almacenar los resultados de las consultas
    var $acceso; // Propiedad para acceder a la conexión PDO

    public function __construct()
    {
        $db = new conexion(); // Se instancia la clase de conexión a la base de datos
        $this->acceso = $db->pdo; // Se obtiene el objeto PDO para acceder a la base de datos
    }

    /* FUNCION PARA LISTAR LA CATEGORIA  */
    function listarCategoria()
    {
        $sql = "SELECT id_categoria, nombre_categoria FROM categoria"; // Consulta SQL para seleccionar todas las categorías
        $query = $this->acceso->prepare($sql); 
        $query->execute();
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de las categorías obtenidas
    }
    /* FIN FUNCION PARA LISTAR LA CATEGORIA  */


    /* FUNCION PARA AGREGAR UNA NUEVA CATEGORIA  */
    function crear_categoria($nombre_categoria)
    {
        $sql = "INSERT INTO categoria (nombre_categoria) VALUES (:nombre_categoria)"; // Consulta SQL para insertar una nueva categoría
        $query = $this->acceso->prepare($sql); // 
        $query->execute(array(':nombre_categoria' => $nombre_categoria)); // Ejecución de la consulta con el nombre de la categoría proporcionado
        echo 'add_categoria'; // Mensaje de éxito para confirma que se agrego la categoria en la BD
    }
    /* FIN DE LA FUNCION PARA AGREGAR UNA NUEVA CATEGORIA  */


    /* FUNCION PARA CARGAR DATOS AL FORMULARIO DE EDICIÓN  */
    function cargar_categoria($id_categoria)
    {
        $sql = "SELECT id_categoria, nombre_categoria FROM categoria WHERE id_categoria=:id_categoria"; // Consulta SQL para obtener los datos de una categoría específica
        $query = $this->acceso->prepare($sql); 
        $query->execute(array(':id_categoria' => $id_categoria)); // Ejecución de la consulta con el ID de la categoría proporcionado
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de los datos de la categoría obtenidos
    }
    /* FIN FUNCION PARA CARGAR DATOS AL FORMULARIO DE EDICIÓN  */


    /* FUNCION PARA EDITAR UNA NUEVA CATEGORIA  */
    function editar_categoria($id_categoria, $nombre_categoria)
    {
        try {
            $sql = "UPDATE categoria SET nombre_categoria=:nombre_categoria WHERE id_categoria=:id"; // Consulta SQL para actualizar el nombre de una categoría
            $query = $this->acceso->prepare($sql); 
            $query->bindParam(':id', $id_categoria, PDO::PARAM_INT); // Vinculación de parámetros
            $query->bindParam(':nombre_categoria', $nombre_categoria, PDO::PARAM_STR); // Vinculación de parámetros
            $query->execute(); 
            echo 'edits'; // Mensaje de éxito
        } catch (PDOException $e) {
            // Manejo de errores en caso de que ocurra una excepción
            echo 'Error al editar la categoría: ' . $e->getMessage();
        }
    }
    /* FIN FUNCION PARA EDITAR UNA NUEVA CATEGORIA  */


    /* FUNCION PARA BORRAR UNA NUEVA CATEGORIA  */
    function borrar_categoria($id_categoria)
    {
        $sql = "DELETE FROM categoria WHERE id_categoria = :id_categoria"; // Consulta SQL para eliminar la categoría y sus productos asociados
        $query = $this->acceso->prepare($sql); 
        $query->execute(array(':id_categoria' => $id_categoria)); // Ejecución de la consulta con el ID de la categoría proporcionado
        if ($query->rowCount() >= 0) {
            echo 'delete'; // Mensaje de éxito si se eliminó la categoría
        } else {
            echo 'dontdelete'; // Mensaje de error si no se pudo eliminar la categoría
        }
    }
    /* FIN FUNCION PARA BORRAR UNA NUEVA CATEGORIA  */
}
