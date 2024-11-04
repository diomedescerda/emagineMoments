<?php
require_once 'Conexion.php';

class TipoServicio
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearTipoServicio($Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("INSERT INTO TiposServicio(Nombre, Descripcion) VALUES (?, ?)");

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
    
    public function obtenerTipoServicios()
    {
        $resultado = $this->conexion->query("SELECT * FROM TiposServicio");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function actualizarTipoServicio($id, $Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("UPDATE TiposServicio SET Nombre = ?, Descripcion = ? WHERE IdTipoServicio = ?");
        $stmt->bind_param("ssi", $Nombre, $Descripcion, $id);

        return $stmt->execute();
    }

    public function eliminarTipoServicio($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM TiposServicio WHERE IdTipoServicio = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}