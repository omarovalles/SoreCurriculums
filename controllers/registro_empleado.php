<?php
include ('../library/motor.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo_electronico = $_POST['correo_electronico'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$ciudad_provincia = $_POST['ciudad_provincia'];
$formacion_academica = $_POST['formacion_academica'];
$experiencia_laboral = $_POST['experiencia_laboral'];
$habilidades_clave = $_POST['habilidades_clave'];
$idiomas = $_POST['idiomas'];
$objetivo_profesional = $_POST['objetivo_profesional'];
$logros_proyectos = $_POST['logros_proyectos'];
$disponibilidad = $_POST['disponibilidad'];
$redes_profesionales = $_POST['redes_profesionales'];
$referencias = $_POST['referencias'];


$sql = "INSERT INTO curriculum (
    nombre, apellido, correo_electronico, telefono, direccion, ciudad_provincia,
    formacion_academica, experiencia_laboral, habilidades_clave, idiomas,
    objetivo_profesional, logros_proyectos, disponibilidad, redes_profesionales,
    referencias, usuarioid
) VALUES (
    :nombre, :apellido, :correo_electronico, :telefono, :direccion, :ciudad_provincia,
    :formacion_academica, :experiencia_laboral, :habilidades_clave, :idiomas,
    :objetivo_profesional, :logros_proyectos, :disponibilidad, :redes_profesionales,
    :referencias, :usuarioid
)";

$parametros = [
    ':nombre' => $nombre,
    ':apellido' => $apellido,
    ':correo_electronico' => $correo_electronico,
    ':telefono' => $telefono,
    ':direccion' => $direccion,
    ':ciudad_provincia' => $ciudad_provincia,
    ':formacion_academica' => $formacion_academica,
    ':experiencia_laboral' => $experiencia_laboral,
    ':habilidades_clave' => $habilidades_clave,
    ':idiomas' => $idiomas,
    ':objetivo_profesional' => $objetivo_profesional,
    ':logros_proyectos' => $logros_proyectos,
    ':disponibilidad' => $disponibilidad,
    ':redes_profesionales' => $redes_profesionales,
    ':referencias' => $referencias,
    ':usuarioid' => $usuarioid
];

conexion::exec($sql, $parametros);

// Redirigir
header("Location: ../web/login.php");
exit();
?>
