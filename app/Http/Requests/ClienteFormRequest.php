<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nombre' => 'required|max:100',
            'tipo_documento' => 'required|max:50',
            'num_documento' => 'required|max:50',
            'direccion' => 'max:250',
            'telefono' => 'required|max:10',
            'email' => 'required|max:50|email',
        ];
    }
}
