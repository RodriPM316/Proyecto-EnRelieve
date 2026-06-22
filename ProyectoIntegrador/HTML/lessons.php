<?php
    include_once '../php/textos.php';
    session_start(); //Iniciando una sesion
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!--Codificación por defecto-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Contenido adaptable al ancho del dispositivo-->
    <title>EnRelieve - Lecciones</title> <!--Titulo de la página-->

    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#09f">
    <meta name="description" content="EnRelieve es una plataforma especializada en la traducción del idioma 
    español al sistema de lectoescritura Braille, facilitando el acceso a herramientas educativas y de inclusión.">

    <link rel="icon" type="image/png" href="../image/icon-page.png">

    <!--Styles-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
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

                <!--Contenedor colapsable-->
                <section class="collapse navbar-collapse" id="navbarnavigation">
                    <!-- Buscador -->
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
                            <a class="nav-link nav-btn px-3 py-2" aria-current="page" href="translate.php">Traductor</a>
                        </li>

                        <?php if (empty($_SESSION['usuario'])): ?>
                            <li class="nav-item">
                                <a class="nav-link disable px-3 py-2 text-muted" aria-current="page" href="#">Lecciones</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link nav-btn px-3 py-2 active fw-bold text-primary" aria-current="page" href="#">Lecciones</a>
                            </li>
                        <?php endif; ?>

                        <!-- HTML que solo se muestra si el usuario es Administrador o Supervisor -->
                        <?php if (isset($_SESSION['nivel']) && isset($_SESSION['usuario']) &&
                                ($_SESSION['nivel'] === 'Administrador' || $_SESSION['nivel'] === 'Supervisor')): ?>
                            <li class="nav-item">
                                <a class="nav-link nav-btn px-3 py-2" href="dashboard.php">Administrar</a>
                            </li>
                        <?php endif; ?>

                        <!-- Botón de Cuenta / Ingreso -->
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

    <main class="container my-5 p-4 p-md-5 bg-white rounded shadow-sm main-enhanced">
        <header class="text-center mb-5">
            <h1 class="text-primary fw-bold display-6">Academia EnRelieve</h1>
            <p class="text-muted fs-5">Completa las lecciones y cuestionarios para desbloquear nuevos conocimientos.</p>
        </header>

        <!-- MAPA DE NIVELES -->
        <section id="mapaNiveles" class="row g-4 justify-content-center">
            
            <article class="col-md-4">
                <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4 nivel-card" id="card-nivel-1" onclick="abrirNivel(1)">
                    <div class="mb-3">
                        <span class="display-4">🔤</span>
                    </div>
                    <h3 class="h5 fw-bold text-primary">Nivel 1: Alfabeto (Grado 1)</h3>
                    <p class="text-muted mb-3 justificado">Conoce la historia del Braille y cómo se forman las letras básicas.</p>
                    <span class="badge bg-success rounded-pill px-3 py-2">Desbloqueado</span>
                </div>
            </article>

            <article class="col-md-4">
                <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4 nivel-card opaco" id="card-nivel-2" onclick="abrirNivel(2)">
                    <div class="mb-3">
                        <span class="display-4">🔢</span>
                    </div>
                    <h3 class="h5 fw-bold text-secondary">Nivel 2: Numeración</h3>
                    <p class="text-muted mb-3 justificado">Descubre el prefijo mágico que convierte las letras en números.</p>
                    <span class="badge bg-secondary rounded-pill px-3 py-2" id="badge-nivel-2">🔒 Bloqueado</span>
                </div>
            </article>

            <article class="col-md-4">
                <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4 nivel-card opaco" id="card-nivel-3" onclick="abrirNivel(3)">
                    <div class="mb-3">
                        <span class="display-4">⚡</span>
                    </div>
                    <h3 class="h5 fw-bold text-secondary">Nivel 3: Grado 2 (Estenografía)</h3>
                    <p class="text-muted mb-3 justificado">Aprende a leer más rápido usando contracciones de palabras.</p>
                    <span class="badge bg-secondary rounded-pill px-3 py-2" id="badge-nivel-3">🔒 Bloqueado</span>
                </div>
            </article>

            <article class="col-md-4">
                <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4 nivel-card opaco" id="card-nivel-4" onclick="abrirNivel(4)">
                    <div class="mb-3">
                        <span class="display-4">⚖️</span>
                    </div>
                    <h3 class="h5 fw-bold text-secondary">Nivel 4: Reglas de Contracción</h3>
                    <p class="text-muted mb-3 justificado">Domina las normativas de acentuación y prioridad en estenografía.</p>
                    <span class="badge bg-secondary rounded-pill px-3 py-2" id="badge-nivel-4">🔒 Bloqueado</span>
                </div>
            </article>

            <article class="col-md-4">
                <div class="card h-100 border-0 shadow-sm lesson-section text-center p-4 nivel-card opaco" id="card-nivel-5" onclick="abrirNivel(5)">
                    <div class="mb-3">
                        <span class="display-4">🛑</span>
                    </div>
                    <h3 class="h5 fw-bold text-secondary">Nivel 5: Interruptor Estenográfico</h3>
                    <p class="text-muted mb-3 justificado">Aprende a usar los diferenciadores para evitar confusiones de lectura.</p>
                    <span class="badge bg-secondary rounded-pill px-3 py-2" id="badge-nivel-5">🔒 Bloqueado</span>
                </div>
            </article>

        </section>

        <!-- CONTENEDOR DE LA LECCIÓN (Oculto por defecto) -->
        <section id="contenedorLeccion" class="d-none">
            <button class="btn btn-outline-secondary mb-4 rounded-pill" onclick="volverAlMapa()">⬅ Volver al Mapa</button>
            
            <div id="contenidoLeccion" class="bg-light p-4 rounded-3 shadow-sm border border-white">
                <!-- El contenido se inyecta por JS -->
            </div>

            <!-- CUESTIONARIO -->
            <div class="mt-5 p-4 bg-white rounded-3 shadow-sm border border-light">
                <h4 class="fw-bold text-primary mb-4">📝 Demuestra lo que aprendiste</h4>
                <div id="contenedorPregunta">
                    <!-- Las preguntas se inyectan por JS -->
                </div>
                <div id="feedbackQuiz" class="mt-3 d-none alert"></div>
                <button id="btnValidar" class="btn btn-primary mt-3 px-4 rounded-pill fw-bold" onclick="validarRespuesta()">Validar Respuesta</button>
            </div>
        </section>
    </main>

    <footer class="container-fluid background_footer text-dark pt-5 pb-4">
        <section class="container text-center text-md-start">
            <div class="row text-center text-md-start g-4">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold text-primary">Nosotros</h2>
                    <hr class="mb-4">
                    <article class="justificado">
                        En EnRelieve trabajamos para impulsar la inclusión mediante soluciones tecnológicas accesibles. 
                        Desarrollamos un traductor web que convierte texto a Braille en tiempo real y lo envía a un sistema físico 
                        controlado por Arduino, donde servomotores representan cada carácter en un módulo táctil.
                    </article>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold text-primary">Legal</h2>
                    <hr class="mb-4">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a class="nav-link footer-btn d-inline-block" href="#" data-bs-toggle="modal" data-bs-target="#terminosYCondiciones">Términos y Condiciones</a>
                        </li>
                        <li>
                            <a class="nav-link footer-btn d-inline-block" href="#" data-bs-toggle="modal" data-bs-target="#avisoPrivacidad">Aviso de Privacidad</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold text-primary">Déjanos ayudarte</h2>
                    <hr class="mb-4">
                    <nav>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a href="#" class="footer-btn d-inline-block">Contacto</a></li>
                            <li><a href="#" class="footer-btn d-inline-block">Preguntas frecuentes</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12">
                    <hr class="mb-4">
                    <section class="text-center mb-2">
                        <p class="m-0">Copyright En Relieve - 2025. Todos los derechos reservados.</p>
                    </section>
                </div>
            </div>
        </section>
    </footer>

    <!-- OffCANVAS Accounts (Mismo que index) -->
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
                        <div class="invalid-feedback">Agrega un usuario válido.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control rounded-3" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                        <label for="contrasena">Contraseña</label>
                        <div class="invalid-feedback">Agrega la contraseña correcta.</div>
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

    <!-- MODAL REGISTRO (Mismo que index) -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <header class="modal-header border-0 px-4 pt-4">
                    <h1 class="modal-title fs-4 fw-bold text-dark">Regístrate en EnRelieve</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>
                <section class="modal-body px-4 pb-4">
                    <form action="../php/agregarU.php" method="POST" onsubmit="return validar(this.email.value);" autocomplete="off">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" placeholder="Nombre" title="Agrega un nombre válido" required>
                            <label for="name">Nombre</label>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" class="form-control" id="aPaterno" name="aPaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" required>
                                <label for="aPaterno" class="ms-1">Apellido Paterno</label>
                            </div>
                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" class="form-control" id="aMaterno" name="aMaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" required>
                                <label for="aMaterno" class="ms-1">Apellido Materno</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo" required>
                            <label for="email">Correo electrónico</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user" name="user" pattern="^[a-zA-Z0-9]{4,}$" placeholder="Usuario" required>
                            <label for="user">Nombre de usuario</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" placeholder="Contraseña" required>
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

    <!-- MODAL Términos y Condiciones -->
    <div class="modal fade" id="terminosYCondiciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <header class="modal-header border-0 px-4 pt-4">
                    <h1 class="modal-title fs-4 fw-bold">Términos y Condiciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>
                <section class="modal-body px-4 pb-4 justificado">
                    <?php echo obtenerTexto('terminos'); ?>
                </section>
            </div>
        </div>
    </div>

    <!-- MODAL Aviso de Privacidad -->
    <div class="modal fade" id="avisoPrivacidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <header class="modal-header border-0 px-4 pt-4">
                    <h1 class="modal-title fs-4 fw-bold">Aviso de Privacidad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>
                <section class="modal-body px-4 pb-4 justificado">
                    <?php echo obtenerTexto('privacidad'); ?>
                </section>
            </div>
        </div>
    </div>

    <!--Scripts-->
    <script src="../js/componentes.js"></script>
    <script src="../js/validaciones.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    
    <!-- PASAR VARIABLE PHP A JS -->
    <script>
        const nivelGuardadoUsuario = <?php echo isset($_SESSION['nivel_leccion']) ? $_SESSION['nivel_leccion'] : 1; ?>;
    </script>
    <script src="../js/lecciones.js"></script>
</body>
</html>