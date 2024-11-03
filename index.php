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

        case 'registrarUsuario':
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
        
        case 'listarUsuarios':
            $controladorUsuario->listar();
            break;

        case 'listarServicios':
            $controladorServicio->listarMisServicios();
            break;
        
        case 'crearUsuario':
            $controladorUsuario->mostrarFormularioCrear();
            break;

        case 'crearServicio':
            $controladorServicio->mostrarFormularioCrear();
            break;

        case 'guardarUsuario':
            $controladorUsuario->crear();
            break;
        
        case 'guardarServicio':
            $controladorServicio->crear();
            break;
        
        case 'editarUsuario':
            $controladorUsuario->mostrarFormularioEditar($_GET['id'] ?? NULL);
            break;

        case 'editarServicio':
            $controladorServicio->mostrarFormularioEditar($_GET['id']);
            break;

        
        case 'actualizarUsuario':
            $controladorUsuario->actualizar($_GET['id'] ?? NULL);
            break;

        case 'actualizarServicio':
            $controladorServicio->actualizar($_GET['id']);
            break;

        case 'eliminarUsuario':
            $controladorUsuario->eliminar($_GET['id'], $_GET['IdRol']);
            break;

        case 'eliminarServicio':
            $controladorServicio->eliminar($_GET['id']);
            break;
        
        case 'perfil':
            $controladorUsuario->verPerfil();
            break;

        case 'consultarServicios':
            $controladorServicio->mostrarServicios();
            break;
        
        default:
            $controladorUsuario->mostrarLaberinto();
            break;
    }
} else {
    $controladorUsuario->mostrarBienvenida();
}