const express = require('express');
const mercadopago = require('mercadopago');
const app = express();

// Configura tu Access Token
mercadopago.configurations.setAccessToken('TEST-8805415290379891-050204-f810561bc055f6fe852be5c02104ab00-1793308393');

// Middleware para parsear el cuerpo de las peticiones JSON
app.use(express.json());

// Ejemplo de ruta GET
app.get('/', (req, res) => {
    res.send('¡Bienvenido a nuestra API REST!');
});

// Ruta para crear una preferencia de pago
app.post('/create_preference', (req, res) => {
    let preference = {
        items: [
            {
                title: 'Consulta Legal',
                quantity: 1,
                currency_id: 'CLP',
                unit_price: parseFloat(req.body.price)
            }
        ]
    };

    mercadopago.preferences.create(preference)
        .then(function(response){
            res.json({ id: response.body.id });
        }).catch(function(error){
            console.log(error);
            res.status(500).send('Error creando la preferencia de pago');
        });
});

// Configuración del servidor para escuchar en el puerto 1088
app.listen(1088, () => {
    console.log('Servidor corriendo en http://localhost:1088');
});
