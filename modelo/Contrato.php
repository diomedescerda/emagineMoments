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
        $stmt = $this->conexion->prepare("INSERT INTO Contratos (IdCliente, IdServicio, IdEstadoContrato) VALUES (?, ?, 1)");
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
            SELECT 
                c.IdContrato,
                s.IdServicio,
                u.PrimerNombre AS NombreCliente,
                p.PrimerNombre AS NombrePrestador,
                s.Descripcion AS Descripcion,
                s.Costo AS Costo,
                c.FechaYHora AS FechaYHora,
                tec.Nombre AS EstadoServicio
            FROM 
                contratos c
            INNER JOIN 
                usuarios u ON c.IdCliente = u.IdUsuario
            INNER JOIN 
                servicios s ON c.IdServicio = s.IdServicio
            INNER JOIN 
                usuarios p ON s.IdPrestador = p.IdUsuario
            INNER JOIN 
                estadoscontrato ec ON c.IdContrato = ec.IdContrato
            INNER JOIN 
                tiposestadocontrato tec ON ec.IdTipoEstadoContrato = tec.IdTipoEstadoContrato
            WHERE 
                s.IdPrestador = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerContratosCliente($id)
    {
        $stmt = $this->conexion->prepare("
        SELECT 
            c.IdContrato,
            s.IdServicio,
            u.PrimerNombre AS NombreCliente,
            p.PrimerNombre AS NombrePrestador,
            s.Descripcion AS Descripcion,
            s.Costo AS Costo,
            c.FechaYHora AS FechaYHora,
            tec.Nombre AS EstadoServicio
        FROM 
            contratos c
        INNER JOIN 
            usuarios u ON c.IdCliente = u.IdUsuario
        INNER JOIN 
            servicios s ON c.IdServicio = s.IdServicio
        INNER JOIN 
            usuarios p ON s.IdPrestador = p.IdUsuario
        INNER JOIN 
            estadoscontrato ec ON c.IdContrato = ec.IdContrato
        INNER JOIN 
            tiposestadocontrato tec ON ec.IdTipoEstadoContrato = tec.IdTipoEstadoContrato
        WHERE 
            c.IdCliente = ?");
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