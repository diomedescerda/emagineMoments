<?php
require_once 'modelo/Usuario.php';
require_once 'modelo/Rol.php';
require_once 'modelo/TipoPrestador.php';

class ControladorUsuario
{
    private $modelo;
    private $rol;
    private $tipoPrestador;

    public function __construct()
    {
        $this->modelo = new Usuario();
        $this->rol = new Rol();
        $this->tipoPrestador = new TipoPrestador();
    }

    public function mostrarLogin()
    {
        require 'vista/login.php';
    }

    public function mostrarLaberinto()
    {
        require 'vista/laberinto.php';
    }

    public function iniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST,'email'); 
            $contrasena = filter_input(INPUT_POST,'contrasena'); 
            
            $usuario = $this->modelo->verificarCredenciales($email, $contrasena);
            
            header('Content-Type: application/json');
            
            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                
                $ruta = 'index.php';
                switch($usuario['IdRol']) {
                    case 1:
                        $ruta = 'index.php?action=listarUsuarios';
                        break;
                    case 3:
                        $ruta = 'index.php?action=listarServicios&id=' . $usuario['IdUsuario'];
                        break;
                }
                
                echo json_encode([
                    'success' => true,
                    'message' => 'Inicio de sesión exitoso',
                    'ruta' => $ruta
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Credenciales inválidas',
                    'ruta' => 'index.php?action=iniciarSesion'
                ]);
            }
            exit;
        }
    }
    
    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        header('Location: index.php?action=iniciarSesion');
    }

    public function mostrarRegistro()
    {
        $roles = $this->rol->obtenerRoles();
        $tipoPrestadores = $this->tipoPrestador->obtenerTipoPrestadores();
        require 'vista/registro.php';
    }

    public function mostrarBienvenida()
    {
        require 'vista/bienvenida.php';
    }

    public function registrarUsuario($idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena, $direccion, $telefono)
    {
        $this->modelo->crearUsuario($idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena, $direccion, $telefono);
        header('Location: ./');
    }

    public function listar()
    {
        $this->verificarAccesoAdministrador();
        $usuarios = $this->modelo->obtenerUsuarios();
        require 'vista/usuarios/listar.php';
    }

    public function mostrarFormularioEditar($id)
    {
        if ($id === NULL) {
            $id = $this->setIdUsuario();
            $usuario = $this->modelo->obtenerUsuarioPorId($id);
        } else {
            $this->verificarAccesoAdministrador();
            $usuario = $this->modelo->obtenerUsuarioPorId($id);
        }
        $tipoPrestadores = $this->tipoPrestador->obtenerTipoPrestadores();
        $roles = $this->rol->obtenerRoles();
        require 'vista/usuarios/editar.php';
    }

    public function actualizar($id = null)
    {
        try {
            if ($id === null) {
                $id = $this->setIdUsuario();
            } else {
                $this->verificarAccesoAdministrador();
            }
    
            $primerNombre = filter_input(INPUT_POST, 'PrimerNombre');
            $otrosNombres = filter_input(INPUT_POST, 'OtrosNombres');
            $primerApellido = filter_input(INPUT_POST, 'PrimerApellido');
            $otrosApellidos = filter_input(INPUT_POST, 'OtrosApellidos');
            $email = filter_input(INPUT_POST, 'Email', FILTER_VALIDATE_EMAIL);
            $direccion = filter_input(INPUT_POST, 'Direccion');
            $telefono = filter_input(INPUT_POST, 'Telefono');
            $idRol = filter_input(INPUT_POST, 'IdRol', FILTER_VALIDATE_INT);
            $idTipoPrestador = filter_input(INPUT_POST, 'IdTipoPrestador', FILTER_VALIDATE_INT);
    
            $this->modelo->actualizarUsuario( $id, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $direccion, $telefono, $idRol, $idTipoPrestador);
    
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Usuario actualizado exitosamente'
            ]);
            exit;
    
        } catch (Exception $e) {
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
            exit;
        }
    }

    public function eliminar($id, $IdRol)
    {
        if ($id === NULL) {
            $id = $this->setIdUsuario();
        } else {
            $this->verificarAccesoAdministrador();
        }
        $this->modelo->eliminarUsuario($id, $IdRol);
        header('Location: index.php?action=listarUsuarios');
        if ($id === $_SESSION['usuario']['IdUsuario'])
            session_destroy();
    }

    public function mostrarFormularioCrear()
    {
        $this->verificarAccesoAdministrador();
        $roles = $this->rol->obtenerRoles();
        $tipoPrestadores = $this->tipoPrestador->obtenerTipoPrestadores();
        require 'vista/usuarios/crear.php';
    }

    public function crear()
    {
        $this->verificarAccesoAdministrador();
        $idRol = $_POST['IdRol'];
        $primerNombre = $_POST['PrimerNombre'];
        $otrosNombres = $_POST['OtrosNombres'];
        $primerApellido = $_POST['PrimerApellido'];
        $otrosApellidos = $_POST['OtrosApellidos'];
        $email = $_POST['Email'];
        $contrasena = $_POST['Contrasena'];
        $direccion = $_POST['Direccion'];
        $telefono = $_POST['Telefono'];
        $idTipoPrestador = $_POST['IdTipoPrestador'];

        $this->modelo->crearUsuario($idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena, $direccion, $telefono, $idTipoPrestador);
        header('Location: index.php?action=listarUsuarios');
    }

    public function verPerfil()
    {
        require 'vista/usuarios/perfil.php';
    }

    private function setIdUsuario()
    {
        session_start();
        return $_SESSION['usuario']['IdUsuario'];
    }

    public function verificarAccesoUsuario()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ./');
            exit;
        }
    }

    public function verificarAccesoAdministrador()
    {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['IdRol'] !== 1) {
            header('Location: ./');
            exit;
        }
    }
}
