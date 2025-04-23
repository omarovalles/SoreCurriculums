<?php
include ('../library/motor.php');
session_start();  // Muy importante para acceder a la sesión

// Obtener el ID del usuario actual desde la sesión
$usuarioid = $_SESSION['id_usuario'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];

// Insertar empresa vinculada al usuario actual
$sql = "INSERT INTO empresa (nombre, direccion, usuarioid) VALUES (:nombre, :direccion, :usuarioid)";
$parametros = [
    ':nombre' => $nombre,
    ':direccion' => $direccion,
    ':usuarioid' => $usuarioid
];

conexion::exec($sql, $parametros);

// Redirigir al login o a donde prefieras
header("Location: ../web/login.php");
exit();
?>
