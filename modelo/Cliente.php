<?php
require_once 'Conexion.php';

class Cliente 
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearCliente($id)
    {
        $stmt = $this->conexion->prepare("INSERT INTO Clientes (IdCliente) VALUES (?)");

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("i",$id);

        $result = $stmt->execute();

        if ($result === false) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        $stmt->close();

        return $result;
    }
    
    public function eliminarCliente($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Clientes WHERE IdCliente = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}