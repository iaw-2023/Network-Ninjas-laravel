<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ModificacionProductosCategoriasClientes {

    public function handle(Request $request, Closure $next){

        $rol = auth()->user()->rol;
        if($rol== 'admin' || $rol=='cargador'){
            return $next($request);
        }
        else {
            return response()->view('noAutorizado');
        }
    }

}
