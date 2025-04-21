<?php

include ('../library/motor.php');


$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$direccion = $_POST['direccion'];

// Actualizar en la base de datos
$sql = "INSERT INTO empresa (nombre, correo, contrasena, direccion) VALUES (:nombre, :correo, :contrasena, :direccion)";
$parametros = [
    ':nombre' => $nombre,
    ':correo' => $correo,
    ':contrasena' => $contrasena,
    ':direccion' => $direccion
];

conexion::exec($sql, $parametros);

// Redirigir al listado
header("Location: ../web/login.php");
exit();
?>