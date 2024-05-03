<?php
require_once 'vendor/autoload.php'; // Asegúrate de que la ruta es correcta

// Configurar MercadoPago SDK
MercadoPago\SDK::setAccessToken('TEST-8805415290379891-050204-f810561bc055f6fe852be5c02104ab00-1793308393'); // Usa tu nuevo token de acceso de sandbox

// Crear objeto de preferencia
$preference = new MercadoPago\Preference();

// Configurar producto o servicio
$item = new MercadoPago\Item();
$item->title = 'Consulta Legal'; // Nombre del servicio o producto
$item->quantity = 1;
$item->unit_price = 100.00; // Cambia `100.00` al costo del servicio

// Añadir item a la preferencia
$preference->items = array($item);

// Otras configuraciones pueden incluirse aquí (por ejemplo, configuraciones de envío, información adicional, etc.)

// Guardar la preferencia
$preference->save();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Horas para Estudio de Abogados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f8f8f8;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004494;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reserva de Consultas - Estudio de Abogados</h1>
        <form action="reservas.php" method="POST" id="reservationForm">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required pattern="^\d{9}$" title="Ingrese un teléfono válido de 9 dígitos sin espacios.">

            <label for="motivoConsulta">Motivo de Consulta:</label>
            <input type="text" id="motivoConsulta" name="motivoConsulta" required>

            <label for="fechaReserva">Fecha y Hora de la Reserva:</label>
            <input type="datetime-local" id="fechaReserva" name="fechaReserva" required>

            <input type="submit" value="Reservar">
        </form>
        <h2>Horarios Disponibles/Reservados</h2>
        <table id="scheduleTable">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los datos se cargarán aquí mediante JavaScript -->
            </tbody>
        </table>

        <!-- Mercado Pago Checkout Button -->
        <script src="https://www.mercadopago.cl/integrations/v1/web-payment-checkout.js"
            data-preference-id="<?php echo $preference->id; ?>" data-source="button">
        </script>
    </div>

    <script src="validate.js"></script>
</body>
</html>
