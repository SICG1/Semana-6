// validate.js
document.addEventListener("DOMContentLoaded", function() {
    const reservationForm = document.getElementById('reservationForm');
    if (reservationForm) {
        reservationForm.addEventListener('submit', function(event) {
            event.preventDefault();

            let isValid = true;
            const formData = {
                nombre: document.getElementById('nombre').value.trim(),
                email: document.getElementById('email').value.trim(),
                telefono: document.getElementById('telefono').value.trim(),
                motivoConsulta: document.getElementById('motivoConsulta').value.trim(),
                fechaReserva: document.getElementById('fechaReserva').value.trim()
            };

            // Validación del nombre
            if (formData.nombre === "") {
                alert("El nombre es obligatorio.");
                isValid = false;
            }

            // Validación del email
            if (!validateEmail(formData.email)) {
                alert("El correo electrónico no es válido.");
                isValid = false;
            }

            // Validación del teléfono
            if (!validatePhone(formData.telefono)) {
                alert("El teléfono debe tener un formato válido.");
                isValid = false;
            }

            // Validación de la fecha
            if (new Date(formData.fechaReserva) < new Date()) {
                alert("La fecha de reserva debe ser en el futuro.");
                isValid = false;
            }

            if (isValid) {
                reservationForm.submit();
            }
        });
    }
});

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^\d{9}$/; // Asumiendo que el formato de teléfono es de 9 dígitos sin espacios ni guiones
    return re.test(phone);
}
