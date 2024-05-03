<?php
// Establecer los parámetros esperados desde Mercado Pago
$nombre = $_GET['nombre'] ?? 'Cliente';  // Usar operador de fusión null para manejar la ausencia de datos
$fecha = $_GET['fecha'] ?? 'una fecha pendiente';
$status = $_GET['status'] ?? 'pendiente';  // Asumimos 'pendiente' como estado predeterminado

// Redirigir si no se accede con los parámetros mínimos
if (empty($nombre) || empty($fecha)) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Reserva</title>
</head>
<body>
    <h1>Reserva Confirmada</h1>
    <p>Gracias, <?php echo htmlspecialchars($nombre); ?>, tu reserva para el <?php echo htmlspecialchars($fecha); ?> ha sido confirmada.</p>
    
    <?php if ($status === 'approved'): ?>
        <p>Tu pago ha sido procesado exitosamente.</p>
        <p><a href="envio_chilexpress.php">Proceder al envío</a></p> <!-- Enlace al proceso de envío con Chilexpress -->
    <?php else: ?>
        <p>Estado del pago: <?php echo htmlspecialchars($status); ?>.</p>
        <p>Por favor, revisa el estado de tu pago o contacta con soporte si necesitas ayuda.</p>
    <?php endif; ?>

    <p><a href="index.html">Hacer otra reserva</a></p>
</body>
</html>
