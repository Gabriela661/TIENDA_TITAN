<?php
include_once 'conexion.php';

//creacion de  la class
class rol
{
    var $objetos;
    var $acceso;
    public function __construct()
    {
        $db = new conexion();
        $this->acceso = $db->pdo;
    }
    // Listar
    function roles()
    {
        $sql = "SELECT r.id_rol, nombre_rol, u.id_usuario, nombre_usuario, apellido_usuario FROM rol r inner join usuario u on u.id_rol = r.id_rol";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    // Listar
    function listar_roles()
    {
        $sql = "SELECT id_rol, nombre_rol FROM rol;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }


    //Datos para cargar en el modal de editar
    function cargar_rol($id_usuario)
    {
        $sql = "SELECT r.id_rol, nombre_rol, id_usuario, nombre_usuario FROM rol r inner join usuario u on u.id_rol = r.id_rol WHERE id_usuario = '$id_usuario';";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    //Editar 
    function editar_rol($nuevo_id_rol, $id_usuario)
    {
        try {
            $sql = "UPDATE usuario SET id_rol=:id_role WHERE id_usuario=:id";
            $query = $this->acceso->prepare($sql);
            $query->bindParam(':id', $id_usuario, PDO::PARAM_INT);
            $query->bindParam(':id_role', $nuevo_id_rol, PDO::PARAM_STR);
            $query->execute();
            echo 'edits';
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error al editar el rol: ' . $e->getMessage();
        }
    }
}
