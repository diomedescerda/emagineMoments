<?php
require_once 'modelo/Review.php';
require_once 'modelo/Servicio.php';

class ControladorReview
{
    private $modelo;
    //private $controladorUsuario;
    private $servicio;

    public function __construct()
    {
        $this->modelo = new Review();
        $this->servicio = new Servicio();
    }

    public function mostrarVistaReview($idServicio, $idContrato)
    {
        session_start();
        $servicio = $this->servicio->obtenerServicioPorId($idServicio);
        require 'vista/review/calificar.php';
    }
    public function crear($idContrato)
    {
        session_start();
        $idCliente = $_SESSION['usuario']['IdUsuario'];
        $comentario = $_POST['Comentario'];
        $calificacion = $_POST['Calificacion'];
        $this->modelo->crearReview($idCliente, $idContrato, $comentario, $calificacion);
        header('Location: index.php?action=listarServicios');
    }

}
