<?php
require_once 'Conexion.php';

class TipoPrestador
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearTipoPrestador($Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("INSERT INTO TiposPrestador (Nombre, Descripcion) VALUES (?, ?)");

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
    
    public function obtenerTipoPrestadores()
    {
        $resultado = $this->conexion->query("SELECT * FROM TiposPrestador");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function actualizarTipoPrestador($id, $Nombre, $Descripcion)
    {
        $stmt = $this->conexion->prepare("UPDATE TiposPrestador SET Nombre = ?, Descripcion = ? WHERE IdTipoPrestador = ?");
        $stmt->bind_param("ssi", $Nombre, $Descripcion, $id);

        return $stmt->execute();
    }

    public function eliminarTipoPrestador($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM TiposPrestador WHERE IdTipoPrestador = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}