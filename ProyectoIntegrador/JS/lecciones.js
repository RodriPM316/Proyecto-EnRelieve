const lecciones = {
    1: {
        titulo: "El Alfabeto Braille (Grado 1)",
        contenido: `
            <p class="fs-5 justificado">El Braille de <strong>Grado 1</strong> es la forma literal del sistema, donde cada celda representa exactamente una letra del alfabeto, un número o un signo de puntuación. Es la base para cualquier persona que inicie en el mundo de la lectoescritura táctil.</p>
            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4" style="max-width: 700px;">
                <video controls>
                    <source src="../video/Alfabeto_Braille.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>
        `,
        pregunta: "¿Qué representa principalmente el Braille de Grado 1?",
        opciones: [
            "Contracciones de palabras completas para ahorrar espacio.",
            "Una traducción literal letra por letra del alfabeto.",
            "Un sistema exclusivo para matemáticas complejas."
        ],
        respuestaCorrecta: 1 
    },
    2: {
        titulo: "La Magia de la Numeración",
        contenido: `
            <p class="fs-5 justificado">En Braille, no existen símbolos únicos para los números. Para representarlos, utilizamos las primeras 10 letras del alfabeto (de la 'a' a la 'j') y las antecedemos con un símbolo especial llamado <strong>prefijo numérico</strong> (puntos 3, 4, 5, 6).</p>
            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4" style="max-width: 700px;">
                <video controls>
                    <source src="../video/Numerico_Braille.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>
        `,
        pregunta: "¿Cómo se forman los números en el sistema Braille?",
        opciones: [
            "Usando símbolos completamente nuevos.",
            "Sumando los puntos de dos letras juntas.",
            "Usando las letras de la 'A' a la 'J' precedidas por un prefijo numérico."
        ],
        respuestaCorrecta: 2 
    },
    3: {
        titulo: "Braille Estenográfico (Grado 2)",
        contenido: `
            <p class="fs-5 justificado">A diferencia del Grado 1, el <strong>Grado 2</strong> utiliza contracciones. Esto significa que un solo símbolo puede representar palabras comunes completas (como "que", "con", "de", "el"). Esto acelera la lectura y ahorra espacio en los libros impresos en relieve.</p>
        `,
        pregunta: "¿Cuál es el principal beneficio del Braille de Grado 2?",
        opciones: [
            "Permitir la lectura en otros idiomas.",
            "Ahorrar espacio y acelerar la lectura mediante contracciones.",
            "Hacer los puntos más grandes para mayor sensibilidad."
        ],
        respuestaCorrecta: 1
    }
};

let nivelActual = 1;
// Lee la variable inyectada desde PHP, si no existe, por defecto es 1
let nivelMaximoDesbloqueado = typeof nivelGuardadoUsuario !== 'undefined' ? nivelGuardadoUsuario : 1;

// Al cargar la página, desbloquea visualmente los niveles que el usuario ya superó
document.addEventListener("DOMContentLoaded", () => {
    for(let i = 1; i <= nivelMaximoDesbloqueado; i++) {
        desbloquearNivelEnMapa(i);
    }
});

function abrirNivel(nivel) {
    if (nivel > nivelMaximoDesbloqueado) return; 
    
    nivelActual = nivel;
    const datos = lecciones[nivel];

    document.getElementById('mapaNiveles').classList.add('d-none');
    document.getElementById('contenedorLeccion').classList.remove('d-none');

    document.getElementById('contenidoLeccion').innerHTML = `
        <h2 class="fw-bold mb-3 border-bottom pb-2">${datos.titulo}</h2>
        ${datos.contenido}
    `;

    let htmlOpciones = '';
    datos.opciones.forEach((opcion, index) => {
        htmlOpciones += `
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="quizNivel" id="opcion${index}" value="${index}">
                <label class="form-check-label fs-5" for="opcion${index}">${opcion}</label>
            </div>
        `;
    });

    document.getElementById('contenedorPregunta').innerHTML = `
        <p class="fs-5 fw-medium">${datos.pregunta}</p>
        ${htmlOpciones}
    `;

    const feedback = document.getElementById('feedbackQuiz');
    feedback.classList.add('d-none');
    feedback.className = "mt-3 d-none alert";
    document.getElementById('btnValidar').classList.remove('d-none');
}

function volverAlMapa() {
    document.getElementById('mapaNiveles').classList.remove('d-none');
    document.getElementById('contenedorLeccion').classList.add('d-none');
}

function validarRespuesta() {
    const seleccion = document.querySelector('input[name="quizNivel"]:checked');
    const feedback = document.getElementById('feedbackQuiz');
    
    if (!seleccion) {
        feedback.innerHTML = "Por favor, selecciona una respuesta.";
        feedback.className = "mt-3 alert alert-warning";
        feedback.classList.remove('d-none');
        return;
    }

    const respuestaUsuario = parseInt(seleccion.value);
    const respuestaCorrecta = lecciones[nivelActual].respuestaCorrecta;

    if (respuestaUsuario === respuestaCorrecta) {
        feedback.innerHTML = "<strong>¡Correcto! 🎉</strong> Has demostrado tus conocimientos.";
        feedback.className = "mt-3 alert alert-success";
        feedback.classList.remove('d-none');
        document.getElementById('btnValidar').classList.add('d-none');

        // Desbloquear siguiente nivel si existe
        if (lecciones[nivelActual + 1] && nivelMaximoDesbloqueado <= nivelActual) {
            nivelMaximoDesbloqueado = nivelActual + 1;
            desbloquearNivelEnMapa(nivelMaximoDesbloqueado);
            
            // NUEVO: Guardar en la base de datos
            guardarProgresoBD(nivelMaximoDesbloqueado);
            
            setTimeout(() => {
                alert("¡Has desbloqueado un nuevo nivel!");
                volverAlMapa();
            }, 1500);
        } else {
            setTimeout(() => {
                alert("¡Felicidades! Has completado esta lección.");
                volverAlMapa();
            }, 1500);
        }
    } else {
        feedback.innerHTML = "Respuesta incorrecta. Repasa la información e inténtalo de nuevo.";
        feedback.className = "mt-3 alert alert-danger";
        feedback.classList.remove('d-none');
    }
}

function desbloquearNivelEnMapa(nivel) {
    const card = document.getElementById(`card-nivel-${nivel}`);
    const badge = document.getElementById(`badge-nivel-${nivel}`);
    
    if (card && badge) {
        card.classList.remove('opaco');
        card.querySelector('h3').classList.remove('text-secondary');
        card.querySelector('h3').classList.add('text-primary');
        
        badge.classList.remove('bg-secondary');
        badge.classList.add('bg-success');
        badge.innerHTML = "Desbloqueado";
    }
}

// Función AJAX para comunicarse con PHP
function guardarProgresoBD(nuevoNivel) {
    fetch('../php/guardar_progreso.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ nivel: nuevoNivel })
    })
    .then(response => response.json())
    .then(data => {
        if(data.status !== 'success') {
            console.error("No se pudo guardar el progreso en la BD.");
        }
    })
    .catch(error => console.error('Error de conexión:', error));
}