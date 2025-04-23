<?php
include ('../library/motor.php');
session_start();  

$usuarioid = $_SESSION['id_usuario'] ?? null;

if (!$usuarioid) {
    header("Location: ../web/login.php");
    exit;
}

// Obtener el ID de la empresa asociada al usuario actual
$sql_empresa = "SELECT e.id AS empresaid 
                FROM usuario u 
                JOIN empresa e ON u.id = e.usuarioid 
                WHERE u.id = :usuarioid";

$empresa_result = conexion::consulta($sql_empresa, [':usuarioid' => $usuarioid]);

if (!$empresa_result || count($empresa_result) === 0) {
    echo "No tienes una empresa registrada. Regístrala antes de publicar ofertas.";
    exit;
}

$empresaid = $empresa_result[0]->empresaid;

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$salario = $_POST['salario'];
$tipo_contrato = $_POST['tipo_contrato'];
$fecha_publicacion = $_POST['fecha_publicacion'];
$fecha_cierre = $_POST['fecha_cierre'];

// Insertar la oferta
$sql = "INSERT INTO ofertas (
            titulo, descripcion, ubicacion, salario, tipo_contrato,
            fecha_publicacion, fecha_cierre, empresaid
        ) VALUES (
            :titulo, :descripcion, :ubicacion, :salario, :tipo_contrato,
            :fecha_publicacion, :fecha_cierre, :empresaid
        )";

$parametros = [
    ':titulo' => $titulo,
    ':descripcion' => $descripcion,
    ':ubicacion' => $ubicacion,
    ':salario' => $salario,
    ':tipo_contrato' => $tipo_contrato,
    ':fecha_publicacion' => $fecha_publicacion,
    ':fecha_cierre' => $fecha_cierre,
    ':empresaid' => $empresaid
];

conexion::exec($sql, $parametros);

// Redirige a inicio o donde quieras
header("Location: ../web/index.php?id=" . $usuarioid);
exit;
?>
