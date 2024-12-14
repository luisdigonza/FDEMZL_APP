//start product_details page -> increase, decrease items 
var increaseBtn = document.getElementsByClassName('btn-increase');
var decreaseBtn = document.getElementsByClassName('btn-decrease');
var itemsToBuy = document.getElementById('num_of_items');

function increaseValueBtn(){
    var numero = Number(itemsToBuy.value)+1;
    itemsToBuy.value = numero;
}
function decreaseValueBtn(){
    var numero = Number(itemsToBuy.value)-1;
    numero = numero < 0 ? 0 : numero;
    itemsToBuy.value = numero;
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.cotizarBtn').forEach(button => {
        button.addEventListener('click', function() {
            console.log("Botón clickeado"); // Depuración

            // Verificar si 'data-product' existe
            const productName = this.hasAttribute('data-product') 
                ? this.getAttribute('data-product') 
                : null;

            console.log("Producto:", productName); // Depuración

            // Construir el mensaje de WhatsApp
            const whatsappNumber = '573205366483'; // Número de WhatsApp
            const message = productName 
                ? `Hola, estoy interesado en el producto '${productName}'. ¿Me podrías dar más información?`
                : "Hola, estoy interesado en conocer más sobre sus productos y servicios. ¿Me pueden ayudar?";

            const encodedMessage = encodeURIComponent(message);
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

            // Redirigir a WhatsApp
            window.open(whatsappURL, '_blank');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('sendToWhatsApp').forEach(button =>{
        button.addEventListener('click', function() {
            // Obtener los valores del formulario
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            // Validar campos vacíos
            if (!name || !email || !message) {
                alert('Por favor, completa todos los campos antes de enviar.');
                return;
            }

            // Validar formato del correo
            const emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
            if (!emailRegex.test(email)) {
                alert('Por favor, ingresa un correo electrónico válido.');
                return;
            }

            // Construir el mensaje de WhatsApp
            const whatsappNumber = '573205366483'; // Número de WhatsApp
            const whatsappMessage = `
                Hola, mi nombre es ${name}.
                Mi correo electrónico es ${email}.
                Mensaje: ${message}.
            `;
            const encodedMessage = encodeURIComponent(whatsappMessage.trim());
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

            // Redirigir a WhatsApp
            window.open(whatsappURL, '_blank');
        });
    });
});


//end product_details page -> increase, decrease items 
