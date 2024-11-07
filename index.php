<?php
require_once 'controlador/ControladorUsuario.php';
require_once 'controlador/ControladorServicio.php';
require_once 'controlador/ControladorContrato.php';
require_once 'controlador/ControladorEstadoContrato.php';

$controladorUsuario = new ControladorUsuario();
$controladorServicio = new ControladorServicio();
$controladorContrato = new ControladorContrato();
$controladorEstadoContrato = new ControladorEstadoContrato();

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

        case 'listarContratos':
            $controladorContrato->listarMisContratos($_GET['idRol']);
            break;
        
        case 'listarSolicitudes':
            $controladorEstadoContrato->listarSolicitudesContrato();
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

        case 'contratarServicio':
            $controladorContrato->crear($_GET['idServicio']);
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

        case 'firmarContrato':
            $controladorEstadoContrato->actualizar($_GET['id'], $_GET['idTipoEstadoContrato']);
            break;

        case 'rechazarContrato':
            $controladorEstadoContrato->actualizar($_GET['id'], $_GET['idTipoEstadoContrato']);
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