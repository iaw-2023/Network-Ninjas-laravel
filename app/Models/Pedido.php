<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    
    protected $table = 'pedido';

    protected $fillable = [
        'fecha_pedido',
        'precio',
        'id_cliente'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function detallespedidos(){
        return $this->hasMany(DetallesPedido::class);
    }
}
