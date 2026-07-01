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