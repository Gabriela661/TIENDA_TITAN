<?php
include_once 'conexion.php';

class caja
{
    var $objetos; // Propiedad para almacenar los resultados de las consultas
    var $acceso; // Propiedad para acceder a la conexión PDO

    public function __construct()
    {
        $db = new conexion(); // Se instancia la clase de conexión a la base de datos
        $this->acceso = $db->pdo; // Se obtiene el objeto PDO para acceder a la base de datos
    }

    /* FUNCION PARA LISTAR INGRESOS  */
    function listarIngresos()
    {
        $sql = "SELECT id_caja, concepto, accion, monto, created_at
        FROM caja WHERE accion = 'depositar'"; // Consulta SQL para seleccionar todas las categorías
        $query = $this->acceso->prepare($sql);
        $query->execute(); // Ejecución de la consulta
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de las categorías obtenidas
    }

    /* FUNCION PARA LISTAR EGRESOS  */
    function listarEgresos()
    {
        $sql = "SELECT id_caja, concepto, accion, monto, created_at
        FROM caja WHERE accion = 'retirar'";
        $query = $this->acceso->prepare($sql);
        $query->execute(); // Ejecución de la consulta
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de datos obtenidas
    }

    /* FUNCION PARA LISTAR EGRESOS  */
    function listar($id_caja)
    {
        $sql = "SELECT id_caja, concepto, accion, monto, created_at
        FROM caja where id_caja = :id_caja";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_caja' => $id_caja)); // Ejecución de la consulta
        $this->objetos = $query->fetchAll(); // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos; // Devolución de datos obtenidas
    }



    /* FUNCION PARA AGREGAR UN NUEVO INGRESO  */
    function crear_caja($accion, $monto,  $concepto, $id_usuario)
    {
        $sql = "INSERT INTO caja (accion, monto, concepto, id_usuario) 
        VALUES (:accion, :monto, :concepto, :id_usuario)";
        // Consulta SQL para agregrar los prodcutos  al db
        $query = $this->acceso->prepare($sql);

        $query->execute(array(
            ':accion' => $accion,
            ':monto' => $monto,
            ':concepto' => $concepto,
            ':id_usuario' => $id_usuario,
        ));
        echo 'add';
        //devuelvo en mensaje de exito cuando se registe
    }

    //editar
    function editar_caja($id_caja, $concepto, $accion, $monto, $id_usuario)
    {
        try {
            $sql = "UPDATE caja SET concepto=:concepto, accion=:accion, monto=:monto, id_usuario=:id_usuario WHERE id_caja=:id_caja";
            $query = $this->acceso->prepare($sql);
            $query->bindParam(':id_caja', $id_caja, PDO::PARAM_INT);
            $query->bindParam(':concepto', $concepto, PDO::PARAM_STR);
            $query->bindParam(':accion', $accion, PDO::PARAM_STR);
            $query->bindParam(':monto', $monto, PDO::PARAM_STR);
            $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
            $query->execute();
            echo 'edits';
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error al editar el caja: ' . $e->getMessage();
        }
    }

    //eliminar
    function borrar_caja($id_caja)
    {
        $sql = "DELETE FROM caja WHERE id_caja = :id_caja;
            ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_caja' => $id_caja));
        if ($query->rowCount() >= 0) {
            echo 'delete';
        } else {
            echo 'dontdelete';
        }
    }
}
