<?php
require_once 'Conexion.php';
require_once 'EstadoContrato.php';

class Contrato 
{
    private $conexion;
    private $estadoContrato;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
        $this->estadoContrato = new EstadoContrato();
    }

    public function crearContrato($idCliente, $idServicio)
    {
        $stmt = $this->conexion->prepare("INSERT INTO Contratos (IdCliente, IdServicio) VALUES (?, ?)");
        $stmt->bind_param("ii", $idCliente, $idServicio);

        if($stmt->execute()){
            $this->estadoContrato->crearEstadoContrato($this->conexion->insert_id, 1);
        } else {
            throw new Exception("Error al crear el contrato: " . $stmt->error);
        }
    }

    public function obtenerContratos()
    {
        $resultado = $this->conexion->query("SELECT * FROM Contratos");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerContratosPrestador($id)
    {
        $stmt = $this->conexion->prepare("
            SELECT c.* 
            FROM Contratos c 
            INNER JOIN Servicios s ON c.IdServicio = s.IdServicio 
            WHERE s.IdPrestador = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerContratosCliente($id)
    {
        $stmt = $this->conexion->prepare("
            SELECT * FROM Contratos 
            WHERE IdCliente = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerContratosPorServicio($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Contratos WHERE IdServicio = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function obtenerContratoPorId($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Contratos WHERE IdContrato = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizarContrato($id, $idCliente, $idServicio)
    {
        $stmt = $this->conexion->prepare("UPDATE Contratos SET IdCliente = ?, IdServicio = ?, WHERE IdContrato = ?");
        $stmt->bind_param("iii", $idCliente, $idServicio, $id);
        return $stmt->execute();
    }

    public function eliminarContrato($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Contratos WHERE IdContrato = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}