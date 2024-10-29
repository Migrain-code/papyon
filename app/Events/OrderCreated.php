<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $orderData;
    public function __construct($orderData)
    {
        $this->orderData = $orderData; // Örneğin sipariş verilerini buraya ekleyin
    }

    public function broadcastWith()
    {
        return [
            'order' => json_encode($this->orderData), // Burada sipariş verilerini döndürün
        ];
    }
    public function broadcastOn()
    {
        return new Channel('order-channel');
    }

    public function broadcastAs()
    {
        return 'order.created';
    }
}
