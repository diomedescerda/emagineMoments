<?php
require_once 'modelo/Contrato.php';

class ControladorContrato {
    private $modelo;
    //private $controladorUsuario;

    public function __construct() {
        $this->modelo = new Contrato();
        //$this->controladorUsuario = new ControladorUsuario();
    }

    public function listarMisContratos($idRol) {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        switch ($idRol) {
            case 2:
                $contratos = $this->modelo->obtenerContratosCliente($_SESSION['usuario']['IdUsuario']);
                break;
            
            case 3:
                $contratos = $this->modelo->obtenerContratosPrestador($_SESSION['usuario']['IdUsuario']);
                break;

            default:
                break;
        }
        require 'vista/contratos/listar.php';
    }

    public function mostrarFormularioCrear() {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        require 'vista/contratos/crear.php';
    }

    public function crear($idServicio) {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        $idCliente = $_SESSION['usuario']['IdUsuario'];
        $this->modelo->crearContrato($idCliente, $idServicio);
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
    
        $this->modelo->actualizarContrato($id, $idCliente, $idServicio);
        header('Location: index.php?action=listarMisContratos');
    }

    public function eliminar($id) {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        $this->modelo->eliminarContrato($id);
        header('Location: index.php?action=listarMisContratos');
    }
}