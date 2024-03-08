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

    //listar personal
    function listar_personal()
    {
        $sql = "SELECT u.id_usuario,u.nombre_usuario,u.apellido_usuario,u.correo_usuario,u.foto_usuario, r.nombre_rol FROM usuario u INNER JOIN rol r ON u.id_rol = r.id_rol WHERE r.id_rol=1";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    //listar cliente
    function listar_cliente()
    {
        $sql = "SELECT id_usuario,nombre_usuario,apellido_usuario,correo_usuario,foto_usuario FROM usuario where id_rol=3";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    //listar roles
    function rol_usuario()
    {
        $sql = "SELECT id_rol,nombre_rol FROM rol";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }


    //editar usuario
    function obtenerUsuario($id_usuario)
    {
        $sql = "SELECT nombres,apellidos,dni,telefono,correo_electronico,direccion_usuario FROM usuario WHERE id_usuario=:id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario' => $id_usuario));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    //Datos para cargar en el modal de editar
    function cargar_usuario($id_usuario)
    {
        $sql = "SELECT id_usuario,nombres,apellidos,dni,telefono,correo_electronico,direccion_usuario FROM usuario WHERE id_usuario=:id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario' => $id_usuario));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    //editar usuario
    function editar_usuario($id_usuarioe, $nombrese, $apellidose, $dnie, $telefonoe, $correo_electronicoe, $direccion_usuarioe)
    {
        try {
            $sql = "UPDATE usuario SET nombres=:nombre, apellidos=:apellido, dni=:dni, telefono=:telefono, correo_electronico=:correo, direccion_usuario=:direccion WHERE id_usuario=:id";
            $query = $this->acceso->prepare($sql);
            $query->bindParam(':id', $id_usuarioe, PDO::PARAM_INT);
            $query->bindParam(':nombre', $nombrese, PDO::PARAM_STR);
            $query->bindParam(':apellido', $apellidose, PDO::PARAM_STR);
            $query->bindParam(':dni', $dnie, PDO::PARAM_STR);
            $query->bindParam(':telefono', $telefonoe, PDO::PARAM_STR);
            $query->bindParam(':correo', $correo_electronicoe, PDO::PARAM_STR);
            $query->bindParam(':direccion', $direccion_usuarioe, PDO::PARAM_STR);
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

    //crear usuario
    function crear_usuario($nombre_usuario, $apellido_usuario, $dni_usuario, $telefono_usuario, $correo_electronico_usuario, $hashed_password, $direccion_usuario, $foto_usuario, $rol_usuario)
    {
        $sql = "INSERT INTO usuario (nombres,apellidos,dni,telefono,correo_electronico,password,direccion_usuario,foto_usuario,rol_usuario) 
        VALUES (:nombre_usuario,:apellido_usuario,:dni_usuario,:telefono_usuario,:correo_electronico_usuario,:password_usuario,:direccion_usuario,:foto_usuario,:rol_usuario )";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(

            ':nombre_usuario' => $nombre_usuario,
            ':apellido_usuario' => $apellido_usuario,
            ':dni_usuario' => $dni_usuario,
            ':telefono_usuario' => $telefono_usuario,
            ':correo_electronico_usuario' => $correo_electronico_usuario,
            ':password_usuario' => $hashed_password,
            ':direccion_usuario' => $direccion_usuario,
            ':foto_usuario' => $foto_usuario,
            ':rol_usuario' => $rol_usuario
        ));
        echo 'add';
    }
}
