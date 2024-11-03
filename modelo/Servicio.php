<?php
require_once 'Conexion.php';

class Servicio
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearServicio($idTipoServicio, $IdPrestador, $Costo, $Descripcion)
    {
        $stmt = $this->conexion->prepare("INSERT INTO Servicios (IdTipoServicio, IdPrestador, Costo, Descripcion) VALUES (?, ?, ?, ?)");

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("iids", $idTipoServicio, $IdPrestador, $Costo, $Descripcion);

        $result = $stmt->execute();

        if ($result === false) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        $stmt->close();

        return $result;
    }
    
    public function obtenerServicios()
    {
        $resultado = $this->conexion->query("SELECT * FROM Servicios");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerMisServicios($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Servicios WHERE IdPrestador = ?");
        $stmt->bind_param("i", $id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
        $servicios = $result->fetch_all(MYSQLI_ASSOC);
    
        $stmt->close();
    
        return $servicios;
    }
    
    public function obtenerServicioPorId($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Servicios WHERE IdServicio = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizarServicio($id, $IdTipoServicio, $IdPrestador, $Costo, $Descripcion)
    {
        $stmt = $this->conexion->prepare("UPDATE Servicios SET IdTipoServicio = ?, IdPrestador = ?, Costo = ?, Descripcion = ? WHERE IdServicio = ?");
        $stmt->bind_param("iidsi", $IdTipoServicio, $IdPrestador, $Costo, $Descripcion, $id);

        return $stmt->execute();
    }

    public function eliminarServicio($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Servicios WHERE IdServicio = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}