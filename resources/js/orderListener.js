// Import the Echo instance
import Echo from './echo';

const audio = document.getElementById('success-sound');
Echo.channel('order-channel')
    .listen('.order.created', (e) => {

        Toast.fire({
            icon: 'info',
            title: 'Yeni siparişiniz var',
        });

        // Gelen veriyi kontrol et
        const orderData = e;

        const ordersCount = orderData.ordersCount;
        const packetCount = orderData.packetCount;
        const taxiCount = orderData.taxiCount;
        const valeCount = orderData.valeCount;
        const waiterCount = orderData.waiterCount;
        const totalClaims = orderData.totalClaims;
        // Değerleri uygun div'lere yazdır
        document.getElementById('newClaimCount').textContent = ordersCount;
        document.getElementById('orderCount').textContent = ordersCount;
        document.getElementById('packetCount').textContent = packetCount;
        document.getElementById('taxiCount').textContent = taxiCount;
        document.getElementById('valeCount').textContent = valeCount;
        document.getElementById('waiterCount').textContent = waiterCount;
        //document.getElementById('totalClaims').textContent = totalClaims;



        // Ses çal
        audio.play().catch((error) => {
            console.error("Audio playback failed. User interaction might be required:", error);
        });
        $('#datatable').DataTable().ajax.reload();
    });



