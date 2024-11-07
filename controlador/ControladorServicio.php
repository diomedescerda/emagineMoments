<?php
require_once 'modelo/Servicio.php';
require_once 'modelo/tiposervicio.php';
require_once 'controladorUsuario.php';

class ControladorServicio {
    private $modelo;
    private $tipoServicio;
    private $controladorUsuario;

    public function __construct() {
        $this->modelo = new Servicio();
        $this->tipoServicio = new TipoServicio();
        $this->controladorUsuario = new ControladorUsuario();
    }

    public function listarMisServicios() {
        $this->controladorUsuario->verificarAccesoUsuario();
        $servicios = $this->modelo->obtenerMisServicios($_SESSION['usuario']['IdUsuario']);
        require 'vista/servicios/listar.php';
    }

    public function mostrarFormularioCrear() {
        $this->controladorUsuario->verificarAccesoUsuario();
        $tipoServicios = $this->tipoServicio->obtenerTipoServicios();
        require 'vista/servicios/crear.php';
    }

    public function crear() {
        $this->controladorUsuario->verificarAccesoUsuario();
        $idTipoServicio = $_POST['IdTipoServicio'];
        $idPrestador = $_SESSION['usuario']['IdUsuario'];
        $costo = $_POST['Costo'];
        $descripcion = $_POST['Descripcion'];
        $this->modelo->crearServicio($idTipoServicio, $idPrestador, $costo, $descripcion);
        header('Location: index.php?action=listarServicios');
    }

    public function mostrarFormularioEditar($id) {
        $this->controladorUsuario->verificarAccesoUsuario();
        $servicio = $this->modelo->obtenerServicioPorId($id);
        $tipoServicios = $this->tipoServicio->obtenerTipoServicios();
        require 'vista/servicios/editar.php';
    }

    public function actualizar($id) {
        $this->controladorUsuario->verificarAccesoUsuario();
        $idTipoServicio = $_POST['IdTipoServicio'];
        $idPrestador = $_SESSION['usuario']['IdUsuario'];
        $costo = $_POST['Costo'];
        $descripcion = $_POST['Descripcion'];
    
        $this->modelo->actualizarServicio($id, $idTipoServicio, $idPrestador, $costo, $descripcion);
        header('Location: index.php?action=listarServicios');
    }

    public function eliminar($id) {
        $this->controladorUsuario->verificarAccesoUsuario();
        $this->modelo->eliminarServicio($id);
        header('Location: index.php?action=listarServicios');
    }
    public function mostrarServicios() {
        $servicios = $this->modelo->obtenerServicios();
        require 'vista/servicios.php';
    }
}