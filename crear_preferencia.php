<?php
require_once 'vendor/autoload.php'; // Asegúrate de que la ruta es correcta

// Configurar MercadoPago SDK
MercadoPago\SDK::setAccessToken('TEST-8099561331104291-050204-dcde8f8d6729e7fb2ad51fb7eeffb63f-1793308393'); // Token de prueba

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

// Devolver el ID de la preferencia al cliente
echo json_encode(array("preference_id" => $preference->id));
?>
