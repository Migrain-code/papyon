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
        if (e.data) {
            try {
                // Order verisini kontrol et
                if (e.data) {
                    const orderData = JSON.parse(e.data);

                    // Değerleri al
                    const ordersCount = orderData.ordersCount;
                    const packetCount = orderData.packetCount;
                    const taxiCount = orderData.taxiCount;
                    const valeCount = orderData.valeCount;
                    const waiterCount = orderData.waiterCount;
                    const totalClaims = orderData.totalClaims;

                    // Değerleri uygun div'lere yazdır
                    $('#newClaimCount').text(ordersCount);
                    $('#orderCount').text(ordersCount);
                    $('#packetCount').text(packetCount);
                    $('#taxiCount').text(taxiCount);
                    $('#valeCount').text(valeCount);
                    $('#waiterCount').text(waiterCount);
                    $('#totalClaims').text(totalClaims);

                    // Ses çal
                    audio.play().catch((error) => {
                        console.error("Audio playback failed:", error);
                    });
                } else {
                    console.error("Order verisi tanımsız:", data);
                }
            } catch (error) {
                console.error("JSON ayrıştırma hatası:", error);
            }
        } else {
            console.error("Gelen data tanımsız veya boş:", e);
        }
    });



