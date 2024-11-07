<?php
require_once 'modelo/EstadoContrato.php';
require_once 'controladorUsuario.php';

class ControladorEstadoContrato {
    private $modelo;
    private $controladorUsuario;

    public function __construct() {
        $this->modelo = new EstadoContrato();
        $this->controladorUsuario = new ControladorUsuario();
    }

    public function listarSolicitudesContrato() {
        $this->controladorUsuario->verificarAccesoUsuario();
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
        $this->controladorUsuario->verificarAccesoUsuario();
        $this->modelo->actualizarEstadoContrato($id, $idTipoEstadoContrato);
        header('Location: index.php?action=listarSolicitudes');
    }
}