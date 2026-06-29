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