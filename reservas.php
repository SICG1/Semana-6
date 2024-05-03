<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db.php';  // Cambiado a require para asegurar que el archivo es cargado

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $telefono = preg_match('/^\d{9}$/', $_POST['telefono'] ?? '') ? $_POST['telefono'] : null;
    $motivoConsulta = trim($_POST['motivoConsulta'] ?? '');
    $fechaReserva = trim($_POST['fechaReserva'] ?? '');

    if (empty($nombre) || !$email || !$telefono || empty($motivoConsulta) || empty($fechaReserva)) {
        $error = "Todos los campos son obligatorios y deben ser válidos.";
        // Considera guardar el error en sesión para mostrarlo en el formulario
        header("Location: index.html?error=" . urlencode($error));
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO reservas (nombre, email, telefono, motivoConsulta, fechaReserva) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $email, $telefono, $motivoConsulta, $fechaReserva]);

        // Redirigir a la página de confirmación con parámetros seguros
        header("Location: confirmacion.php?nombre=" . urlencode($nombre) . "&fecha=" . urlencode($fechaReserva));
        exit;
    } catch (PDOException $e) {
        error_log("Error de base de datos: " . $e->getMessage());  // Log del error sin mostrar al usuario
        header("Location: error.html");  // Página de error genérica
        exit;
    }
} else {
    // Método no soportado
    http_response_code(405);
    echo "Método de solicitud no soportado.";
}
?>
