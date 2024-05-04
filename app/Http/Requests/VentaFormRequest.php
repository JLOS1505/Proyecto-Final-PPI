<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'id_cliente'=>'required',
            'tipo_documento'=>'required|max:20',
            'num_documento'=>'max:7',
            'id_producto'=>'required',
            'cantidad'=>'required',
            'precio_venta'=>'required'
        ];
    }
}
