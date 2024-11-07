<?php
require_once 'Conexion.php';

class Review 
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }
   
    public function crearReview($idCliente, $idContrato, $comentario, $calificacion)
    {
        $stmt = $this->conexion->prepare("INSERT INTO Reviews (IdCliente, IdContrato, Comentario, Calificacion) VALUES (?, ?, ?, ?)");

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("iisd", $idCliente, $idContrato, $comentario, $calificacion);

        $result = $stmt->execute();

        if ($result === false) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        $stmt->close();

        return $result;
    }
    
    public function obtenerReviews()
    {
        $resultado = $this->conexion->query("SELECT * FROM Reviews");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerReviewsCliente($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Reviews WHERE IdCliente = ?");
        $stmt->bind_param("i", $id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
        $Reviews = $result->fetch_all(MYSQLI_ASSOC);
    
        $stmt->close();
    
        return $Reviews;
    }

    public function obtenerReviewsPrestador($id)
    {
        $stmt = $this->conexion->prepare("
        SELECT r.* 
        FROM Reviews r 
        INNER JOIN Contratos c ON r.IdContrato = c.IdContrato 
        INNER JOIN Servicios s ON c.IdServicio = s.IdServicio 
        WHERE s.IdPrestador = ?;");
        $stmt->bind_param("i", $id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
        $Reviews = $result->fetch_all(MYSQLI_ASSOC);
    
        $stmt->close();
    
        return $Reviews;
    }

    public function obtenerReviewsServicio($id)
    {
        $stmt = $this->conexion->prepare("
        SELECT r.* 
        FROM Reviews r 
        INNER JOIN Contratos c ON r.IdContrato = c.IdContrato 
        WHERE c.IdServicio = ?;");
        $stmt->bind_param("i", $id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
        $Reviews = $result->fetch_all(MYSQLI_ASSOC);
    
        $stmt->close();
    
        return $Reviews;
    }
    
    public function obtenerReviewPorId($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Reviews WHERE IdReseña = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizarReview($id, $comentario, $calificacion)
    {
        $stmt = $this->conexion->prepare("UPDATE Reviews SET Comentario = ?, Calificicacion = ? WHERE IdReseña = ?");
        $stmt->bind_param("sdi", $comentario, $calificacion, $id);

        return $stmt->execute();
    }

    public function eliminarReview($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Reviews WHERE IdReseña = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}