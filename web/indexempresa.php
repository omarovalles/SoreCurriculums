<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <style>
        .carousel {
            max-height: 500px;
            overflow: hidden;
        }

        .carousel-item img {
            height: 100%;
            max-height: 500px;
            width: 100%;
            object-fit: cover;
        }

        .mt-5 {
            margin-top: 2rem !important;
        }
    </style>
    <title>SoreCurriculums</title>
</head>
<body>
    <nav class="navegador">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Perfil</a>
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

    <div class="mt-5">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../resources/images.jpeg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Primera imagen</h5>
                        <p>Contenido representativo de la primera imagen.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../resources/images.jpeg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Segunda imagen</h5>
                        <p>Contenido representativo de la segunda imagen.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../resources/images.jpeg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tercera imagen</h5>
                        <p>Contenido representativo de la tercera imagen.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido a SoreCurriculums</h1>
        <p class="text-center">Aquí puedes gestionar tu perfil y buscar ofertas de trabajo.</p>
</body>
</html>
