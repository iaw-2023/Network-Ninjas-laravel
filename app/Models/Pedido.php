<?php

namespace App\Models;

use App\Models\DetallesPedido;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    static $rules = [
		'fecha_pedido' => 'required',
		'precio' => 'required',
		'id_cliente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_pedido','precio','id_cliente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallespedidos()
    {
        return $this->hasMany('App\Models\DetallesPedido', 'id_pedido', 'id');
    }


}
