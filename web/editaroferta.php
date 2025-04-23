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

$inicio_url = "#";
if ($es_empresa && count($es_empresa) > 0) {
    $inicio_url = "indexempresa.php?id=$usuarioid";
} elseif ($es_empleado && count($es_empleado) > 0) {
    $inicio_url = "index.php?id=$usuarioid";
}

$idoferta = $_GET['id'] ?? null;
$oferta = null;
if ($idoferta) {
    $sql = "SELECT * FROM ofertas WHERE idoferta = :idoferta";
    $resultado = conexion::consulta($sql, [':idoferta' => $idoferta]);
    if ($resultado && count($resultado) > 0) {
        $oferta = $resultado[0];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container{
            margin-top: 150px;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    <title>Editar Oferta</title>
</head>
<body>
<nav class="navegador">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" href="<?php echo $inicio_url; ?>">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="../web/perfil.php?id=<?php echo $_SESSION['usuario']->id; ?>">Perfil</a></li>
        <li class="nav-item"><a class="nav-link" href="../web/buscaroferta.php?id=<?php echo $_SESSION['usuario']->id; ?>">Ver ofertas</a></li>
        <li class="nav-item"><a class="nav-link" href="../web/publicaroferta.php?id=<?php echo $_SESSION['usuario']->id; ?>">Publicar oferta</a></li>
        <li class="nav-item"><a class="nav-link" href="../web/ofertaspublicadas.php?id=<?php echo $_SESSION['usuario']->id; ?>">Ofertas publicadas</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Cerrar sesión</a></li>
    </ul>
</nav>

<div class="container">
    <h1 class="text-center"><?php echo $oferta ? "Editar Oferta" : "Publica tu oferta"; ?></h1>

    <form action="../controllers/guardaroferta.php" method="POST">
        <?php if ($oferta): ?>
            <input type="hidden" name="idoferta" value="<?php echo $oferta->idoferta; ?>">
        <?php endif; ?>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" class="input" value="<?php echo $oferta->titulo ?? ''; ?>"><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="input"><?php echo $oferta->descripcion ?? ''; ?></textarea><br>
        
        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresaid" class="input" value="<?php echo $oferta->empresaid ?? ''; ?>"><br>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" class="input" value="<?php echo $oferta->ubicacion ?? ''; ?>"><br>
        
        <label for="salario">Salario:</label>
        <input type="text" id="salario" name="salario" class="input" value="<?php echo $oferta->salario ?? ''; ?>"><br>
        
        <label for="tipo_contrato">Tipo de contrato:</label>
        <select id="tipo_contrato" name="tipo_contrato" class="input">
            <?php
            $tipos = ['temporal', 'indefinido', 'practicas', 'autonomo', 'freelance'];
            foreach ($tipos as $tipo) {
                $selected = ($oferta && $oferta->tipo_contrato === $tipo) ? "selected" : "";
                echo "<option value=\"$tipo\" $selected>$tipo</option>";
            }
            ?>
        </select><br>

        <label for="fecha_publicacion">Fecha de publicación:</label>
        <input type="date" id="fecha_publicacion" name="fecha_publicacion" class="input" value="<?php echo $oferta->fecha_publicacion ?? ''; ?>"><br>

        <label for="fecha_cierre">Fecha de cierre:</label>
        <input type="date" id="fecha_cierre" name="fecha_cierre" class="input" value="<?php echo $oferta->fecha_cierre ?? ''; ?>"><br>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
</body>
</html>
