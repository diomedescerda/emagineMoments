<?php
require_once 'modelo/Usuario.php';

class ControladorUsuario {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function mostrarLogin() {
        require 'vista/login.php';
    }

    public function mostrarLaberinto() {
        require 'vista/laberinto.php';
    }

    public function iniciarSesion() {
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        $usuario = $this->modelo->verificarCredenciales($email, $contrasena);
        
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            if($usuario['IdRol'] == 1){header('Location: index.php?action=listar');}
            else {header('Location: index.php');}
                
        } else {
            header('Location: index.php?action=iniciarSesion&error=1');
        }
    }

    public function cerrarSesion() {
        session_start();
        session_destroy(); 
        header('Location: index.php?action=iniciarSesion');
    }

    public function mostrarRegistro() {
        require 'vista/registro.php';  
    }

    public function mostrarBienvenida(){
        require 'vista/bienvenida.php';
    }

    public function registrarUsuario($idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena, $direccion, $telefono) {
        if ($this->modelo->registrar($idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena, $direccion, $telefono)) {
	        header('Location: ./');
        } else {
            echo "Error al registrar.";
        }
    }

    public function listar() {
        $this->verificarAccesoAdministrador();
        $usuarios = $this->modelo->obtenerUsuarios();
        require 'vista/usuarios/listar.php';
    }

    public function mostrarFormularioEditar($id) {
        if ($id === NULL){
            $id = $this->setIdUsuario();
            $usuario = $this->modelo->obtenerUsuarioPorId($id);
        } else {
            $this->verificarAccesoAdministrador();
            $usuario = $this->modelo->obtenerUsuarioPorId($id);
        }
        require 'vista/usuarios/editar.php';
    }

    public function actualizar($id) {
        if ($id === NULL){
            $id = $this->setIdUsuario();
        } else {
            $this->verificarAccesoAdministrador();
        }
        $PrimerNombre = $_POST['PrimerNombre'];
        $OtrosNombres = $_POST['OtrosNombres'];
        $PrimerApellido = $_POST['PrimerApellido'];
        $OtrosApellidos = $_POST['OtrosApellidos'];
        $Email = $_POST['Email'];
        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];
        $IdRol = $_POST['IdRol'];
    
        $this->modelo->actualizarUsuario($id, $PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $IdRol);
        header('Location: index.php?action=listar');
    }

    public function eliminar($id) {
        if($id === NULL){
            $id = $this->setIdUsuario();
        } else {
            $this->verificarAccesoAdministrador();
        }
        $this->modelo->eliminarUsuario($id);
        header('Location: index.php?action=listar');
        if($id === $_SESSION['usuario']['IdUsuario']) session_destroy();
    }

    public function mostrarFormularioCrear() {
        $this->verificarAccesoAdministrador();
        require 'vista/usuarios/crear.php';
    }

    public function crear() {
        $this->verificarAccesoAdministrador();
        $PrimerNombre = $_POST['PrimerNombre'];
        $OtrosNombres = $_POST['OtrosNombres'];
        $PrimerApellido = $_POST['PrimerApellido'];
        $OtrosApellidos = $_POST['OtrosApellidos'];
        $Email = $_POST['Email'];
        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];
        $Contrasena = $_POST['Contrasena'];
        $IdRol = $_POST['IdRol'];
    
        $this->modelo->crearUsuario($PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $Contrasena, $IdRol);
        header('Location: index.php?action=listar');
    }

    public function verPerfil() {
        require 'vista/usuarios/perfil.php';
    }

    private function setIdUsuario(){
        session_start();
        return $_SESSION['usuario']['IdUsuario'];
    }

    private function verificarAccesoAdministrador(){
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['IdRol'] !== 1) {
            header('Location: ./');
            exit;
        }
    }
}
