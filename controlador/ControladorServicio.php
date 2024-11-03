<?php
require_once 'modelo/Servicio.php';

class ControladorServicio {
    private $modelo;

    public function __construct() {
        $this->modelo = new Servicio();
    }

    public function listarMisServicios($id) {
        $servicios = $this->modelo->obtenerMisServicios($id);
        require 'vista/servicios/listar.php';
    }

}
