<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetallesPedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'precio_total'=> 'required|integer',
            'cantidad'=> 'required|numeric|min:1',
            'id_pedido'=> 'required|exists:pedido,id_pedido',
            'id_producto'=> 'required|exists:producto,id_pedido'
        ];
    }


}
