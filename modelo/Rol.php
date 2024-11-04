<?php
require_once 'Conexion.php';

class Rol 
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearRol($Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("INSERT INTO Roles (Nombre, Descripcion) VALUES (?, ?)");

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("ss",$Nombre, $Descripcion);

        $result = $stmt->execute();

        if ($result === false) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        $stmt->close();

        return $result;
    }
    
    public function obtenerRoles()
    {
        $resultado = $this->conexion->query("SELECT * FROM Roles");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function actualizarRol($id, $Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("UPDATE Roles SET Nombre = ?, Descripcion = ? WHERE IdRol = ?");
        $stmt->bind_param("ssi", $Nombre, $Descripcion, $id);

        return $stmt->execute();
    }

    public function eliminarRol($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Roles WHERE IdRol = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}