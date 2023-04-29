<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorium;

class Producto extends Model
{

    static $rules = [
		'nombre' => 'required',
		'precio' => 'required',
		'img' => 'required',
		'id_categoria' => 'required',
    ];

    protected $table = 'producto';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','precio','img','id_categoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function categoria(){
        return $this->hasOne(Categorium::class,'id','id_categoria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesPedidos()
    {
        return $this->hasMany('App\Models\DetallesPedido', 'id_producto', 'id');
    }


}
