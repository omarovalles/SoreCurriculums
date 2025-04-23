<?php
session_start();
require_once('../library/motor.php');

$usuarioid = $_SESSION['usuario']->id;

// Obtener el ID de la empresa de este usuario
$sql_empresa = "SELECT id FROM empresa WHERE usuarioid = :usuarioid";
$empresa = conexion::consulta($sql_empresa, [':usuarioid' => $usuarioid]);

if (!$empresa || count($empresa) === 0) {
    die("Error: No se encontró empresa asociada a este usuario.");
}

$empresaid = $empresa[0]->id;

// Recolectar datos del formulario
$idoferta = $_POST['idoferta'] ?? null;
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$requisitos = $_POST['requisitos'] ?? '';
$salario = $_POST['salario'];
$ubicacion = $_POST['ubicacion'];
$tipo_contrato = $_POST['tipo_contrato'];
$fecha_publicacion = $_POST['fecha_publicacion'];
$fecha_cierre = $_POST['fecha_cierre'];

if ($idoferta) {
    // Actualizar
    $sql = "UPDATE ofertas SET 
                titulo = :titulo,
                descripcion = :descripcion,
                requisitos = :requisitos,
                salario = :salario,
                ubicacion = :ubicacion,
                tipo_contrato = :tipo_contrato,
                fecha_publicacion = :fecha_publicacion,
                fecha_cierre = :fecha_cierre
            WHERE idoferta = :idoferta";
    
    $params = [
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':requisitos' => $requisitos,
        ':salario' => $salario,
        ':ubicacion' => $ubicacion,
        ':tipo_contrato' => $tipo_contrato,
        ':fecha_publicacion' => $fecha_publicacion,
        ':fecha_cierre' => $fecha_cierre,
        ':idoferta' => $idoferta
    ];
} else {
    // Insertar
    $sql = "INSERT INTO ofertas (
                titulo, descripcion, requisitos, salario, ubicacion, tipo_contrato, fecha_publicacion, fecha_cierre, empresaid
            ) VALUES (
                :titulo, :descripcion, :requisitos, :salario, :ubicacion, :tipo_contrato, :fecha_publicacion, :fecha_cierre, :empresaid
            )";

    $params = [
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':requisitos' => $requisitos,
        ':salario' => $salario,
        ':ubicacion' => $ubicacion,
        ':tipo_contrato' => $tipo_contrato,
        ':fecha_publicacion' => $fecha_publicacion,
        ':fecha_cierre' => $fecha_cierre,
        ':empresaid' => $empresaid
    ];
}

conexion::consulta($sql, $params);
header("Location: ../web/ofertaspublicadas.php?id=$usuarioid");
exit;

?>

