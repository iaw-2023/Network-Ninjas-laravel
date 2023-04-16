<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $fillable = [
        'nombre',
        'precio',
        'img',
        'id_categoria'
    ];

    public function detallepedidos(){
        return $this->hasMany(DetallesPedido::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
