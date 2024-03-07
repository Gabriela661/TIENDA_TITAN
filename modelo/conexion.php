<?php
class Conexion
{
    private $servidor = "localhost";
    private $db = "titan_db";
    private $charset = "utf8mb4";
    private $usuario = "root";
    private $password = "";
    public $pdo = null;
    private $atributos = [PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];

    function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->servidor};dbname={$this->db};charset={$this->charset}", $this->usuario, $this->password, $this->atributos);
        } catch (PDOException $e) {
            // Manejar la excepción aquí
            echo "Error de conexión: " . $e->getMessage();
            // Opcionalmente, puedes lanzar la excepción nuevamente para que sea manejada por el código que llama a la instancia de la clase Conexion
            // throw $e;
        }
    }
}

try {
    $conexion = new Conexion();
    if ($conexion->pdo) {
        echo "Conexión correcta: Se estableció una conexión PDO.";
    } else {
        echo "Error al conectar con la base de datos.";
    }
} catch (PDOException $e) {
    // Si la conexión falla, puedes manejar la excepción aquí
    echo "Error al conectar con la base de datos: " . $e->getMessage();
}
