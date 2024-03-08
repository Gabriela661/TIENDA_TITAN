<?php
include_once 'conexion.php';

class usuario
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }
    // //logerase
    // function Logearse($email, $pass)
    // {
    //     $sql = "SELECT * FROM usuario inner join rol on rol_usuario=id_rol WHERE correo_electronico=:email and password=:pass;";
    //     $query = $this->acceso->prepare($sql);
    //     $query->execute(array(':email' => $email, ':pass' => $pass));
    //     $this->objetos = $query->fetchAll();
    //     return $this->objetos;
    // }


  /* FUNCION PARA LISTAR EL PERSONAL DE LA BASE DE DATOS*/
    function listar_personal()
    {
        $sql = "SELECT u.id_usuario,u.nombre_usuario,u.apellido_usuario,u.correo_usuario,u.foto_usuario, r.nombre_rol FROM usuario u INNER JOIN rol r ON u.id_rol = r.id_rol WHERE  r.id_rol IN (2, 3, 4)";// Consulta SQL para seleccionar todas los usuarios tipo personal
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        // Devolución de los personales
        // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos;
    }
    /* FIN FUNCION PARA LISTAR EL PERSONAL DE LA BASE DE DATOS*/


  /* FUNCION PARA LISTAR LOS CLIENTES DE LA BASE DE DATOS*/
    function listar_cliente()
    {
        $sql = "SELECT id_usuario,nombre_usuario,apellido_usuario,correo_usuario,foto_usuario FROM usuario where id_rol=3";
        // Consulta SQL para seleccionar todas los clientes
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos;// Devolución de los clientes obtenidas
    }
    /* FIN FUNCION PARA LISTAR LOS CLIENTES DE LA BASE DE DATOS*/


    /*FUNCION PARA LISTAR LOS ROLES EN EL MODAL DE AGREGAR PRODUCTOS*/
    function rol_usuario()
    {
        $sql = "SELECT id_rol,nombre_rol FROM rol";
        // Consulta SQL para seleccionar todas los roles
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        // Almacenamiento de los resultados en la propiedad 'objetos'
        return $this->objetos;
    }
    /*FIN FUNCION PARA LISTAR LOS ROLES EN EL MODAL DE AGREGAR PRODUCTOS*/


    /* FUNCION PARA AGREGAR UN NUEVO USUARIO  */
    function crear_usuario($nombre_usuario, $apellido_usuario,  $correo_electronico_usuario, $hashed_password, $foto_usuario, $rol_usuario)
    {
        $sql = "INSERT INTO usuario (nombre_usuario,apellido_usuario,correo_usuario,password,foto_usuario,id_rol) 
        VALUES (:nombre_usuario,:apellido_usuario,:correo_usuario,:password,:foto_usuario,:id_rol )";
         // Consulta SQL para agregrar los prodcutos  al db
        $query = $this->acceso->prepare($sql);

        $query->execute(array(

            ':nombre_usuario' => $nombre_usuario,
            ':apellido_usuario' => $apellido_usuario,
            ':correo_usuario' => $correo_electronico_usuario,
            ':password' => $hashed_password,
            ':foto_usuario' => $foto_usuario,
            ':id_rol' => $rol_usuario
        ));
        echo 'add';
        //devuelvo en mensaje de exito cuando se registe un usuario
    }
        /* FUNCION PARA AGREGAR UN NUEVO USUARIO  */


    //editar usuario
    function obtenerUsuario($id_usuario)
    {
        $sql = "SELECT id_usuario,nombres,apellidos,dni,telefono,correo_electronico,direccion_usuario FROM usuario WHERE id_usuario=:id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario' => $id_usuario));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    //Datos para cargar en el modal de editar
    function cargar_usuario($id_usuario)
    {
        $sql = "SELECT id_usuario,nombre_usuario,apellido_usuario,correo_usuario FROM usuario WHERE id_usuario=:id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario' => $id_usuario));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    //editar usuario
    function editar_usuario($id_usuarioe, $nombrese, $apellidose,$correo_usuarioe)
    {
        try {
            $sql = "UPDATE usuario SET nombre_usuario=:nombre_usuario, apellido_usuario=:apellido_usuario,correo_usuario=:correo_usuario WHERE id_usuario=:id";
            $query = $this->acceso->prepare($sql);
            $query->bindParam(':id', $id_usuarioe, PDO::PARAM_INT);
            $query->bindParam(':nombre_usuario', $nombrese, PDO::PARAM_STR);
            $query->bindParam(':apellido_usuario', $apellidose, PDO::PARAM_STR);
            $query->bindParam(':correo_usuario', $correo_usuarioe, PDO::PARAM_STR);
            $query->execute();
            echo 'edits';
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error al editar el usuario: ' . $e->getMessage();
        }
    }

    //eliminar usuario
    function borrar_usuario($id_usuario)
    {
        $sql = "DELETE FROM compras WHERE cliente_designado = (SELECT id_usuario FROM usuario WHERE id_usuario = :id_usuario);
        DELETE FROM usuario WHERE id_usuario = :id_usuario;
        ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario' => $id_usuario));
        if ($query->rowCount() >= 0) {
            echo 'delete';
        } else {
            echo 'dontdelete';
        }
    }

}
