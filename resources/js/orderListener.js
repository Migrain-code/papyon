// Import the Echo instance
import Echo from './echo';

const audio = document.getElementById('success-sound');

// Listen for the 'order.created' event
Echo.channel('order-channel')
    .listen('order.created', (e) => {
        console.log("Order created event received", e); // Debug log
        alert("Order created event received!"); // For testing
        audio.play().catch(error => console.log("Playback error:", error));
    });
