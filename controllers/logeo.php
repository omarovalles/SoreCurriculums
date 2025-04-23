<?php
include ('../library/motor.php');
session_start();

$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

$parametros = [
    ':nombre' => $nombre,
    ':contrasena' => $contrasena
];

// Buscar usuario
$sqlUsuario = "SELECT * FROM usuario WHERE nombre = :nombre AND contrasena = :contrasena";
$usuarios = conexion::consulta($sqlUsuario, $parametros);  // ← aquí usamos `consulta`

if ($usuarios && count($usuarios) > 0) {
    $usuario = $usuarios[0];
    $usuarioId = $usuario->id;

    // Verificar si es empresa
    $sqlEmpresa = "SELECT * FROM empresa WHERE usuarioid = :usuarioid";
    $empresa = conexion::consulta($sqlEmpresa, [':usuarioid' => $usuarioId]);

    if ($empresa && count($empresa) > 0) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = 'empresa';
        $_SESSION['empresa'] = $empresa[0];
        header("Location: ../web/indexempresa.php?id=" . $usuarioId);
        exit;
    }

    // Verificar si es empleado (curriculum)
    $sqlEmpleado = "SELECT * FROM curriculum WHERE usuarioid = :usuarioid";
    $empleado = conexion::consulta($sqlEmpleado, [':usuarioid' => $usuarioId]);

    if ($empleado && count($empleado) > 0) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = 'empleado';
        $_SESSION['curriculum'] = $empleado[0];
        header("Location: ../web/index.php?id=" . $usuarioId);
        exit;
    }

    // Usuario válido pero sin relación
    header("Location: ../web/error.php?error=sin_rol");
    exit;

} else {
    header("Location: ../web/error.php?error=credenciales_invalidas");
    exit;
}
