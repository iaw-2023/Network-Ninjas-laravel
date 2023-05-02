<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetallesPedidoResource extends JsonResource
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
            'precio_total'=> $this->precio_total,
            'cantidad'=> $this->cantidad,
            'id_pedido'=> $this->id_pedido,
            'id_producto'=> $this->id_producto
        ];
    }
}
