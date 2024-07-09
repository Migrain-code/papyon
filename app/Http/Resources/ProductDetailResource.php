<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
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
          'description' => $this->description,
          'price' => $this->price,
          'image' => isset($this->image) ? storage($this->image) : null,
          'others' => $this->otherProducts,
          'allergens' => $this->allergens,
        ];
    }
}
