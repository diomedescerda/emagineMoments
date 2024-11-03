<?php
require_once 'Conexion.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getInstance()->getConexion();
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function verificarCredenciales($email, $contrasena)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Usuarios WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $usuario = $stmt->get_result()->fetch_assoc();
        if ($usuario && password_verify($contrasena, $usuario['Contrasena'])) {
            return $usuario;
        }
    }

    public function crearUsuario($idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $contrasena, $direccion, $telefono, $idTipoPrestador = null)
    {
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $stmt = $this->conexion->prepare("INSERT INTO Usuarios (IdRol, PrimerNombre, OtrosNombres, PrimerApellido, OtrosApellidos, Email, Contrasena, Direccion, Telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", $idRol, $primerNombre, $otrosNombres, $primerApellido, $otrosApellidos, $email, $hash_contrasena, $direccion, $telefono);

        if ($stmt->execute()) {
            $userId = $this->conexion->insert_id;
            $this->actualizarRolEnTabla($userId, $idRol, null, $idTipoPrestador);
        } else {
            throw new Exception("Error al crear usuario: " . $stmt->error);
        }
    }

    public function obtenerUsuarios()
    {
        $resultado = $this->conexion->query("SELECT u.IdUsuario, u.IdRol, r.Nombre ,u.PrimerNombre, u.OtrosNombres, u.PrimerApellido, u.OtrosApellidos, 
                                            u.Email, u.Contrasena, u.Direccion, u.Telefono FROM Usuarios u JOIN Roles r ON u.IdRol = r.IdRol");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerUsuarioPorId($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Usuarios WHERE IdUsuario = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizarUsuario($id, $PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $IdRol, $IdTipoPrestador = null)
    {
        $currentRoleStmt = $this->conexion->prepare("SELECT IdRol FROM Usuarios WHERE IdUsuario = ?");
        $currentRoleStmt->bind_param("i", $id);
        $currentRoleStmt->execute();
        $currentRole = $currentRoleStmt->get_result()->fetch_assoc()['IdRol'];

        $stmt = $this->conexion->prepare("UPDATE usuarios SET PrimerNombre = ?, OtrosNombres = ?, PrimerApellido = ?, OtrosApellidos = ?, Email = ?, Direccion = ?, Telefono = ?, IdRol = ? WHERE IdUsuario = ?");
        $stmt->bind_param("ssssssssi", $PrimerNombre, $OtrosNombres, $PrimerApellido, $OtrosApellidos, $Email, $Direccion, $Telefono, $IdRol, $id);
        if ($stmt->execute()) {
            if($currentRole != $IdRol) {
                $this->actualizarRolEnTabla($id, $IdRol, $currentRole, $IdTipoPrestador);
            }
        } else {
            throw new Exception("Error al actualizar usuario: " . $stmt->error);
        }
    }

    public function eliminarUsuario($id, $IdRol)
    {
        switch ($IdRol) {
            case 2:
                $stmt = $this->conexion->prepare("DELETE FROM Clientes WHERE IdCliente = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                break;
            
            case 3:
                $stmt = $this->conexion->prepare("DELETE FROM Prestadores WHERE IdPrestador = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                break;
            
            default:
                break;
        }
        $stmt = $this->conexion->prepare("DELETE FROM Usuarios WHERE IdUsuario = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    private function actualizarRolEnTabla($idUsuario, $rolNuevo, $rolAnterior = null, $IdTipoPrestador = null)
    {
        if ($rolAnterior) {
            switch ($rolAnterior) {
                case 2:
                    $this->conexion->query("DELETE FROM clientes WHERE IdCliente= $idUsuario");
                    break;

                case 3:
                    $this->conexion->query("DELETE FROM prestadores WHERE IdPrestador= $idUsuario");
                    break;

                default:
                    break;
            }
        }

        switch ($rolNuevo) {
            case 2:
                $this->conexion->query("INSERT INTO clientes (IdCliente) VALUES ($idUsuario)");
                break;

            case 3:
                $this->conexion->query("INSERT INTO prestadores (IdPrestador, IdTipoPrestador) VALUES ($idUsuario, $IdTipoPrestador)");
                break;

            default:
                break;
        }
    }
}