<?php
include_once '../php/textos.php';
include_once '../php/consultas.php';
include_once '../php/conexion.php';
session_start(); //Iniciando una sesion

$con = conectar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!--Codificación por defecto-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Contenido adaptable al ancho del dispositivo-->
    <title>EnRelieve - Dashboard</title> <!--Titulo de la página-->

    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#09f">
    <meta name="description" content="EnRelieve es una plataforma especializada en la traducción del idioma español al sistema de lectoescritura Braille.">

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
                            <input type="search" class="form-control input-search border-0 bg-white" aria-label="Search" placeholder="Buscar usuarios, correos...">
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
                                <a class="nav-link nav-btn px-3 py-2" aria-current="page" href="lessons.php">Lecciones</a>
                            </li>
                        <?php endif; ?>

                        <!-- HTML que solo se muestra si el usuario es Administrador o Supervisor -->
                        <?php if (isset($_SESSION['nivel']) && isset($_SESSION['usuario']) &&
                                ($_SESSION['nivel'] === 'Administrador' || $_SESSION['nivel'] === 'Supervisor')): ?>
                            <li class="nav-item">
                                <a class="nav-link nav-btn px-3 py-2 active fw-bold text-primary" href="dashboard.php">Administrar</a>
                            </li>
                        <?php endif; ?>

                        <!-- Botón de Cuenta / Ingreso -->
                        <?php if (empty($_SESSION['usuario'])): ?>
                            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                                <a class="btn btn-outline-primary rounded-pill px-4" href="#" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts">Ingresa</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                                <a class="btn btn-primary rounded-pill px-4 text-white" href="#" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts">Usuario</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </section>
            </div>
        </nav>
    </header>

    <div style="height: 100px;"></div>

    <!-- TABLE MAIN -->
    <main class="container my-5 p-4 p-md-5 bg-white rounded shadow-sm main-enhanced" >
        <header class="mb-4">
            <h1 class="text-primary fw-bold display-6" id="titulo-usuarios">Panel de Administración</h1>
            <p class="text-muted fs-5">Gestiona los usuarios registrados en la plataforma EnRelieve.</p>
        </header>

        <section aria-labelledby="titulo-usuarios">
            <div class="table-responsive tabla-scroll border rounded shadow-sm">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3 px-4 text-secondary">#</th>
                            <th scope="col" class="py-3 text-secondary">Nombre Completo</th>
                            <th scope="col" class="py-3 text-secondary">Usuario</th>
                            <th scope="col" class="py-3 text-secondary">Email</th>
                            <th scope="col" class="py-3 text-secondary">Nivel de Acceso</th>
                            <th scope="col" class="py-3 text-secondary text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php
                            $datos = datos($con);
                            while($fila = $datos->fetch_assoc()){
                                ?>
                                <tr>
                                    <th scope="row" class="px-4 text-muted"> <?php echo $fila['id'] ?> </th>                                
                                    <td class="fw-medium"> <?php echo $fila['Nombre']. " " .$fila['aPaterno']. " " .$fila['aMaterno'] ?> </td>
                                    <td> <?php echo $fila['Usuario'] ?> </td>
                                    <td class="text-muted"> <?php echo $fila['Correo'] ?> </td>
                                    <td>
                                        <!--Válida que nivel de usuario tienes para mostrar una tabla dependiendo del caso-->
                                        <?php if ($_SESSION['nivel'] == 'Administrador'): ?>
                                            <?php switch ($fila['nivel']):
                                                case 'Administrador': ?>
                                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger rounded-pill px-3 py-2">
                                                        <?php echo $fila['nivel'] ?>
                                                    </span>
                                                <?php break;

                                                case 'Supervisor': ?>
                                                    <select class="form-select form-select-sm text_select w-auto shadow-none border-primary text-primary fw-medium rounded-pill" aria-label="select Supervisor"
                                                    onchange="cambiarNivel(this, '<?= $fila['Usuario'] ?>')">
                                                        <option selected disabled><?php echo $fila['nivel'] ?></option>
                                                        <option value="Usuario">Usuario</option>
                                                    </select>
                                                <?php break;

                                                case 'Usuario': ?>
                                                <select class="form-select form-select-sm text_select w-auto shadow-none border-secondary text-secondary fw-medium rounded-pill" aria-label="select Usuario"
                                                onchange="cambiarNivel(this, '<?= $fila['Usuario'] ?>')">
                                                        <option selected disabled><?php echo $fila['nivel'] ?></option>
                                                        <option value="Supervisor">Supervisor</option>
                                                    </select>
                                                <?php break;
                                            endswitch; ?>
                                        <?php else: ?>
                                            <span class="badge bg-light text-dark border rounded-pill px-3 py-2">
                                                <?php echo $fila['nivel'] ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <!--Si eres administrador, no puedes eliminarte-->
                                        <?php if ($fila['nivel'] === 'Administrador'): ?>
                                            <span class="text-muted small">No aplicable</span>
                                        <?php else: ?>
                                            <a class="table-link text-decoration-none" 
                                            href="../php/eliminarU.php?user=<?php echo $fila['Usuario'];?>&nivel=<?php echo $fila['nivel'];?>">Eliminar</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php } 
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer class="container-fluid background_footer text-dark pt-5 pb-4 mt-auto">
        <section class="container text-center text-md-start">
            <div class="row text-center text-md-start g-4">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold text-primary">Nosotros</h2>
                    <hr class="mb-4">
                    <article class="justificado">
                        En EnRelieve trabajamos para impulsar la inclusión mediante soluciones tecnológicas accesibles. 
                        Desarrollamos un traductor web que convierte texto a Braille en tiempo real y lo envía a un sistema físico.
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

    <!-- OffCANVAS Accounts -->
    <aside class="offcanvas offcanvas-end text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="offCanvasAccounts" aria-labelledby="offcanvaOfAccount">
        <?php if (empty($_SESSION['usuario'])): ?>
            <header class="offcanvas-header px-4 pt-4">
                <h2 class="offcanvas-title fw-bold text-white" id="offcanvaOfAccount">Inicio de sesión</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </header>
            <hr class="mx-4 mb-3 opacity-25">
            <section class="offcanvas-body px-4">
                <form action="../php/login.php" method="POST" onsubmit="return valUser(this.elements['usuario'].value, this.elements['contrasena'].value);" class="p-4 border rounded-3 bg-light shadow-sm needs-validation text-dark" novalidate>
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

    <!-- MODAL REGISTRO -->
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
                            <input type="text" class="form-control" id="name" name="name" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" placeholder="Nombre" required>
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
    <script>
        function cambiarNivel(select, user) {
            let nivel = select.value;
            window.location.href = "../PHP/modificar.php?nivel=" + nivel + "&user=" + user;
        }
    </script>
</body>
</html>