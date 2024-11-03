<?php
class Conexion {
    private static $instance = null;
    private $conexion;

    private function __construct() {
        $config = require 'config/config.php';

        if (!is_array($config)) {
            die("Error: La configuración no es un array.");
        }

        $this->conexion = new mysqli($config['host'], $config['usuario'], $config['contrasena'], $config['base_de_datos']);

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function cerrarConexion() {
        $this->conexion->close();
    }
}
?>