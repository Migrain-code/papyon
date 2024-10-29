// Import the Echo instance
import Echo from './echo';

// Listen for the 'order.created' event
Echo.channel('order-channel')
    .listen('.order.created', (e) => {
        console.log("Order created event received", e); // Debug log
        Toast.fire({
            icon: 'info',
            title: 'Yeni siparişiniz var',
        });

        // Gelen veriyi kontrol et
        console.log('gelenveri', e.ordersCount);

    });



