// Import the Echo instance
import Echo from './echo';

const audio = document.getElementById('success-sound');

// Listen for the 'order.created' event
Echo.channel('order-channel')
    .listen('.order.created', (e) => {
        console.log("Order created event received", e); // Burada veriyi görebilirsiniz
        Toast.fire({
                 icon: 'info',
                 title: 'Yeni siparişiniz var',
             });
        if (e.data) {
            console.log("Received data:", e.data); // Veriyi kontrol et
        }
        audio.play().catch(error => console.log("Playback error:", error));
    });

