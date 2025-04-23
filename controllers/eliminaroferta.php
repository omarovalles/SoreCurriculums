<?php
require_once('../library/motor.php');
session_start();

// Verificar si el usuario está autenticado

if (!isset($_SESSION['usuario'])) {
    header("Location: ../web/login.php");
    exit();
}

// Obtener ID del personaje a eliminar

if (!isset($_GET['id'])) {
    header("Location: listado.php?error=sin_id");
    exit();
}



$id = $_GET['id'];

// Eliminar personaje de la base de datos
$sql = "DELETE FROM ofertas WHERE id = :id";
$parametros = [':id' => $id];

conexion::exec($sql, $parametros);
    
// Redirigir al listado después de eliminar
header("Location: ../web/login.php?id=" . $_SESSION['usuario']->id . "&eliminado=1");
exit();
?>
