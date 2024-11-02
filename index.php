<?php
require_once 'controlador/ControladorUsuario.php';

$controlador = new ControladorUsuario();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'iniciarSesion':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controlador->iniciarSesion();
            } else {
                $controlador->mostrarLogin();
            }
            break;

        case 'cerrarSesion':
            $controlador->cerrarSesion();
            break;

        case 'registrar':
            $controlador->registrarUsuario(
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
            $controlador->mostrarRegistro();
            break;

        case 'mostrarBienvenida':
            $controlador->mostrarBienvenida();
            break;

        case  'mostrarLogin':
            $controlador->mostrarLogin();
            break;
        
        case 'mostrarLaberinto':
            $controlador->mostrarLaberinto();
            break;
        
        case 'listar':
            $controlador->listar();
            break;
        
        case 'editar':
            $controlador->mostrarFormularioEditar($_GET['id'] ?? NULL);
            break;
        
        case 'actualizar':
            $controlador->actualizar($_GET['id'] ?? NULL);
            break;

        case 'eliminar':
            $controlador->eliminar($_GET['id'], $_GET['IdRol']);
            break;
        
        case 'crear':
            $controlador->mostrarFormularioCrear();
            break;

        case 'guardar':
            $controlador->crear();
            break;
        
        case 'perfil':
            $controlador->verPerfil();
            break;
        
        default:
            $controlador->mostrarLaberinto();
            break;
    }
} else {
    $controlador->mostrarBienvenida();
}