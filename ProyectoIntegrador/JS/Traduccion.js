const diccionario = {
    "a": "⠁", "b": "⠃", "c": "⠉", "d": "⠙", "e": "⠑", "f": "⠋", "g": "⠛",
    "h": "⠓", "i": "⠊", "j": "⠚", "k": "⠅", "l": "⠇", "m": "⠍", "n": "⠝",
    "ñ": "⠻", "o": "⠕", "p": "⠏", "q": "⠟", "r": "⠗", "s": "⠎", "t": "⠞",
    "u": "⠥", "v": "⠧", "w": "⠺", "x": "⠭", "y": "⠽", "z": "⠵",

    "á": "⠈⠁", "é": "⠈⠑", "í": "⠈⠊", "ó": "⠈⠕", "ú": "⠈⠥",

    "1": "⠼⠁", "2": "⠼⠃", "3": "⠼⠉", "4": "⠼⠙", "5": "⠼⠑",
    "6": "⠼⠋", "7": "⠼⠛", "8": "⠼⠓", "9": "⠼⠊", "0": "⠼⠚",

    ".": "⠲", ",": "⠂", ";": "⠆", ":": "⠒", "?": "⠦", "!": "⠖",
    "¿": "⠢", "¡": "⠮", "\"": "⠐⠦", "'": "⠄", "-": "⠤", "(": "⠶", ")": "⠶",
    " ": " "
};

// Diccionario de palabras comunes para Grado 2 (Estenografía)
// Diccionario de palabras comunes para Grado 2 (Estenografía Española)
const diccionarioGrado2Palabras = {
    // --- Artículos y Preposiciones ---
    "que": "⠟",      // Letra q
    "con": "⠒",      // Puntos 2-5
    "de": "⠙",       // Letra d
    "del": "⠙⠇",     // d + l
    "el": "⠯",       // Puntos 1-2-3-4-6
    "en": "⠔",       // Puntos 3-5
    "la": "⠸",       // Puntos 4-5-6
    "las": "⠸⠎",     // la + s
    "lo": "⠸⠕",     // la + o
    "los": "⠸⠕⠎",   // la + o + s
    "por": "⠏",      // Letra p
    "para": "⠏⠁",    // p + a
    "al": "⠇",       // Letra l
    "un": "⠤",       // Puntos 3-6
    "una": "⠤⠁",     // un + a
    "unos": "⠤⠕⠎",   // un + o + s
    "unas": "⠤⠁⠎",   // un + a + s

    // --- Pronombres, Adverbios y Conjunciones ---
    "como": "⠅",     // Letra k
    "más": "⠍",      // Letra m
    "me": "⠍⠑",     // m + e
    "mi": "⠍⠊",     // m + i
    "pero": "⠏⠗",    // p + r
    "se": "⠎",       // Letra s
    "sin": "⠎⠔",     // s + en (puntos 3-5)
    "sobre": "⠎⠃",   // s + b
    "su": "⠎⠥",     // s + u
    "sus": "⠎⠥⠎",   // s + u + s
    "te": "⠞",       // Letra t
    "tu": "⠞⠥",     // t + u

    // --- Verbos de uso muy frecuente ---
    "es": "⠖",       // Puntos 2-3-5
    "ser": "⠎⠗",     // s + r
    "son": "⠖⠝",     // es + n
    "estar": "⠖⠞⠗"   // es + t + r
};

function Traducir() {
    const textSpanish = document.getElementById('textSpanish');
    const textBraille = document.getElementById('textBraille');
    
    let texto = textSpanish.value.trim().toLowerCase();

    if(!texto){
        alert("No hay nada por traducir");
        return;
    }

    // Identificar qué grado está seleccionado
    const gradoSeleccionado = document.querySelector('input[name="gradoBraille"]:checked').value;

    // Si es Grado 2, aplicamos primero las contracciones de palabras completas
    if (gradoSeleccionado === "2") {
        for (const [palabra, braille] of Object.entries(diccionarioGrado2Palabras)) {
            // \b asegura que solo reemplace la palabra completa y no partes de otra palabra
            // ej: reemplaza "la" pero no la sílaba "la" en "lata"
            const regex = new RegExp(`\\b${palabra}\\b`, 'g');
            texto = texto.replace(regex, braille);
        }
    }

    // Paso final: Traducir letra por letra lo que no fue contraído
    let resultado = "";
    for (let i = 0; i < texto.length; i++) {
        let char = texto[i];
        
        // Si el caracter actual ya es un símbolo Braille (Unicode de Braille: 0x2800 a 0x28FF)
        // significa que ya fue traducido por el Grado 2, así que lo pasamos directo.
        if (char.charCodeAt(0) >= 0x2800 && char.charCodeAt(0) <= 0x28FF) {
            resultado += char;
        } else {
            // De lo contrario, lo buscamos en el diccionario de Grado 1
            resultado += diccionario[char] || char;
        }
    }

    textBraille.value = resultado;
}

// Opcional: Reasigno la función limpiarTextareas aquí para tener todo el JS junto
function limpiarTextareas() {
    document.getElementById("textSpanish").value = "";
    document.getElementById("textBraille").value = "";
}