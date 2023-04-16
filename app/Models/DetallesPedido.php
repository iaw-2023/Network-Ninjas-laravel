<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesPedido extends Model
{
    use HasFactory;

    protected $table = 'detalles_pedido';

    protected $fillable = [
        'precio_total',
        'cantidad',
        'id_pedido',
        'id_producto'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
