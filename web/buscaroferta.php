<?php

include ('../library/motor.php');
session_start();

// Recuperar el ID del usuario desde la sesión
$usuarioid = $_SESSION['id_usuario'] ?? null;

if (!$usuarioid) {
    // Si no hay ID, redirige o muestra error (por si entran al archivo directo sin registro)
    header("Location: ../web/login.php");
    exit;
}



$sql = "SELECT * FROM ofertas";

$ofertas = conexion::consulta($sql, []);
if (!$ofertas || count($ofertas) === 0) {
    echo "No hay ofertas disponibles.";
    exit;
}


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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <title>SoreCurriculums</title>
</head>

<style>
.oferta{
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;

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
                <a class="nav-link" href="buscaroferta.php">Ver ofertas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="publicaroferta.php">Publicar oferta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Cerrar sesión</a>
            </li>
        </ul>
    </nav>
    <!---Ofertas de trabajo disponibles para ver-->
    
    <div class="container">
        <h1>Ofertas de Trabajo</h1>
        
        <!---Aquí se mostrarán las ofertas de trabajo-->
        <div class="ofertas">
                    <!---Aquí se mostrarán las ofertas de trabajo-->
            <?php foreach ($ofertas as $oferta): ?>
                <div class="oferta">
                    <h2><?php echo $oferta->titulo; ?></h2>
                    <p><strong>Descripción:</strong> <?php echo $oferta->descripcion; ?></p>
                    <p><strong>Ubicación:</strong> <?php echo $oferta->ubicacion; ?></p>
                    <p><strong>Salario:</strong> <?php echo $oferta->salario; ?></p>
                    <p><strong>Fecha de publicación:</strong> <?php echo $oferta->fecha_publicacion; ?></p>
                    <p><strong>Fecha de cierre:</strong> <?php echo $oferta->fecha_cierre; ?></p>
                    <p><strong>Tipo de contrato:</strong> <?php echo $oferta->tipo_contrato; ?></p>
                    <button class="btn btn-primary">Aplicar</button>
                </div>
            <?php endforeach; ?>
            

        </div>
    </div>
    
</html>