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

        $stmt->bind_param("ii", $idContrato, $idTipoEstadoContrato);

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

    public function obtenerSolicitudesContrato($id)
    {
        $stmt = $this->conexion->prepare("
        SELECT c.* 
        FROM Contratos c 
        INNER JOIN Servicios s ON c.IdServicio = s.IdServicio 
        INNER JOIN EstadosContrato ec ON c.IdContrato = ec.IdContrato 
        WHERE s.IdPrestador = ? AND ec.IdTipoEstadoContrato = 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function actualizarEstadoContrato($id, $idTipoEstadoContrato)
    {
        $stmt = $this->conexion->prepare("UPDATE EstadosContrato SET IdTipoEstadoContrato = ? WHERE IdEstadoContrato = ?");
        $stmt->bind_param("ii", $idTipoEstadoContrato, $id);

        return $stmt->execute();
    }

    public function eliminarEstadoContrato($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM EstadosContrato WHERE IdEstadoContrato = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}