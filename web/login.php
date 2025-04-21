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
    <div class="container">
        <h1>Bienvenido a SoreCurriculums</h1>
        <p>Por favor, inicia sesión para continuar.</p>
        <form action="controllers/logeo.php" method="POST">
            <label for="username">Usuario:</label><br>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Iniciar sesión" class="btn btn-success">
            <a href="register.php" class="btn btn-primary">Crear cuenta</a>
        </form>
</body>
</html>