<?php
require_once 'modelo/Contrato.php';

class ControladorContrato {
    private $modelo;
    //private $controladorUsuario;

    public function __construct() {
        $this->modelo = new Contrato();
        //$this->controladorUsuario = new ControladorUsuario();
    }

    public function listarMisContratos() {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        $contratos = $this->modelo->obtenerMisContratos($_SESSION['usuario']['IdUsuario']);
        require 'vista/contratos/listar.php';
    }

    public function mostrarFormularioCrear() {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        require 'vista/contratos/crear.php';
    }

    public function crear() {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        $idCliente = $_POST['IdCliente'];
        $idServicio = $_POST['IdServicio'];
        $costo = $_POST['Costo'];
        $this->modelo->crearContrato($idCliente, $idServicio, $costo);
        header('Location: index.php?action=listarMisContratos');
    }

    public function mostrarFormularioEditar($id) {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        $contrato = $this->modelo->obtenerContratoPorId($id);
        require 'vista/contratos/editar.php';
    }

    public function actualizar($id) {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        $idCliente = $_POST['IdTipoServicio'];
        $idServicio = $_SESSION['usuario']['IdUsuario'];
        $costo = $_POST['Costo'];
    
        $this->modelo->actualizarContrato($id, $idCliente, $idServicio, $costo);
        header('Location: index.php?action=listarMisContratos');
    }

    public function eliminar($id) {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        $this->modelo->eliminarContrato($id);
        header('Location: index.php?action=listarMisContratos');
    }
}