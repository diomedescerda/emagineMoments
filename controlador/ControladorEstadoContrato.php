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
        $contratos = $this->modelo->obtenerSolicitudesContrato($_SESSION['usuario']['IdUsuario']);
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