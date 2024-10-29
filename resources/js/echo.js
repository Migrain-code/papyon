// Import Laravel Echo and Pusher
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'f932f26680392302e999', // Use your Pusher key
    cluster: 'eu', // Use your Pusher cluster
    forceTLS: true
});

export default window.Echo;
