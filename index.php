<?php
require_once 'controlador/ControladorUsuario.php';
require_once 'controlador/ControladorServicio.php';

$controladorUsuario = new ControladorUsuario();
$controladorServicio = new controladorServicio();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'iniciarSesion':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controladorUsuario->iniciarSesion();
            } else {
                $controladorUsuario->mostrarLogin();
            }
            break;

        case 'cerrarSesion':
            $controladorUsuario->cerrarSesion();
            break;

        case 'registrar':
            $controladorUsuario->registrarUsuario(
                $_POST['IdRol'],
                $_POST['primerNombre'],
                $_POST['otrosNombres'],
                $_POST['primerApellido'],
                $_POST['otrosApellidos'],
                $_POST['email'],
                $_POST['contrasena'],
                $_POST['direccion'],
                $_POST['telefono']
            );
            break;

        case 'mostrarRegistro':
            $controladorUsuario->mostrarRegistro();
            break;

        case 'mostrarBienvenida':
            $controladorUsuario->mostrarBienvenida();
            break;

        case  'mostrarLogin':
            $controladorUsuario->mostrarLogin();
            break;
        
        case 'mostrarLaberinto':
            $controladorUsuario->mostrarLaberinto();
            break;
        
        case 'listar':
            $controladorUsuario->listar();
            break;

        case 'listarServicios':
            $controladorServicio->listarMisServicios($_GET['id']);
            break;
        
        case 'editar':
            $controladorUsuario->mostrarFormularioEditar($_GET['id'] ?? NULL);
            break;
        
        case 'actualizar':
            $controladorUsuario->actualizar($_GET['id'] ?? NULL);
            break;

        case 'eliminar':
            $controladorUsuario->eliminar($_GET['id'], $_GET['IdRol']);
            break;
        
        case 'crear':
            $controladorUsuario->mostrarFormularioCrear();
            break;

        case 'guardar':
            $controladorUsuario->crear();
            break;
        
        case 'perfil':
            $controladorUsuario->verPerfil();
            break;
        
        default:
            $controladorUsuario->mostrarLaberinto();
            break;
    }
} else {
    $controladorUsuario->mostrarBienvenida();
}