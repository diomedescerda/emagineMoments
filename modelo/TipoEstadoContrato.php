<?php
require_once 'Conexion.php';

class TipoEstadoContrato 
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearTipoEstadoContrato($Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("INSERT INTO TiposEstadoContrato (Nombre, Descripcion) VALUES (?, ?)");

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
    
    public function obtenerTiposEstadoContrato()
    {
        $resultado = $this->conexion->query("SELECT * FROM TiposEstadoContrato");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function actualizarTipoEstadoContrato($id, $Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("UPDATE TiposEstadoContrato SET Nombre = ?, Descripcion = ? WHERE IdTipoEstadoContrato = ?");
        $stmt->bind_param("ssi", $Nombre, $Descripcion, $id);

        return $stmt->execute();
    }

    public function eliminarTipoEstadoContrato($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM TiposEstadoContrato WHERE IdTipoEstadoContrato = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}