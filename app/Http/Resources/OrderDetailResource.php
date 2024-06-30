<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'name' => $this->name,
          'phone' => $this->phone,
          'totalPrice' => formatPrice($this->total),
          'paymentType' => $this->type('name'),
          'created_at' => $this->created_at->format('d.m.Y H:i'),
          'cart' => $this->cart,
        ];
    }
}
