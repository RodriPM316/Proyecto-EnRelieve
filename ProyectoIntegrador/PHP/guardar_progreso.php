<?php
session_start();
include 'conexion.php';

// Verificamos que el usuario esté logueado
if (!isset($_SESSION['usuario'])) {
    echo json_encode(['status' => 'error', 'message' => 'No autorizado']);
    exit;
}

// Obtenemos los datos enviados por JavaScript (Fetch API)
$data = json_decode(file_get_contents("php://input"), true);
$nuevoNivel = isset($data['nivel']) ? (int)$data['nivel'] : 1;

$con = conectar();

try {
    // Actualizamos el nivel en la base de datos
    $stmt = $con->prepare("UPDATE usuarios SET nivel_leccion = ? WHERE Usuario = ?");
    $stmt->bind_param("is", $nuevoNivel, $_SESSION['usuario']);
    
    if ($stmt->execute()) {
        // Actualizamos también la sesión actual
        $_SESSION['nivel_leccion'] = $nuevoNivel;
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar']);
    }
    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>