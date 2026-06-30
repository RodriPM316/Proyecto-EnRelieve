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
    <nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container-fluid px-4">
            
            <a class="navbar-brand me-4" href="index.php">
                <figure class="m-0">
                    <img src="../image/logo.png" alt="Logo de EnRelieve" class="logo-navbar">
                </figure>
            </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarnavigation" aria-controls="navbarnavigation" aria-expanded="false" aria-label="Abrir menú de navegación">
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

                        <li class="nav-item ms-lg-3 me-2">
                            <button class="btn btn-link nav-link px-2 d-flex align-items-center" id="theme-toggle" type="button" aria-label="Cambiar tema">
                                <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-none" viewBox="0 0 16 16">
                                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                </svg>
                                <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                </svg>
                            </button>
                        </li>

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

        <!-- SÚPER HERO UNIFICADO -->
        <section class="interactive-banner position-relative overflow-hidden rounded-4 shadow-lg mb-5 mt-4 mx-3 mx-md-0">
            <div class="banner-background"></div>
            
            <div class="row align-items-center position-relative z-1 h-100 p-4 p-md-5">
                <!-- Columna de Texto y Llamados a la Acción -->
                <div class="col-lg-6 text-white text-center text-lg-start mb-4 mb-lg-0">
                    <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill fw-bold text-uppercase shadow-sm" style="letter-spacing: 1px;">
                        Innovación e Inclusión
                    </span>
                    <h1 class="display-4 fw-bold mb-3 banner-title">La tecnología al servicio de la inclusión</h1>
                    <p class="fs-5 mb-4 opacity-75" style="max-width: 90%;">
                        EnRelieve traduce texto del español a Braille en tiempo real y lo conecta con un módulo físico táctil de servomotores. Siente la tecnología en tus manos.
                    </p>
                    
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start mt-4">
                        <a href="translate.php" class="btn btn-light btn-lg text-primary fw-bold px-4 rounded-pill shadow-sm banner-btn">
                            Probar Traductor <span class="ms-2">→</span>
                        </a>
                        <?php if (empty($_SESSION['usuario'])): ?>
                            <a href="#" class="btn btn-outline-light btn-lg px-4 rounded-pill" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts">
                                Crear Cuenta
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Columna Visual (Imágenes Flotantes) -->
                <div class="col-lg-6 d-none d-lg-block position-relative">
                    <div class="floating-images d-flex justify-content-center">
                        <!-- Usamos la imagen más representativa del Braille -->
                        <img src="../image/Braille3.jpg" alt="Módulo físico de interacción Braille" class="img-fluid rounded-4 shadow-lg floating-img">
                    </div>
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

        <section class="mb-5 py-5 main-enhanced p-4 p-md-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-semibold">Interactúa desde la Web</span>
                    <h2 class="fw-bold text-dark display-6 mb-3">Experimenta el alfabeto táctil</h2>
                    <p class="text-muted fs-5">Haz clic o pasa el cursor sobre las letras para ver cómo se configuran dinámicamente los servomotores en el cajetín físico de 6 puntos.</p>
                    
                    <div class="d-flex flex-wrap gap-2 mt-4" id="alphabet-selector">
                        <button class="btn btn-outline-primary rounded-pill px-3 active-letter" onclick="actualizarCajetitn('a', [1])">A</button>
                        <button class="btn btn-outline-primary rounded-pill px-3" onclick="actualizarCajetitn('b', [1, 2])">B</button>
                        <button class="btn btn-outline-primary rounded-pill px-3" onclick="actualizarCajetitn('c', [1, 4])">C</button>
                        <button class="btn btn-outline-primary rounded-pill px-3" onclick="actualizarCajetitn('d', [1, 4, 5])">D</button>
                        <button class="btn btn-outline-primary rounded-pill px-3" onclick="actualizarCajetitn('e', [1, 5])">E</button>
                        <button class="btn btn-outline-primary rounded-pill px-3" onclick="actualizarCajetitn('f', [1, 2, 4])">F</button>
                        <button class="btn btn-outline-primary rounded-pill px-3" onclick="actualizarCajetitn('g', [1, 2, 4, 5])">G</button>
                    </div>
                </div>
                
                <div class="col-lg-6 text-center">
                    <div class="p-5 bg-light rounded-4 border d-inline-block shadow-sm position-relative" style="min-width: 280px;">
                        <h5 class="fw-bold mb-4 text-secondary" id="label-letra">Letra "A"</h5>
                        
                        <div class="braille-preview-box">
                            <div class="braille-dot active" id="dot-1" title="Punto 1"></div>
                            <div class="braille-dot" id="dot-4" title="Punto 4"></div>
                            <div class="braille-dot" id="dot-2" title="Punto 2"></div>
                            <div class="braille-dot" id="dot-5" title="Punto 5"></div>
                            <div class="braille-dot" id="dot-3" title="Punto 3"></div>
                            <div class="braille-dot" id="dot-6" title="Punto 6"></div>
                        </div>
                    </div>
                </div>
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

    <!-- OffCANVAS Accounts Rediseñado -->
    <aside class="offcanvas offcanvas-end offcanvas-glass shadow-lg" data-bs-backdrop="static" tabindex="-1" id="offCanvasAccounts" aria-labelledby="offcanvaOfAccount">
        <?php if (empty($_SESSION['usuario'])): ?>
            <header class="offcanvas-header px-4 pt-5 pb-3">
                <div>
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2 px-3 py-1 rounded-pill fw-semibold">¡Hola de nuevo!</span>
                    <h2 class="offcanvas-title fw-bold text-dark display-6" id="offcanvaOfAccount">Ingresa</h2>
                </div>
                <button type="button" class="btn-close mb-auto" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </header>

            <section class="offcanvas-body px-4">
                <form action="../php/login.php" method="POST" onsubmit="return valUser(this.elements['usuario'].value, this.elements['contrasena'].value);" class="needs-validation" novalidate>
                    
                    <div class="form-floating mb-3 position-relative">
                        <input type="text" class="form-control form-control-premium" name="usuario" id="usuario" placeholder="Usuario" required>
                        <label for="usuario" class="text-muted">Nombre de usuario</label>
                        <div class="invalid-feedback">Por favor, ingresa tu usuario.</div>
                    </div>

                    <div class="form-floating mb-4 position-relative">
                        <input type="password" class="form-control form-control-premium pe-5" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                        <label for="contrasena" class="text-muted">Contraseña</label>
                        <!-- Ojo para mostrar contraseña (SVG inyectado para mejor rendimiento) -->
                        <button type="button" class="password-toggle" onclick="togglePassword('contrasena', 'eye-icon-login')" aria-label="Mostrar contraseña">
                            <svg id="eye-icon-login" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                        </button>
                        <div class="invalid-feedback">La contraseña es obligatoria.</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold text-white shadow-sm mb-4">Iniciar sesión</button>
                </form>

                <div class="text-center mt-auto">
                    <p class="text-muted mb-1">¿Aún no tienes cuenta?</p>
                    <a class="text-primary fw-bold text-decoration-none" href="#" onclick="cerrarOffcanvas('offCanvasAccounts', 'modalRegistro')">
                        Regístrate gratis aquí <span class="ms-1">→</span>
                    </a>
                </div>
            </section>
        <?php else: ?>
            <!-- El texto del usuario logueado también debe adaptarse al fondo claro en textos.php -->
            <?php echo obtenerTexto('usuario'); ?>
        <?php endif; ?>
    </aside>

    <!-- MODAL REGISTRO REDISEÑADO -->
    <div class="modal fade modal-premium" id="modalRegistro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-lg para dar más respiro a los campos -->
            <div class="modal-content border-0">
                <div class="row g-0">
                    <!-- Columna decorativa (Opcional, muy usado en diseño UI moderno) -->
                    <div class="col-md-4 d-none d-md-block bg-primary rounded-start" style="background: linear-gradient(135deg, var(--primary-color) 0%, #4a90e2 100%);">
                        <div class="h-100 d-flex flex-column justify-content-center p-4 text-white">
                            <h3 class="fw-bold mb-3">Únete a EnRelieve</h3>
                            <p class="opacity-75">Crea tu cuenta para guardar tu progreso en las lecciones y acceder a todas las herramientas inclusivas.</p>
                        </div>
                    </div>
                    
                    <!-- Columna del Formulario -->
                    <div class="col-md-8">
                        <header class="modal-header border-0 px-4 pt-4 pb-0">
                            <h2 class="modal-title fs-4 fw-bold text-dark">Registro</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </header>
                        
                        <section class="modal-body px-4 pb-4 pt-3">
                            <form action="../php/agregarU.php" method="POST" onsubmit="return validar(this.email.value);" autocomplete="off" class="needs-validation" novalidate>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-control-premium" id="name" name="name" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" placeholder="Nombre" required>
                                    <label for="name" class="text-muted">Nombre(s)</label>
                                </div>

                                <div class="row g-2">
                                    <div class="col-md-6 form-floating mb-3">
                                        <input type="text" class="form-control form-control-premium" id="aPaterno" name="aPaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" placeholder="Paterno" required>
                                        <label for="aPaterno" class="ms-1 text-muted">Apellido Paterno</label>
                                    </div>
                                    <div class="col-md-6 form-floating mb-3">
                                        <input type="text" class="form-control form-control-premium" id="aMaterno" name="aMaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" placeholder="Materno" required>
                                        <label for="aMaterno" class="ms-1 text-muted">Apellido Materno</label>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control form-control-premium" id="email" name="email" placeholder="Correo" required>
                                    <label for="email" class="text-muted">Correo electrónico</label>
                                </div>

                                <div class="row g-2">
                                    <div class="col-md-6 form-floating mb-4">
                                        <input type="text" class="form-control form-control-premium" id="user" name="user" pattern="^[a-zA-Z0-9]{4,}$" placeholder="Usuario" required>
                                        <label for="user" class="ms-1 text-muted">Usuario</label>
                                    </div>
                                    <div class="col-md-6 form-floating mb-4 position-relative">
                                        <input type="password" class="form-control form-control-premium pe-5" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" placeholder="Contraseña" required>
                                        <label for="password" class="ms-1 text-muted">Contraseña</label>
                                        <!-- Toggle Visibilidad -->
                                        <button type="button" class="password-toggle" onclick="togglePassword('password', 'eye-icon-reg')" aria-label="Mostrar contraseña">
                                            <svg id="eye-icon-reg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <footer class="border-0 p-0 d-flex justify-content-end gap-3 mt-2">
                                    <button type="button" class="btn btn-light px-4 rounded-pill fw-medium" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary px-5 rounded-pill fw-bold text-white shadow-sm">Registrarme</button>
                                </footer>
                            </form>
                        </section>
                    </div>
                </div>
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

    <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastContainer" style="z-index: 9999;">
    </div>

    <script src="../js/componentes.js"></script>
    <script src="../js/validaciones.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <?php
    if (isset($_GET['error'])) {
        $mensaje = "";
        switch ($_GET['error']) {
            case "1": $mensaje = "Usuario o contraseña incorrectos."; break;
            case "2": $mensaje = "El correo ya está registrado."; break;
            case "3": $mensaje = "El nombre de usuario ya está en uso."; break;
            default: $mensaje = "Ocurrió un error inesperado.";
        }
        // Inyectamos el mensaje en la función JS
        echo "<script>
                document.addEventListener('DOMContentLoaded', () => {
                    mostrarAlerta('$mensaje', 'danger');
                });
            </script>";
    }
    ?>
</body>
</html>