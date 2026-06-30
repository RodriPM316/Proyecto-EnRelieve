<?php
    include_once '../php/textos.php';
    session_start(); //Iniciando una sesion
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>EnRelieve - Traductor</title> <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#09f">
    <meta name="description" content="EnRelieve es una plataforma especializada en la traducción del idioma 
    español al sistema de lectoescritura Braille, facilitando el acceso a herramientas educativas y de inclusión.">

    <link rel="icon" type="image/png" href="../image/icon-page.png">

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
                            <a class="nav-link nav-btn px-3 py-2 active fw-bold text-primary" aria-current="page" href="translate.php">Traductor</a>
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

    <main class="container my-5 p-4 p-md-5 bg-white rounded shadow-sm main-enhanced">
        <header class="text-center mb-4">
            <h1 class="fw-bold text-primary display-6">Traductor Inteligente</h1>
            <p class="text-muted fs-5">Escribe en español para generar instantáneamente su equivalente en sistema Braille.</p>
        </header>

        <section class="d-flex justify-content-center mb-5">
            <div class="bg-light p-1 rounded-pill shadow-sm d-inline-flex" role="group" aria-label="Selector de Grado">
                <input type="radio" class="btn-check" name="gradoBraille" id="grado1" value="1" autocomplete="off" checked>
                <label class="btn btn-outline-primary rounded-pill px-4 fw-semibold border-0" for="grado1">Grado 1 (Literal)</label>

                <input type="radio" class="btn-check" name="gradoBraille" id="grado2" value="2" autocomplete="off">
                <label class="btn btn-outline-primary rounded-pill px-4 fw-semibold border-0" for="grado2">Grado 2 (Estenográfico)</label>
            </div>
        </section>

        <section class="row g-4 justify-content-center mb-5">
            <article class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm p-3 bg-light rounded">
                    <label for="textSpanish" class="form-label fw-bold text-dark fs-5 mb-2 d-flex align-items-center">
                        <span class="badge bg-primary me-2 rounded-circle">1</span> Texto en Español
                    </label>
                    <textarea class="form-control textarea-estilizado" id="textSpanish" placeholder="Escribe o pega tu texto aquí..."></textarea>
                </div>
            </article>

            <article class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm p-3 bg-light rounded">
                    <label for="textBraille" class="form-label fw-bold text-dark fs-5 mb-2 d-flex align-items-center">
                        <span class="badge bg-secondary me-2 rounded-circle">2</span> Representación Braille
                    </label>
                    <textarea class="form-control textarea-estilizado" id="textBraille" placeholder="La traducción aparecerá aquí..." disabled></textarea>
                </div>
            </article>
        </section>

        <section class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">
            <button class="btn btn-primary btn-lg px-5 shadow-sm text-white py-2.5" type="button" onclick="Traducir()">
                Traducir Texto
            </button>
            <button class="btn btn-outline-secondary btn-lg px-5 py-2.5" type="button" onclick="limpiarTextareas()">
                Limpiar todo
            </button>
        </section>
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
                                <label for="aPaterno" class="ms-1">Apellido ...</label>
                            </div>

                            <div class="col-md-6 form-floating mb-3">
                                <input type="text" class="form-control" id="aMaterno" 
                                name="aMaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" 
                                title="Agrega un apellido materno válido" required>
                                <label for="aMaterno" class="ms-1">Apellido ...</label>
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
    <script src="../JS/Traduccion.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        function limpiarTextareas() {
            document.getElementById("textSpanish").value = "";
            document.getElementById("textBraille").value = "";
        }
    </script>
</body>
</html>