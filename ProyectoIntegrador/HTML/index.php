<?php
    include_once '../php/textos.php';
    session_start(); //Iniciando una sesion
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>EnRelieve</title> <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#09f">
    <meta name="description" content="EnRelieve es una plataforma especializada en la traducción del idioma 
    español al sistema de lectoescritura Braille, facilitando el acceso a herramientas educativas y de inclusión.">

    <link rel="icon" type="image/png" href="../image/icon-page.png">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg background_navbar fixed-top">
            <div class="container-fluid px-4">
                <a class="navbar-brand me-4" href="index.php">
                    <figure class="m-0">
                        <img src="../image/logo.png" alt="Logo de EnRelieve" class="logo-navbar">
                    </figure>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarnavigation" aria-controls="navbarnavigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <section class="collapse navbar-collapse" id="navbarnavigation">
                    <form class="d-flex justify-content-center mx-auto w-50 my-3 my-lg-0" role="search">
                        <fieldset class="input-group shadow-sm rounded-pill overflow-hidden" style="border: 1px solid #e1e5eb;">
                            <input type="search" class="form-control input-search border-0 bg-white" aria-label="Search" placeholder="Buscar lecciones, herramientas...">
                            <button class="btn btn-white border-0 bg-white px-3" type="submit">
                                <img src="../image/lupa.png" class="icon-search img-fluid">
                            </button>
                        </fieldset>
                    </form>

                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link nav-btn px-3 py-2 text-dark" href="index.php#nosotros">Nosotros</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-btn px-3 py-2" aria-current="page" href="translate.php">Traductor</a>
                        </li>

                        <?php if (empty($_SESSION['usuario'])): ?>
                            <li class="nav-item">
                                <a class="nav-link disable px-3 py-2 text-muted" aria-current="page" href="#">Lecciones</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link nav-btn px-3 py-2" aria-current="page" href="lessons.php">Lecciones</a>
                            </li>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['nivel']) && isset($_SESSION['usuario']) &&
                                ($_SESSION['nivel'] === 'Administrador' || $_SESSION['nivel'] === 'Supervisor')): ?>
                            <li class="nav-item">
                                <a class="nav-link nav-btn px-3 py-2" href="dashboard.php">Administrar</a>
                            </li>
                        <?php endif; ?>

                        <?php if (empty($_SESSION['usuario'])): ?>
                            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                                <a class="btn btn-outline-primary rounded-pill px-4" href="#" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts" aria-controls="offCanvasAccounts">Ingresa</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                                <a class="btn btn-primary rounded-pill px-4 text-white" href="#" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts" aria-controls="offCanvasAccounts">Usuario</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </section>
            </div>
        </nav>
    </header>

    <div style="height: 100px;"></div>

    <main class="container my-5">
        <section class="interactive-banner mb-5 position-relative overflow-hidden rounded-4 shadow-lg">
            <div class="banner-background"></div>
            
            <div class="row align-items-center position-relative z-1 h-100 p-4 p-md-5">
                <div class="col-lg-7 text-white text-center text-lg-start">
                    <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill fw-bold text-uppercase" style="letter-spacing: 1px;">
                        Innovación Inclusiva
                    </span>
                    <h2 class="display-5 fw-bold mb-3 banner-title">Siente la tecnología en tus manos</h2>
                    <p class="fs-5 mb-4 opacity-75">
                        Conecta nuestra plataforma web con el módulo táctil de servomotores. Traduce, aprende y experimenta el Braille en tiempo real.
                    </p>
                    <a href="translate.php" class="btn btn-light btn-lg text-primary fw-bold px-4 rounded-pill shadow-sm banner-btn">
                        Explorar el Traductor <span class="ms-2">→</span>
                    </a>
                </div>
                
                <div class="col-lg-5 d-none d-lg-block position-relative">
                    <div class="floating-images">
                        <img src="../image/Braille3.jpg" alt="Interacción Braille" class="img-fluid rounded-4 shadow-lg floating-img img-1">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN HERO -->
        <section class="row align-items-center mb-5 bg-white rounded shadow-sm main-enhanced p-4 p-md-5">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-semibold">Plataforma Inclusiva</span>
                <h1 class="display-4 fw-bold text-dark mb-3">La tecnología al servicio de la <span class="text-primary">inclusión</span></h1>
                <p class="fs-5 text-muted mb-4 justificado">EnRelieve traduce texto del español a Braille en tiempo real y lo conecta con un módulo físico interactivo. Descubre una nueva forma de aprender y comunicar.</p>
                
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start mt-4">
                    <a href="translate.php" class="btn btn-primary btn-lg px-4 shadow-sm text-white rounded-pill">Probar Traductor</a>
                    
                    <?php if (empty($_SESSION['usuario'])): ?>
                        <a href="#" class="btn btn-outline-secondary btn-lg px-4 rounded-pill" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts">Crear Cuenta</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- CARRUSEL INTEGRADO AL HERO -->
                <div id="carouselBraille" class="carousel carousel-dark slide shadow-sm rounded overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselBraille" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselBraille" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselBraille" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <article class="carousel-item active" data-bs-interval="6000">
                            <figure class="w-100 m-0 position-relative">
                                <img src="../image/Braille1.jpg" class="d-block w-100 img-fluid" alt="Imagen accesibilidad 1" style="max-height: 420px; object-fit: cover;">
                                <figcaption class="carousel-caption d-none d-md-block text-white p-3">
                                    <h5 class="fw-bold m-0">Accesibilidad y Orientación</h5>
                                </figcaption>
                            </figure>
                        </article>

                        <article class="carousel-item" data-bs-interval="6000">
                            <figure class="w-100 m-0 position-relative">
                                <img src="../image/Braille2.jpg" class="d-block w-100 img-fluid" alt="Imagen braille 2" style="max-height: 420px; object-fit: cover;">
                                <figcaption class="carousel-caption d-none d-md-block text-white p-3">
                                    <h5 class="fw-bold m-0">Lectura Táctil</h5>
                                </figcaption>
                            </figure>
                        </article>

                        <article class="carousel-item" data-bs-interval="6000">
                            <figure class="w-100 m-0 position-relative">
                                <img src="../image/Braille3.jpg" class="d-block w-100 img-fluid" alt="Imagen braille 3" style="max-height: 420px; object-fit: cover;">
                                <figcaption class="carousel-caption d-none d-md-block text-white p-3">
                                    <h5 class="fw-bold m-0">Aprender con las Manos</h5>
                                </figcaption>
                            </figure>
                        </article>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBraille" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-white p-3 rounded-circle shadow-sm" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBraille" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-white p-3 rounded-circle shadow-sm" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- SECCIÓN DE CARACTERÍSTICAS -->
        <section class="mb-5 py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">¿Qué hace único a EnRelieve?</h2>
                <p class="text-muted fs-5">Un ecosistema diseñado para enseñar, traducir y conectar.</p>
            </div>

            <div class="row g-4">
                <article class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4">
                        <div class="mb-3">
                            <span class="display-4">⚡</span>
                        </div>
                        <h3 class="h5 fw-bold text-primary">Traducción en Tiempo Real</h3>
                        <p class="text-muted mb-0 justificado">Convierte instantáneamente caracteres del español al sistema Braille con total precisión a través de nuestro motor de traducción.</p>
                    </div>
                </article>

                <article class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4">
                        <div class="mb-3">
                            <span class="display-4">⚙️</span>
                        </div>
                        <h3 class="h5 fw-bold text-primary">Conexión Hardware</h3>
                        <p class="text-muted mb-0 justificado">El software se comunica directamente con un módulo táctil Arduino, donde servomotores físicos dan vida a los caracteres.</p>
                    </div>
                </article>

                <article class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4">
                        <div class="mb-3">
                            <span class="display-4">📖</span>
                        </div>
                        <h3 class="h5 fw-bold text-primary">Educación Inclusiva</h3>
                        <p class="text-muted mb-0 justificado">Accede a lecciones en video interactivas para entender la lógica del alfabeto y la numeración táctil desde cero.</p>
                    </div>
                </article>
            </div>
        </section>

        <section id="nosotros" class="mb-5 py-5 bg-light rounded-4 shadow-sm px-4 px-md-5 border border-white">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2 px-3 py-2 rounded-pill fw-semibold">Nuestro Propósito</span>
                    <h2 class="fw-bold text-dark display-6 mb-4">Sobre <span class="text-primary">EnRelieve</span></h2>
                    <p class="fs-5 text-muted justificado">Trabajamos para impulsar la inclusión mediante soluciones tecnológicas accesibles. Desarrollamos un traductor web que convierte texto a Braille en tiempo real y lo envía a un sistema físico controlado por Arduino.</p>
                    <p class="fs-5 text-muted justificado mb-0">Allí, servomotores representan cada carácter en un módulo táctil, permitiendo que las personas con discapacidad visual puedan percibir mediante el tacto la información mostrada en pantalla.</p>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="ratio ratio-4x3 rounded-4 shadow-sm overflow-hidden bg-white d-flex align-items-center justify-content-center border" style="min-height: 250px;">
                        <span class="text-muted fw-semibold px-4">📸 [Aquí puedes colocar una fotografía real de tu integración con Arduino]</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- LLAMADO A LA ACCIÓN FINAL -->
        <?php if (empty($_SESSION['usuario'])): ?>
        <section class="bg-primary text-white rounded shadow-sm p-5 text-center position-relative overflow-hidden mb-2">
            <div class="position-relative z-1">
                <h2 class="fw-bold mb-3 display-6">¿Listo para aprender Braille?</h2>
                <p class="fs-5 mb-4 opacity-75">Regístrate gratis para acceder a todo nuestro material educativo y guardar tu progreso.</p>
                <button class="btn btn-light btn-lg text-primary fw-bold px-5 rounded-pill shadow-sm mt-2" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts">Comenzar ahora</button>
            </div>
        </section>
        <?php endif; ?>
    </main>
        
    <footer class="container-fluid background_footer text-dark pt-4 pb-3 mt-auto">
        <section class="container text-center text-md-start">
            <div class="row align-items-center g-4">
                <div class="col-md-4 col-lg-5 mb-3 mb-md-0">
                    <h4 class="text-primary fw-bold mb-2">EnRelieve</h4>
                    <p class="text-muted small mb-0">Tecnología e inclusión al alcance de tus manos.</p>
                </div>

                <div class="col-md-4 col-lg-3">
                    <h6 class="text-uppercase fw-bold text-white mb-3">Legal</h6>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li><a class="nav-link footer-btn d-inline-block small p-0" href="#" data-bs-toggle="modal" data-bs-target="#terminosYCondiciones">Términos y Condiciones</a></li>
                        <li><a class="nav-link footer-btn d-inline-block small p-0" href="#" data-bs-toggle="modal" data-bs-target="#avisoPrivacidad">Aviso de Privacidad</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-4">
                    <h6 class="text-uppercase fw-bold text-white mb-3">Ayuda</h6>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li><a href="#" class="nav-link footer-btn d-inline-block small p-0">Contacto</a></li>
                        <li><a href="#" class="nav-link footer-btn d-inline-block small p-0">Preguntas frecuentes</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 border-light opacity-25">
            
            <div class="text-center">
                <p class="m-0 small text-muted">Copyright En Relieve - 2026. Todos los derechos reservados.</p>
            </div>
        </section>
    </footer>

    <aside class="offcanvas offcanvas-end text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="offCanvasAccounts" aria-labelledby="offcanvaOfAccount">
        <?php if (empty($_SESSION['usuario'])): ?>
            <header class="offcanvas-header px-4 pt-4">
                <h2 class="offcanvas-title fw-bold text-white" id="offcanvaOfAccount">Inicio de sesión</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </header>

            <hr class="mx-4 mb-3 opacity-25">

            <section class="offcanvas-body px-4">
                <form action="../php/login.php" method="POST" onsubmit="return valUser(this.elements['usuario'].value, this.elements['contrasena'].value);" 
                    class="p-4 border rounded-3 bg-light shadow-sm needs-validation text-dark" novalidate>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="usuario" id="usuario" placeholder="Usuario" required>
                        <label for="usuario">Usuario</label>
                        <div class="invalid-feedback">
                            Agrega un usuario válido.
                        </div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control rounded-3" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                        <label for="contrasena">Contraseña</label>
                        <div class="invalid-feedback">
                            Agrega la contraseña correcta.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 text-white shadow-sm">Iniciar sesión</button>
                </form>

                <hr class="my-4 opacity-25">

                <nav class="d-flex justify-content-center">
                    <a class="nav-link text-white fw-semibold border-bottom border-white pb-1" href="#" onclick="cerrarOffcanvas('offCanvasAccounts', 'modalRegistro')">
                        ¿No tienes cuenta? Regístrate aquí
                    </a>
                </nav>
            </section>
        <?php else: ?>
            <?php echo obtenerTexto('usuario'); ?>
        <?php endif; ?>
    </aside>

    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <header class="modal-header border-0 px-4 pt-4">
                    <h1 class="modal-title fs-4 fw-bold text-dark">Regístrate en EnRelieve</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>

                <section class="modal-body px-4 pb-4">
                    <form action="../php/agregarU.php" method="POST" 
                        onsubmit="return validar(this.email.value);" autocomplete="off">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name"
                            name="name" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" 
                            placeholder="Nombre" title="Agrega un nombre válido" required>
                            <label for="name">Nombre</label>
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" class="form-control" id="aPaterno" 
                                name="aPaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" 
                                title="Agrega un apellido paterno válido" required>
                                <label for="aPaterno" class="ms-1">Apellido Paterno</label>
                            </div>

                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" class="form-control" id="aMaterno" 
                                name="aMaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" 
                                title="Agrega un apellido materno válido" required>
                                <label for="aMaterno" class="ms-1">Apellido Materno</label>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" 
                            name="email" placeholder="Correo" title="Agrega un correo válido." required>
                            <label for="email">Correo electrónico</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user" 
                            name="user" pattern="^[a-zA-Z0-9]{4,}$" placeholder="Usuario" 
                            title="Debe tener mínimo 4 caracteres alfanuméricos." required>
                            <label for="user">Nombre de usuario</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" 
                            name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" 
                            placeholder="Contraseña" title="Debe incluir mayúscula, minúscula y número." required>
                            <label for="password">Contraseña</label>
                        </div>

                        <footer class="border-0 p-0 d-flex justify-content-end gap-2">
                            <input type="reset" value="Limpiar" class="btn btn-light px-4 rounded-3">
                            <input type="submit" value="Registrarme" class="btn btn-primary px-4 rounded-3 text-white">
                        </footer>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <div class="modal fade" id="terminosYCondiciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tycLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <header class="modal-header border-0 px-4 pt-4">
                    <h1 class="modal-title fs-4 fw-bold" id="tycLabel">Términos y Condiciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>
                <section class="modal-body px-4 pb-4 justificado">
                    <?php echo obtenerTexto('terminos'); ?>
                </section>
            </div>
        </div>
    </div>

    <div class="modal fade" id="avisoPrivacidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="apLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <header class="modal-header border-0 px-4 pt-4">
                    <h1 class="modal-title fs-4 fw-bold" id="apLabel">Aviso de Privacidad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>
                <section class="modal-body px-4 pb-4 justificado">
                    <?php echo obtenerTexto('privacidad'); ?>
                </section>
            </div>
        </div>
    </div>

    <script src="../js/componentes.js"></script>
    <script src="../js/validaciones.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <?php
    if (isset($_GET['error'])) {
        $mensaje = "";
        switch ($_GET['error']) {
            case "1": $mensaje = "Usuario no encontrado"; break;
            case "2": $mensaje = "El correo ya existe"; break;
            case "3": $mensaje = "El usuario ya existe"; break;
            default: $mensaje = "Error desconocido";
        }
        echo "<script>alert('$mensaje');</script>";
    }
    ?>
</body>
</html>