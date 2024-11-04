<?php
require_once 'modelo/TipoPrestador.php';
require_once 'controlador/ControladorUsuario.php';

class ControladorTipoPrestador {
    private $modelo;
    private $controladorUsuario;

    public function __construct() {
        $this->modelo = new TipoPrestador();
        $this->controladorUsuario = new controladorUsuario();
    }

    public function listar() {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $roles = $this->modelo->obtenerTipoPrestadores();
    }
    
    public function crear() {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $this->modelo->crearTipoPrestador($nombre, $descripcion);
    }
    public function actualizar($id) {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $nombre= $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
    
        $this->modelo->actualizarTipoPrestador($id, $nombre, $descripcion);
    }

    public function eliminar($id) {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $this->modelo->eliminarTipoPrestador($id);
    }
}