<?php
require_once 'Conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = (new Conexion())->getConexion();
    }
    // 
    public function registrar($idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena, $direccion, $telefono) {
        $contrasena_hashed = password_hash($contrasena, PASSWORD_DEFAULT);
        $stmt = $this->conexion->prepare("INSERT INTO Usuarios (IdRol, PrimerNombre, OtrosNombres, PrimerApellido, OtrosApellidos, Email, Contrasena, Direccion, Telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }
    
        $stmt->bind_param("issssssss", $idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena_hashed, $direccion, $telefono);
    
        $result = $stmt->execute();
    
        if ($result === false) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }
    
        return $result;
    }

    //
    public function verificarCredenciales($email, $contrasena) {
        $stmt = $this->conexion->prepare("SELECT * FROM Usuarios WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $usuario = $stmt->get_result()->fetch_assoc();
        if ($usuario && password_verify($contrasena, $usuario['Contrasena'])) {
            return $usuario;
        }
    }

    //
    public function obtenerUsuarios() {
        $resultado = $this->conexion->query("SELECT u.IdUsuario, r.Nombre ,u.PrimerNombre, u.OtrosNombres, u.PrimerApellido, u.OtrosApellidos, 
                                            u.Email, u.Contrasena, u.Direccion, u.Telefono FROM Usuarios u JOIN Roles r ON u.IdRol = r.IdRol");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    //
    public function obtenerUsuarioPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM Usuarios WHERE IdUsuario = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    //
    public function actualizarUsuario($id, $PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $IdRol) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET PrimerNombre = ?, OtrosNombres = ?, PrimerApellido = ?, OtrosApellidos = ?, Email = ?, Direccion = ?, Telefono = ?, IdRol = ? WHERE IdUsuario = ?");
        $stmt->bind_param("ssssssssi", $PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $IdRol, $id);
        return $stmt->execute();
    }

    //
    public function eliminarUsuario($id) {
        $stmt = $this->conexion->prepare("DELETE FROM Usuarios WHERE IdUsuario = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    //
    public function crearUsuario($PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $Contrasena, $IdRol) {
    $hash_contrasena = password_hash($Contrasena, PASSWORD_DEFAULT);
    $stmt = $this->conexion->prepare("INSERT INTO usuarios (PrimerNombre, OtrosNombres, PrimerApellido, OtrosApellidos, Email, Direccion, Telefono, Contrasena, IdRol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssi", $PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $hash_contrasena, $IdRol);
    return $stmt->execute();
} 
}