const lecciones = {
    1: {
        titulo: "El Alfabeto Braille (Grado 1)",
        contenido: `
            <p class="fs-5 justificado">El Braille de <strong>Grado 1</strong> es la forma literal del sistema, donde cada celda o "cajetín" representa exactamente una letra del alfabeto, un número o un signo de puntuación. Es la base fundamental para cualquier persona que inicie en el mundo de la lectoescritura táctil.</p>
            <p class="fs-5 justificado">El cajetín generador está formado por <strong>6 puntos</strong> distribuidos en dos columnas de tres puntos cada una. Al numerarlos, la columna izquierda contiene los puntos 1, 2 y 3 (de arriba hacia abajo), y la columna derecha los puntos 4, 5 y 6. Combinando estos puntos en relieve, se pueden crear hasta 64 caracteres distintos, suficientes para representar todo el alfabeto.</p>
            
            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4 mb-2" style="max-width: 700px;">
                <iframe src="https://www.youtube.com/embed/XRst-zhKaK0?si=IdFf7hWtmnoRur8V" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <p class="text-center text-muted small mb-4">Créditos del material: <a href="https://www.youtube.com/embed/XRst-zhKaK0?si=IdFf7hWtmnoRur8V" target="_blank">YouTube</a></p>
        `,
        preguntas: [
            {
                texto: "1. ¿Qué representa principalmente el Braille de Grado 1?",
                opciones: [
                    "Contracciones de palabras completas.",
                    "Una traducción literal letra por letra del alfabeto.",
                    "Un sistema para matemáticas complejas."
                ],
                respuestaCorrecta: 1 
            },
            {
                texto: "2. ¿Cuántos puntos componen el cajetín generador básico del Braille?",
                opciones: [
                    "4 puntos",
                    "6 puntos",
                    "8 puntos"
                ],
                respuestaCorrecta: 1 
            },
            {
                texto: "3. ¿Cómo están distribuidos los puntos en un cajetín Braille estándar?",
                opciones: [
                    "En una sola línea horizontal.",
                    "En dos columnas de tres puntos cada una.",
                    "En un círculo de seis puntos."
                ],
                respuestaCorrecta: 1 
            },
            {
                texto: "4. ¿Cuántas combinaciones diferentes permite crear el cajetín de 6 puntos?",
                opciones: [
                    "Hasta 27 combinaciones.",
                    "Hasta 64 combinaciones.",
                    "Infinitas combinaciones."
                ],
                respuestaCorrecta: 1 
            }
        ]
    },
    2: {
        titulo: "La Magia de la Numeración",
        contenido: `
            <p class="fs-5 justificado">Una de las genialidades del sistema ideado por Louis Braille es su eficiencia. En lugar de inventar símbolos completamente nuevos para los números, el Braille recicla las primeras 10 letras del alfabeto (de la 'a' a la 'j').</p>
            <p class="fs-5 justificado">Para indicar que estas letras deben leerse como números, se utiliza un símbolo especial llamado <strong>prefijo numérico</strong>, formado por los puntos 3, 4, 5 y 6. Cuando este prefijo aparece, todas las letras de la 'a' a la 'j' que le sigan directamente (sin espacios) se convierten en números automáticamente (la 'a' es 1, la 'b' es 2, y la 'j' es 0).</p>
            
            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4 mb-2" style="max-width: 700px;">
                <iframe src="https://www.youtube.com/embed/_hBtBg94Rf0?si=fVtxhpKNy1F0twMo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        `,
        preguntas: [
            {
                texto: "1. ¿Cómo se forman los números en el sistema Braille?",
                opciones: [
                    "Usando símbolos completamente nuevos.",
                    "Sumando los puntos de dos letras juntas.",
                    "Usando las letras de la 'A' a la 'J' precedidas por un prefijo numérico."
                ],
                respuestaCorrecta: 2 
            },
            {
                texto: "2. ¿Qué puntos conforman el prefijo numérico?",
                opciones: [
                    "Puntos 1, 2, 3, 4",
                    "Puntos 3, 4, 5, 6",
                    "Puntos 2, 4, 6"
                ],
                respuestaCorrecta: 1 
            },
            {
                texto: "3. ¿Qué letra del alfabeto se utiliza para representar el número 0?",
                opciones: [
                    "La letra 'a'.",
                    "La letra 'z'.",
                    "La letra 'j'."
                ],
                respuestaCorrecta: 2 
            },
            {
                texto: "4. ¿Hasta cuándo se mantiene el efecto del prefijo numérico?",
                opciones: [
                    "Hasta que aparece un espacio u otro signo no numérico.",
                    "Hasta que termina la página.",
                    "Solo afecta a un solo dígito a la vez."
                ],
                respuestaCorrecta: 0 
            }
        ]
    },
    3: {
        titulo: "Braille Estenográfico (Grado 2)",
        contenido: `
            <p class="fs-5 justificado">El <strong>Grado 2</strong>, también conocido como Braille Estenográfico, surge de una necesidad física: los libros impresos en Braille ocupan un volumen inmenso. Un libro de texto normal puede requerir múltiples tomos pesados si se imprime en Grado 1.</p>
            <p class="fs-5 justificado">Para solucionar esto, la estenografía utiliza <strong>contracciones</strong>. Esto significa que un solo símbolo o una combinación corta puede representar palabras de uso muy frecuente (como "que", "con", "de", "el", "la"), así como prefijos o sufijos (como "ción", "mente"). Al aplicar estas reglas, se logra reducir drásticamente el espacio que ocupa el texto y, además, permite a los usuarios avanzados leer con mucha mayor fluidez y velocidad.</p>
            
            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4 mb-2" style="max-width: 700px;">
                <iframe src="https://www.youtube.com/embed/I4BU_237NRs?si=tuHDnWnttTROxrlp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        `,
        preguntas: [
            {
                texto: "1. ¿Cuál es el principal beneficio del Braille de Grado 2?",
                opciones: [
                    "Permitir la lectura en otros idiomas simultáneamente.",
                    "Ahorrar espacio en el papel y acelerar la lectura táctil.",
                    "Hacer los puntos más grandes para personas con menor sensibilidad táctil."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "2. ¿Qué es exactamente una 'contracción' en este contexto?",
                opciones: [
                    "Un símbolo que representa una palabra completa, prefijo o sufijo.",
                    "Un error de impresión que junta dos letras.",
                    "Un método para saltarse las vocales de todas las palabras."
                ],
                respuestaCorrecta: 0
            },
            {
                texto: "3. ¿Por qué es fundamental la estenografía en la publicación de libros en Braille?",
                opciones: [
                    "Porque las impresoras Braille no pueden imprimir todas las letras del Grado 1.",
                    "Porque reduce significativamente el volumen físico y la cantidad de papel requerido.",
                    "Porque el Grado 1 está en desuso y ya no se enseña."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "4. Al aprender Grado 2, ¿se elimina por completo el uso del Grado 1?",
                opciones: [
                    "No, el Grado 1 sigue siendo la base para las palabras que no tienen contracción.",
                    "Sí, el Grado 2 reemplaza absolutamente todo el alfabeto original.",
                    "Solo se usa Grado 1 para escribir números, el resto es Grado 2."
                ],
                respuestaCorrecta: 0
            }
        ]
    },
    4: {
        titulo: "Reglas de Contracción (Grado 2)",
        contenido: `
            <p class="fs-5 justificado">La estenografía no es aleatoria; tiene normas ortográficas estrictas creadas para evitar confusiones severas al leer con el tacto. Dos de las reglas más importantes extraídas de la normativa oficial de estenografía española son las siguientes:</p>
            <ul class="fs-5 justificado text-dark mb-4">
                <li class="mb-3"><strong>Acentos ortográficos:</strong> Las letras que llevan acento ortográfico o tilde (á, é, í, ó, ú) pierden su capacidad de formar contracciones. Esto se debe a que la vocal acentuada tiene una representación en Braille totalmente distinta a la vocal normal, lo que rompe la estructura del símbolo contraído.</li>
                <li class="mb-2"><strong>Prioridad de contracción:</strong> En ocasiones, una misma letra en medio de una palabra podría formar una contracción con la letra que está a su izquierda o con la que está a su derecha. La norma dicta que, ante esta ambigüedad, la letra se contraerá siempre con la <em>posterior</em> (la de su derecha).</li>
            </ul>

            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4 mb-2" style="max-width: 700px;">
                <iframe src="https://www.youtube.com/embed/P8R4hxOwRE4?si=aM21Kel-aPeVOGoN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        `,
        preguntas: [
            {
                texto: "1. Si una palabra tiene una letra con acento ortográfico (como la 'á' en 'más'), ¿qué ocurre en el Grado 2?",
                opciones: [
                    "Se crea una contracción especial exclusivamente para acentos.",
                    "Esa letra pierde su capacidad de formar una contracción.",
                    "Se elimina el acento ortográfico para ahorrar espacio."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "2. Si una letra puede contraerse con la que está a su izquierda o a su derecha, ¿qué regla se aplica?",
                opciones: [
                    "Se contrae siempre con la letra anterior (izquierda).",
                    "Se contrae siempre con la letra posterior (derecha).",
                    "Queda a criterio personal del traductor."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "3. Aplicando la regla de los acentos, si traducimos la palabra 'canción', ¿la 'ó' podría contraerse con la 'n' final?",
                opciones: [
                    "No, porque la 'ó' lleva tilde y rompe la posible contracción.",
                    "Sí, porque están al final de la palabra y tienen prioridad.",
                    "Sí, el acento no interfiere con los sufijos."
                ],
                respuestaCorrecta: 0
            },
            {
                texto: "4. ¿Cuál es el propósito principal de implementar estas reglas estrictas en las contracciones?",
                opciones: [
                    "Hacer que el sistema Braille luzca más profesional al imprimirse.",
                    "Garantizar que la decodificación táctil sea exacta y evitar ambigüedades de significado.",
                    "Aumentar la dificultad técnica del aprendizaje del Braille."
                ],
                respuestaCorrecta: 1
            }
        ]
    },
    5: {
        titulo: "El Interruptor Estenográfico",
        contenido: `
            <p class="fs-5 justificado">A pesar de las reglas ortográficas, hay símbolos que por sí solos pueden generar ambigüedades graves. Para resolverlo, el Braille cuenta con un signo de control esencial llamado <strong>interruptor estenográfico</strong>.</p>
            <p class="fs-5 justificado">Este símbolo especial funciona como una advertencia para el lector. Le indica que la palabra, letra o signo que se encuentra inmediatamente después no forma parte de ninguna contracción y debe interpretarse de manera integral (como en el Grado 1).</p>
            <p class="fs-5 justificado">Su uso es <em>obligatorio</em> delante de las conjunciones aisladas 'e' y 'u'. ¿El motivo? En estenografía, si la letra 'e' se encuentra sola, representa la contracción de la palabra "el"; y si la letra 'u' está sola, representa "un". Sin el interruptor, la frase "Juan e Ignacio" se leería táctilmente como "Juan el Ignacio", cambiando totalmente el sentido del texto.</p>
        `,
        preguntas: [
            {
                texto: "1. ¿Cuál es la función exacta del interruptor estenográfico?",
                opciones: [
                    "Avisar que el siguiente párrafo es un título o resaltado importante.",
                    "Indicar que la siguiente palabra no tiene contracción y debe leerse integralmente.",
                    "Separar bloques de texto que contienen números y letras."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "2. ¿Delante de qué letras aisladas se usa obligatoriamente este interruptor?",
                opciones: [
                    "Las conjunciones 'y' / 'o'.",
                    "Las conjunciones 'e' / 'u'.",
                    "Las preposiciones 'a' / 'de'."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "3. ¿Qué sucedería si escribes la conjunción 'e' aislada sin utilizar el interruptor estenográfico?",
                opciones: [
                    "Un lector de Grado 2 la decodificaría erróneamente como la palabra 'el'.",
                    "Se leería como un simple espacio en blanco extendido.",
                    "No pasaría nada, el lector lo deduce por el contexto."
                ],
                respuestaCorrecta: 0
            },
            {
                texto: "4. Al igual que el prefijo numérico transforma letras en números, el interruptor estenográfico...",
                opciones: [
                    "Transforma números en letras del alfabeto.",
                    "Anula temporalmente las reglas de contracción estenográfica.",
                    "Cambia la puntuación de la línea en la que se encuentra."
                ],
                respuestaCorrecta: 1
            }
        ]
    }
};

let nivelActual = 1;
// Lee la variable inyectada desde PHP, si no existe, por defecto es 1
let nivelMaximoDesbloqueado = typeof nivelGuardadoUsuario !== 'undefined' ? nivelGuardadoUsuario : 1;

// Al cargar la página, desbloquea visualmente los niveles
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

    // Generar las preguntas dinámicamente
    let htmlCuestionario = '';
    datos.preguntas.forEach((preguntaObj, qIndex) => {
        let htmlOpciones = '';
        preguntaObj.opciones.forEach((opcion, oIndex) => {
            htmlOpciones += `
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="pregunta_${qIndex}" id="p${qIndex}_o${oIndex}" value="${oIndex}">
                    <label class="form-check-label fs-5" for="p${qIndex}_o${oIndex}">${opcion}</label>
                </div>
            `;
        });

        htmlCuestionario += `
            <div class="mb-4">
                <p class="fs-5 fw-medium text-dark">${preguntaObj.texto}</p>
                ${htmlOpciones}
            </div>
        `;
    });

    document.getElementById('contenedorPregunta').innerHTML = htmlCuestionario;

    const feedback = document.getElementById('feedbackQuiz');
    feedback.classList.add('d-none');
    document.getElementById('btnValidar').classList.remove('d-none');
}

function volverAlMapa() {
    document.getElementById('mapaNiveles').classList.remove('d-none');
    document.getElementById('contenedorLeccion').classList.add('d-none');
    
    // Pausar videos de YouTube (o locales) si el usuario se regresa
    const iframes = document.querySelectorAll('#contenidoLeccion iframe');
    iframes.forEach(iframe => {
        const src = iframe.src;
        iframe.src = src; 
    });
    
    const videos = document.querySelectorAll('#contenidoLeccion video');
    videos.forEach(video => {
        video.pause();
    });
}

function validarRespuesta() {
    const datos = lecciones[nivelActual];
    const feedback = document.getElementById('feedbackQuiz');
    
    let preguntasRespondidas = 0;
    let respuestasCorrectas = 0;

    // Evaluamos todas las preguntas del nivel actual
    datos.preguntas.forEach((preguntaObj, qIndex) => {
        const seleccion = document.querySelector(`input[name="pregunta_${qIndex}"]:checked`);
        if (seleccion) {
            preguntasRespondidas++;
            if (parseInt(seleccion.value) === preguntaObj.respuestaCorrecta) {
                respuestasCorrectas++;
            }
        }
    });

    // Validar que no deje preguntas en blanco
    if (preguntasRespondidas < datos.preguntas.length) {
        feedback.innerHTML = "Por favor, responde todas las preguntas antes de continuar.";
        feedback.className = "mt-3 alert alert-warning";
        feedback.classList.remove('d-none');
        return;
    }

    // Validar si tiene 100% de aciertos
    if (respuestasCorrectas === datos.preguntas.length) {
        feedback.innerHTML = "<strong>¡Excelente! 🎉</strong> Tienes un puntaje perfecto.";
        feedback.className = "mt-3 alert alert-success";
        feedback.classList.remove('d-none');
        document.getElementById('btnValidar').classList.add('d-none');

        if (lecciones[nivelActual + 1] && nivelMaximoDesbloqueado <= nivelActual) {
            nivelMaximoDesbloqueado = nivelActual + 1;
            desbloquearNivelEnMapa(nivelMaximoDesbloqueado);
            guardarProgresoBD(nivelMaximoDesbloqueado);
            
            setTimeout(() => {
                alert("¡Has desbloqueado un nuevo nivel!");
                volverAlMapa();
            }, 1500);
        } else {
            setTimeout(() => {
                alert("¡Felicidades! Has completado esta sección.");
                volverAlMapa();
            }, 1500);
        }
    } else {
        feedback.innerHTML = `Obtuviste ${respuestasCorrectas} de ${datos.preguntas.length} respuestas correctas. Repasa la información e inténtalo de nuevo.`;
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

function guardarProgresoBD(nuevoNivel) {
    fetch('../php/guardar_progreso.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ nivel: nuevoNivel })
    })
    .then(response => response.json())
    .then(data => {
        if(data.status !== 'success') console.error("Error al guardar en BD.");
    })
    .catch(error => console.error('Error de conexión:', error));
}