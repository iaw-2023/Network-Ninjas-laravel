<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre'=> $this->nombre,
            'precio'=> $this->precio,
            'img'=> $this->img,
            'id_categoria'=> $this->id_categoria
        ];
    }
}
