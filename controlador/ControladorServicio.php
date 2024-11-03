<?php
require_once 'modelo/Servicio.php';

class ControladorServicio {
    private $modelo;

    public function __construct() {
        $this->modelo = new Servicio();
    }

    public function listarMisServicios() {
        //$this->verificarAccesoAdministrador();
        session_start();
        $servicios = $this->modelo->obtenerMisServicios($_SESSION['usuario']['IdUsuario']);
        require 'vista/servicios/listar.php';
    }

    public function mostrarFormularioCrear() {
        //$this->verificarAccesoAdministrador();
        require 'vista/servicios/crear.php';
    }

    public function crear() {
        session_start();
        //$this->verificarAccesoAdministrador();
        $idTipoServicio = $_POST['IdTipoServicio'];
        $idPrestador = $_SESSION['usuario']['IdUsuario'];
        $costo = $_POST['Costo'];
        $descripcion = $_POST['Descripcion'];
        $this->modelo->crearServicio($idTipoServicio, $idPrestador, $costo, $descripcion);
        header('Location: index.php?action=listarServicios');
    }

    public function mostrarFormularioEditar($id) {
        session_start();
        //$this->verificarAccesoAdministrador();
        $servicio = $this->modelo->obtenerServicioPorId($id);
        require 'vista/servicios/editar.php';
    }

    public function actualizar($id) {
        session_start();
        //$this->verificarAccesoAdministrador();

        $idTipoServicio = $_POST['IdTipoServicio'];
        $idPrestador = $_SESSION['usuario']['IdUsuario'];
        $costo = $_POST['Costo'];
        $descripcion = $_POST['Descripcion'];
    
        $this->modelo->actualizarServicio($id, $idTipoServicio, $idPrestador, $costo, $descripcion);
        header('Location: index.php?action=listarServicios');
    }
}
