<?php
require_once 'modelo/Rol.php';
require_once 'controlador/ControladorUsuario.php';

class ControladorRol {
    private $modelo;
    private $controladorUsuario;

    public function __construct() {
        $this->modelo = new Rol();
        $this->controladorUsuario = new controladorUsuario();
    }

    public function listar() {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $roles = $this->modelo->obtenerRoles();
    }
    
    public function crear() {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $this->modelo->crearRol($nombre, $descripcion);
    }
    public function actualizar($id) {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $nombre= $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
    
        $this->modelo->actualizarRol($id, $nombre, $descripcion);
    }

    public function eliminar($id) {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $this->modelo->eliminarRol($id);
    }
}