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

    .container h2{
        margin-bottom: 20px;
    }

    .container button{
        margin: 5px 0;
        width: 100%;
        padding: 10px;
    }

    .formulario {
        display: none;
        margin: 20px auto;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    #form-empresa{
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    form button {
        margin-top: 10px;
        padding: 10px 20px;
    }
</style>
<body>
    <div class="container" id="selector">
        <h2>¿Qué quieres hacer en la página web?</h2>
        <button class="btn btn-outline-primary" onclick="mostrarFormulario('empresa')">Registrarse como Empresa</button>
        <button class="btn btn-outline-primary" onclick="mostrarFormulario('empleado')">Registrarse como Empleado</button>
        <button class="btn btn-outline-secondary" onclick="location.href='login.php'">Iniciar sesión</button>
    </div>

    <!-- FORMULARIO EMPRESA -->
    <div id="form-empresa" class="formulario">
        <h3>Registro para Empresa</h3>
        <form action="../controllers/registro_empresa.php" method="POST">
        <label>Nombre de la empresa:</label><br>
            <input type="text" name="nombre" id="nombre"><br>

            <label>Correo:</label><br>
            <input type="email" name="correo" id="correo"><br>

            <label>Contraseña:</label><br>
            <input type="password" name="contrasena" id="contrasena"><br>

            <label>Dirección:</label><br>
            <input type="text" name="direccion" id="direccion"><br>

            <button type="submit" class="btn btn-primary">Registrarse</button>
            <button type="button" class="btn btn-secondary" onclick="volverSeleccion()">Volver a la selección</button>
        </form>
    </div>

    <!-- FORMULARIO EMPLEADO -->
    <div id="form-empleado" class="formulario">
        <h3>Registro para Empleado</h3>
    <form action="controllers/registro_empleado.php" method="POST" enctype="multipart/form-data">
    <label>Nombre(s):</label><br>
    <input type="text" name="nombre"><br>

    <label>Apellido(s):</label><br>
    <input type="text" name="apellido"><br>

    <label>Correo Electrónico:</label><br>
    <input type="email" name="correo_electronico"><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono"><br>

    <label>Dirección:</label><br>
    <input type="text" name="direccion"><br>

    <label>Ciudad / Provincia:</label><br>
    <input type="text" name="ciudad_provincia"><br>

    <label>Formación Académica:</label><br>
    <textarea name="formacion_academica" rows="2"></textarea><br>

    <label>Experiencia Laboral:</label><br>
    <textarea name="experiencia_laboral" rows="2"></textarea><br>

    <label>Habilidades Clave:</label><br>
    <input type="text" name="habilidades_clave"><br>

    <label>Idiomas:</label><br>
    <input type="text" name="idiomas"><br>

    <label>Objetivo Profesional / Resumen:</label><br>
    <textarea name="objetivo_profesional" rows="2"></textarea><br>

    <label>Logros o Proyectos Destacados:</label><br>
    <textarea name="logros_proyectos" rows="2"></textarea><br>

    <label>Disponibilidad:</label><br>
    <select name="disponibilidad">
        <option value="inmediata">Inmediata</option>
        <option value="15 días">En 15 días</option>
        <option value="30 días">En 30 días</option>
    </select><br><br>

    <label>Redes Profesionales (LinkedIn, etc.):</label><br>
    <input type="text" name="redes_profesionales"><br>

    <label>Referencias:</label><br>
    <textarea name="referencias" rows="2"></textarea><br>

    <button type="submit" class="btn btn-primary">Registrarse</button>
    <button type="button" class="btn btn-secondary" onclick="volverSeleccion()">Volver a la selección</button>
</form>

    </div>
</body>
</html>

<script>
function mostrarFormulario(tipo){
    document.getElementById('form-empresa').style.display = 'none';
    document.getElementById('form-empleado').style.display = 'none';
    document.getElementById('selector').style.display = 'none';

    if(tipo === 'empresa'){
        document.getElementById('form-empresa').style.display = 'block';
    } else if(tipo === 'empleado'){
        document.getElementById('form-empleado').style.display = 'block';
    }
}

function volverSeleccion(){
    document.getElementById('form-empresa').style.display = 'none';
    document.getElementById('form-empleado').style.display = 'none';
    document.getElementById('selector').style.display = 'flex';
}
</script>
