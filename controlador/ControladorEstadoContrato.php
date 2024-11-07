<?php
require_once 'modelo/EstadoContrato.php';

class ControladorEstadoContrato {
    private $modelo;
    //private $controladorUsuario;

    public function __construct() {
        $this->modelo = new EstadoContrato();
    }

    public function listarSolicitudesContrato() {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
        switch ($_SESSION['usuario']['IdRol'])
        {
            case 2:
                $contratos = $this->modelo->obtenerSolicitudesContratoUsuario($_SESSION['usuario']['IdUsuario']);
                break;
            case 3:
                $contratos = $this->modelo->obtenerSolicitudesContratoProveedor($_SESSION['usuario']['IdUsuario']);
                break;
            default;
                break;
        }
        $estadoContratos = $this->modelo->obtenerEstadosContrato();
        require 'vista/contratos/solicitud.php';
    }

    public function actualizar($id, $idTipoEstadoContrato) {
        //$this->controladorUsuario->verificarAccesoAdministrador();
        session_start();
    
        $this->modelo->actualizarEstadoContrato($id, $idTipoEstadoContrato);
        header('Location: index.php?action=listarSolicitudes');
    }
}