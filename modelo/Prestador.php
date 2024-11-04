<?php
require_once 'Conexion.php';

class Prestador 
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearPrestador($id, $idTipoPrestador)
    {
        $stmt = $this->conexion->prepare("INSERT INTO prestadores (IdPrestador, IdTipoPrestador) VALUES (?, ?)");

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("ii",$id, $idTipoPrestador);

        $result = $stmt->execute();

        if ($result === false) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        $stmt->close();

        return $result;
    }
    
    public function eliminarPrestador($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Prestadores WHERE IdPrestador = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}