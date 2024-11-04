<?php
require_once 'modelo/TipoServicio.php';
require_once 'controlador/ControladorUsuario.php';

class ControladorTipoServicio {
    private $modelo;
    private $controladorUsuario;

    public function __construct() {
        $this->modelo = new TipoServicio();
        $this->controladorUsuario = new controladorUsuario();
    }

    public function listar() {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $roles = $this->modelo->obtenerTipoServicios();
    }
    
    public function crear() {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $this->modelo->crearTipoServicio($nombre, $descripcion);
    }
    public function actualizar($id) {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $nombre= $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
    
        $this->modelo->actualizarTipoServicio($id, $nombre, $descripcion);
    }

    public function eliminar($id) {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $this->modelo->eliminarTipoServicio($id);
    }
}