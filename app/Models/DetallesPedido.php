<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

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

    static $rules = [
		'precio_total' => 'required',
		'cantidad' => 'required',
		'id_pedido' => 'required',
        'id_producto' => 'required'
    ];

    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
