<?php
session_start();
require_once('../library/motor.php'); 

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuarioid = $_SESSION['usuario']->id;

// Detectar si es empresa
$sql_empresa = "SELECT id FROM empresa WHERE usuarioid = :usuarioid";
$es_empresa = conexion::consulta($sql_empresa, [':usuarioid' => $usuarioid]);

// Detectar si es empleado
$sql_empleado = "SELECT id FROM curriculum WHERE usuarioid = :usuarioid";
$es_empleado = conexion::consulta($sql_empleado, [':usuarioid' => $usuarioid]);

// Variable para saber a dónde redirigir desde "Inicio"
$inicio_url = "#"; // por defecto si no se detecta nada
if ($es_empresa && count($es_empresa) > 0) {
    $inicio_url = "indexempresa.php?id=$usuarioid";
} elseif ($es_empleado && count($es_empleado) > 0) {
    $inicio_url = "index.php?id=$usuarioid";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>SoreCurriculums</title>
</head>
<style>
    .body{
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container{
        margin-top: 150px;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: flex ;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .container .input{
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
<body>
<nav class="navegador">
        <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link active" href="<?php echo $inicio_url; ?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../web/perfil.php?id=<?php echo $_SESSION['usuario']->id; ?>">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../web/buscaroferta.php?id=<?php echo $_SESSION['usuario']->id; ?>">Ver ofertas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../web/publicaroferta.php?id=<?php echo $_SESSION['usuario']->id; ?>">Publicar oferta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Cerrar sesión</a>
            </li>
            
        </ul>
    </nav>
    <div class="container">
        <!--- Perfil de usuario --->

        <h1>Perfil de Usuario</h1>
        <img src="../resources/images.jpeg" alt="Imagen de perfil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
        <p><strong>Nombre:</strong> <?php echo $_SESSION['usuario']->nombre; ?></p>
        <p><strong>Correo:</strong> <?php echo $_SESSION['usuario']->correo; ?></p>

    </div>
       
</body>
</html>