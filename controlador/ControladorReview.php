<?php
require_once 'modelo/Review.php';
require_once 'modelo/Servicio.php';
require_once 'controladorUsuario.php';

class ControladorReview
{
    private $modelo;
    private $servicio;
    private $controladorUsuario;

    public function __construct()
    {
        $this->modelo = new Review();
        $this->servicio = new Servicio();
        $this->controladorUsuario = new ControladorUsuario();
    }

    public function mostrarVistaReview($idServicio, $idContrato)
    {
        $this->controladorUsuario = new ControladorUsuario();
        $servicio = $this->servicio->obtenerServicioPorId($idServicio);
        require 'vista/review/calificar.php';
    }
    public function crear($idContrato)
    {
        $this->controladorUsuario = new ControladorUsuario();
        $idCliente = $_SESSION['usuario']['IdUsuario'];
        $comentario = $_POST['Comentario'];
        $calificacion = $_POST['Calificacion'];
        $this->modelo->crearReview($idCliente, $idContrato, $comentario, $calificacion);
        header('Location: index.php?action=listarServicios');
    }

}
