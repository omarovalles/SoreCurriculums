<?php

include('../library/motor.php');
session_start();

$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO usuario (nombre, correo, contrasena) VALUES (:nombre, :correo, :contrasena)";
$parametros = [
    ':nombre' => $nombre,
    ':correo' => $correo,
    ':contrasena' => $contrasena
];

conexion::exec($sql, $parametros);

// Aquí obtienes el ID generado automáticamente
$id_usuario = conexion::lastInsertId();
$_SESSION['id_usuario'] = $id_usuario;

header("Location: ../web/register.php");


?>