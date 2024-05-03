// server.js
const express = require('express');
const morgan = require('morgan');
const swaggerUi = require('swagger-ui-express');
const swaggerDocument = require('./swagger.json');
const mercadopago = require('mercadopago');

// Configura el Access Token de MercadoPago
mercadopago.configurations.setAccessToken('TEST-8805415290379891-050204-f810561bc055f6fe852be5c02104ab00-1793308393');

const app = express();
const port = 3000;

// Middleware para parsear JSON y registrar solicitudes HTTP
app.use(express.json());
app.use(morgan('combined'));

// Swagger UI setup para documentar la API
app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerDocument));

// Endpoint de bienvenida
app.get('/', (req, res) => {
    res.send('¡Bienvenido a nuestra API REST!');
});

// Endpoint para obtener horarios (ejemplo)
app.get('/horarios', (req, res) => {
    res.json([{ fecha: "2024-04-20", hora: "09:00", estado: "reservado" }]);
});

// Endpoint para crear una preferencia de pago en MercadoPago
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
        .then(response => {
            res.json({ id: response.body.id });
        }).catch(error => {
            console.log(error);
            res.status(500).send('Error creando la preferencia de pago');
        });
});

// Iniciar el servidor en el puerto configurado
app.listen(port, () => {
    console.log(`Servidor ejecutándose en http://localhost:${3000}`);
});
