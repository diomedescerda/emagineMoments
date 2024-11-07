<?php
require_once 'Conexion.php';

class EstadoContrato 
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearEstadoContrato($idContrato, $idTipoEstadoContrato)
    {
        $stmt = $this->conexion->prepare("INSERT INTO EstadosContrato (IdContrato, IdTipoEstadoContrato) VALUES (?, ?)");

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("ii",$idContrato, $idTipoEstadoContrato);

        $result = $stmt->execute();

        if ($result === false) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        $stmt->close();

        return $result;
    }
    
    public function obtenerEstadosContrato()
    {
        $resultado = $this->conexion->query("SELECT * FROM EstadosContrato");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function actualizarEstadoContrato($id, $idContrato, $idTipoEstadoContrato)
    {
        $stmt = $this->conexion->prepare("UPDATE EstadosContrato SET IdContrato = ?, IdTipoEstadoContrato = ? WHERE IdEstadoContrato = ?");
        $stmt->bind_param("iii", $idContrato, $idTipoEstadoContrato, $id);

        return $stmt->execute();
    }

    public function eliminarEstadoContrato($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM EstadosContrato WHERE IdEstadoContrato = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}