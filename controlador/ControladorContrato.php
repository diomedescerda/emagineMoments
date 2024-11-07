<?php
require_once 'modelo/Contrato.php';
require_once 'controladorUsuario.php';

class ControladorContrato
{
    private $modelo;
    private $controladorUsuario;

    public function __construct()
    {
        $this->modelo = new Contrato();
        $this->controladorUsuario = new ControladorUsuario();
    }

    public function listarMisContratos($idRol)
    {
        $this->controladorUsuario->verificarAccesoUsuario();
        switch ($idRol) {
            case 2:
                $contratos = $this->modelo->obtenerContratosCliente($_SESSION['usuario']['IdUsuario']);
                break;

            case 3:
                $contratos = $this->modelo->obtenerContratosPrestador($_SESSION['usuario']['IdUsuario']);
                break;

            default:
                break;
        }
        require 'vista/contratos/listar.php';
    }

    public function crear($idServicio)
    {
        $this->controladorUsuario->verificarAccesoUsuario();
        if ($_SESSION['usuario']['IdRol'] == 2) {
            $idCliente = $_SESSION['usuario']['IdUsuario'];
            $this->modelo->crearContrato($idCliente, $idServicio);
            header('Location: index.php?action=listarMisContratos');
        }
    }

    public function eliminar($id)
    {
        $this->controladorUsuario->verificarAccesoAdministrador();
        $this->modelo->eliminarContrato($id);
        header('Location: index.php?action=listarMisContratos');
    }
}