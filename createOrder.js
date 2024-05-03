// Antes: import mercadopago from 'mercadopago';
const mercadopago = require('mercadopago');

// Anteriormente: export const createOrder = (req, res) => {
exports.createOrder = (req, res) => {
    const client = mercadopago.configure({
        access_token: 'TEST-8805415290379891-050204-f810561bc055f6fe852be5c02104ab00-1793308393'
    });

    const preference = {
        items: [
            {
                id: '10001',
                title: 'Producto a vender',
                quantity: 1,
                unit_price: 10000
            }
        ]
    };

    client.preferences.create(preference)
        .then(response => {
            console.log(response);
            res.send("Orden creada con éxito.");
        })
        .catch(error => {
            console.log(error);
            res.status(500).send("Error creando la orden");
        });
};
