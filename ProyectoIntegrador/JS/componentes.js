function cerrarOffcanvas(offcanvasId, modalId) {
    const offcanvasEl = document.getElementById(offcanvasId);
    const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);

    if (offcanvas) {
        offcanvas.hide();
    }

    offcanvasEl.addEventListener('hidden.bs.offcanvas', () => {
        const modalEl = document.getElementById(modalId);
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }, { once: true });
}

// Cerrar el menú colapsable automáticamente al hacer clic en un enlace (ideal para móviles)
document.addEventListener("DOMContentLoaded", function() {
    const enlacesMenu = document.querySelectorAll('.navbar-nav .nav-link');
    const menuColapsable = document.getElementById('navbarnavigation');

    enlacesMenu.forEach(enlace => {
        enlace.addEventListener('click', function() {
            // Verifica si el menú está abierto (tiene la clase 'show')
            if (menuColapsable.classList.contains('show')) {
                // Usa la API de Bootstrap para ocultarlo de forma nativa
                const instanciaCollapse = bootstrap.Collapse.getInstance(menuColapsable);
                instanciaCollapse.hide();
            }
        });
    });
});

function actualizarCajetitn(letra, puntosActivos) {
    // Actualizar el texto indicador
    document.getElementById('label-letra').innerText = `Letra "${letra.toUpperCase()}"`;
    
    // Apagar todos los puntos primero
    for (let i = 1; i <= 6; i++) {
        document.getElementById(`dot-${i}`).classList.remove('active');
    }
    
    // Encender solo los puntos correspondientes a la letra elegida
    puntosActivos.forEach(punto => {
        const dotElement = document.getElementById(`dot-${punto}`);
        if (dotElement) {
            dotElement.classList.add('active');
        }
    });

    // Cambiar estado visual del botón seleccionado
    const botones = document.querySelectorAll('#alphabet-selector button');
    botones.forEach(btn => {
        if(btn.innerText.toLowerCase() === letra) {
            btn.classList.add('btn-primary', 'text-white');
            btn.classList.remove('btn-outline-primary');
        } else {
            btn.classList.remove('btn-primary', 'text-white');
            btn.classList.add('btn-outline-primary');
        }
    });
}

// Función para mostrar/ocultar la contraseña
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input.type === "password") {
        input.type = "text";
        // SVG Ojo cerrado (Tachado)
        icon.innerHTML = `<path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/><path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/><path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>`;
    } else {
        input.type = "password";
        // SVG Ojo abierto
        icon.innerHTML = `<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>`;
    }
}

/**
 * Muestra un Toast estético de Bootstrap
 * @param {string} mensaje - El texto a mostrar
 * @param {string} tipo - 'success', 'danger', 'warning'
 */
function mostrarAlerta(mensaje, tipo = 'danger') {
    const contenedor = document.getElementById('toastContainer');
    const id = 'toast-' + Date.now();
    
    // HTML del Toast
    const toastHtml = `
        <div class="toast align-items-center text-white bg-${tipo} border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true" id="${id}">
            <div class="d-flex">
                <div class="toast-body fw-medium">
                    ${mensaje}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
        </div>
    `;
    
    contenedor.insertAdjacentHTML('beforeend', toastHtml);
    
    const toastEl = document.getElementById(id);
    const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
    toast.show();

    // Eliminar el elemento del DOM cuando se oculte para no saturar
    toastEl.addEventListener('hidden.bs.toast', () => {
        toastEl.remove();
    });
}

document.addEventListener("DOMContentLoaded", function() {
    const navbar = document.getElementById('mainNavbar');
    const menuColapsable = document.getElementById('navbarnavigation');
    
    // Función para manejar el cambio visual del Navbar
    function onScroll() {
        // Si el usuario baja más de 50px
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
            navbar.classList.remove('navbar-transparent');
        } else {
            // Solo lo vuelve transparente si el menú móvil NO está abierto
            if (!menuColapsable.classList.contains('show')) {
                navbar.classList.remove('navbar-scrolled');
                navbar.classList.add('navbar-transparent');
            }
        }
    }

    // Escuchar el evento scroll
    window.addEventListener('scroll', onScroll);

    // Asegurar que el navbar tenga fondo sólido cuando se abre el menú móvil (botón hamburguesa)
    menuColapsable.addEventListener('show.bs.collapse', function () {
        navbar.classList.add('navbar-scrolled');
        navbar.classList.remove('navbar-transparent');
    });

    // Restaurar la transparencia si se cierra el menú móvil y estamos hasta arriba
    menuColapsable.addEventListener('hidden.bs.collapse', function () {
        if (window.scrollY <= 50) {
            navbar.classList.remove('navbar-scrolled');
            navbar.classList.add('navbar-transparent');
        }
    });
});

// ==========================================
// LÓGICA DE MODO OSCURO (DARK MODE)
// ==========================================
document.addEventListener("DOMContentLoaded", () => {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');
    const htmlElement = document.documentElement;

    // 1. Revisar si hay un tema guardado en localStorage
    const savedTheme = localStorage.getItem('theme');
    
    // 2. Aplicar el tema guardado o el preferido por el sistema
    if (savedTheme) {
        htmlElement.setAttribute('data-bs-theme', savedTheme);
        actualizarIconos(savedTheme);
    } else {
        // Detectar preferencia del sistema operativo
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (prefersDark) {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            actualizarIconos('dark');
        }
    }

    // 3. Evento para cambiar el tema al hacer clic
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            actualizarIconos(newTheme);
        });
    }

    // Función auxiliar para cambiar qué icono se muestra
    function actualizarIconos(tema) {
        if (!sunIcon || !moonIcon) return;
        
        if (tema === 'dark') {
            sunIcon.classList.remove('d-none');
            moonIcon.classList.add('d-none');
        } else {
            moonIcon.classList.remove('d-none');
            sunIcon.classList.add('d-none');
        }
    }
});