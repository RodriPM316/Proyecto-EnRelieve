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

    <?php include_once 'modales.php'; ?>

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