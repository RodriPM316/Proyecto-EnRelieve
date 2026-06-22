const lecciones = {
    1: {
        titulo: "El Alfabeto Braille (Grado 1)",
        contenido: `
            <p class="fs-5 justificado">El Braille de <strong>Grado 1</strong> es la forma literal del sistema, donde cada celda representa exactamente una letra del alfabeto, un número o un signo de puntuación. Es la base para cualquier persona que inicie en el mundo de la lectoescritura táctil.</p>
            
            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4 mb-2" style="max-width: 700px;">
                <video controls>
                    <source src="../video/Alfabeto_Braille.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>
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
            }
        ]
    },
    2: {
        titulo: "La Magia de la Numeración",
        contenido: `
            <p class="fs-5 justificado">En Braille, no existen símbolos únicos para los números. Para representarlos, utilizamos las primeras 10 letras del alfabeto (de la 'a' a la 'j') y las antecedemos con un símbolo especial llamado <strong>prefijo numérico</strong> (puntos 3, 4, 5, 6).</p>
            
            <div class="ratio ratio-16x9 rounded shadow-sm mx-auto overflow-hidden mt-4 mb-2" style="max-width: 700px;">
                <video controls>
                    <source src="../video/Numerico_Braille.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
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
            }
        ]
    },
    3: {
        titulo: "Braille Estenográfico (Grado 2)",
        contenido: `
            <p class="fs-5 justificado">A diferencia del Grado 1, el <strong>Grado 2</strong> utiliza contracciones. Esto significa que un solo símbolo puede representar palabras comunes completas (como "que", "con", "de", "el"). Esto acelera la lectura y ahorra espacio en los libros impresos en relieve.</p>
        `,
        preguntas: [
            {
                texto: "1. ¿Cuál es el principal beneficio del Braille de Grado 2?",
                opciones: [
                    "Permitir la lectura en otros idiomas.",
                    "Ahorrar espacio y acelerar la lectura mediante contracciones.",
                    "Hacer los puntos más grandes para mayor sensibilidad."
                ],
                respuestaCorrecta: 1
            }
        ]
    },
    4: {
        titulo: "Reglas de Contracción (Grado 2)",
        contenido: `
            <p class="fs-5 justificado">La estenografía tiene reglas estrictas para evitar confusiones al leer. Dos de las reglas más importantes extraídas de la normativa oficial son:</p>
            <ul class="fs-5 justificado text-dark mb-4">
                <li class="mb-2"><strong>Acentos:</strong> Las letras que llevan acento ortográfico no formarán contracciones.</li>
                <li><strong>Prioridad:</strong> Cuando una letra pueda ser contraída con la anterior o la posterior, indistintamente, se contraerá siempre con la posterior.</li>
            </ul>
        `,
        preguntas: [
            {
                texto: "1. Si una palabra tiene una letra con acento ortográfico (como la 'á' en 'más'), ¿qué ocurre en el Grado 2?",
                opciones: [
                    "Se crea una contracción especial para acentos.",
                    "Esa letra no formará contracción.",
                    "Se elimina el acento para ahorrar espacio."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "2. Si una letra puede contraerse con la que está a su izquierda o a su derecha, ¿qué regla se aplica?",
                opciones: [
                    "Se contrae siempre con la letra anterior.",
                    "Se contrae siempre con la letra posterior (la de su derecha).",
                    "El traductor elige aleatoriamente."
                ],
                respuestaCorrecta: 1
            },
            {
                texto: "3. Aplicando la regla de los acentos, si traducimos la palabra 'canción', ¿la 'ó' podría contraerse con la 'n' final?",
                opciones: [
                    "No, porque la 'ó' lleva acento ortográfico y se rompe la contracción.",
                    "Sí, porque están al final de la palabra.",
                    "Sí, el acento no afecta las contracciones finales."
                ],
                respuestaCorrecta: 0
            },
            {
                texto: "4. ¿Cuál es el propósito principal de estas reglas estrictas de contracción?",
                opciones: [
                    "Hacer que el sistema Braille se vea más estético.",
                    "Garantizar que la lectura táctil sea clara y evitar ambigüedades.",
                    "Aumentar la dificultad del aprendizaje del Braille."
                ],
                respuestaCorrecta: 1
            }
        ]
    },
    5: {
        titulo: "El Interruptor Estenográfico",
        contenido: `
            <p class="fs-5 justificado">Existe un signo llamado <strong>interruptor estenográfico</strong> que le indica al lector que la palabra a continuación no está contraída y debe leerse de forma integral (Grado 1).</p>
            <p class="fs-5 justificado">Se utiliza obligatoriamente delante de las conjunciones 'e' y 'u'. ¿El motivo? Evitar confusiones catastróficas de lectura, ya que sin el interruptor podrían confundirse con los vocablos abreviados 'el' y 'un'.</p>
        `,
        preguntas: [
            {
                texto: "1. ¿Cuál es la función exacta del interruptor estenográfico?",
                opciones: [
                    "Avisar que el siguiente párrafo es un título importante.",
                    "Indicar que la siguiente palabra debe leerse letra por letra (Grado 1).",
                    "Separar los números de las letras en una misma línea."
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
                    "Un lector de Braille Grado 2 la leería erróneamente como la palabra 'el'.",
                    "Se leería como un espacio en blanco.",
                    "No pasaría nada, el contexto aclararía el significado."
                ],
                respuestaCorrecta: 0
            },
            {
                texto: "4. Al igual que el prefijo numérico transforma letras en números, el interruptor estenográfico...",
                opciones: [
                    "Transforma números en letras.",
                    "Anula temporalmente las reglas de contracción del Grado 2.",
                    "Cambia el idioma del texto a inglés."
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