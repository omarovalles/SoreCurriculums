<?php
include ('../library/motor.php');
session_start();

// Verificamos si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuarioid = $_SESSION['usuario']->id;

// Verificamos si el usuario es una empresa
$sql_empresa = "SELECT id FROM empresa WHERE usuarioid = :usuarioid";
$empresa = conexion::consulta($sql_empresa, [':usuarioid' => $usuarioid]);

if (!$empresa || count($empresa) === 0) {
    echo "No tienes permisos para ver esta página.";
    exit;
}

$empresaid = $empresa[0]->id;

// Consultar ofertas publicadas por esa empresa
$sql = "SELECT * FROM ofertas WHERE empresaid = :empresaid";
$ofertas = conexion::consulta($sql, [':empresaid' => $empresaid]);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Ofertas Publicadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .oferta {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
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
                <a class="nav-link" href="../web/ofertaspublicadas.php?id=<?php echo $_SESSION['usuario']->id; ?>">Ofertas publicadas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Cerrar sesión</a>
            </li>
            
        </ul>
    </nav>
    <div class="container mt-4">
        <h1>Mis Ofertas Publicadas</h1>

        <?php if (!$ofertas || count($ofertas) === 0): ?>
            <p>No has publicado ninguna oferta aún.</p>
        <?php else: ?>
            <?php foreach ($ofertas as $oferta): ?>
                <div class="oferta">
                    <h2><?php echo $oferta->titulo; ?></h2>
                    <p><strong>Descripción:</strong> <?php echo $oferta->descripcion; ?></p>
                    <p><strong>Ubicación:</strong> <?php echo $oferta->ubicacion; ?></p>
                    <p><strong>Salario:</strong> <?php echo $oferta->salario; ?></p>
                    <p><strong>Fecha de publicación:</strong> <?php echo $oferta->fecha_publicacion; ?></p>
                    <p><strong>Fecha de cierre:</strong> <?php echo $oferta->fecha_cierre; ?></p>
                    <p><strong>Tipo de contrato:</strong> <?php echo $oferta->tipo_contrato; ?></p>
                    <!-- Puedes añadir botones para editar/eliminar -->
                    <a href="editaroferta.php?id=<?php echo $oferta->idoferta; ?>" class="btn btn-warning">Editar</a>
                    <a href="../controllers/eliminaroferta.php?id=<?php echo $oferta->idoferta; ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta oferta?')">Eliminar</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
