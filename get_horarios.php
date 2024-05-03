<?php
include 'db.php';  // Incluye tu script de conexión a la base de datos

// Recuperar todas las reservas de la base de datos
$stmt = $pdo->query("SELECT fechaReserva AS fecha, nombre AS cliente, estado FROM reservas");
$horarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($horarios);
?>
