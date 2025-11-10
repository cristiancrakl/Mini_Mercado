<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'nombre' => 'required|string|max:255',
                'tipo_documento' => 'required|string|max:50',
                'numero_documento' => 'required|string|max:100|unique:clientes,numero_documento',
                'direccion' => 'nullable|string|max:255',
                'telefono' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255'

            ];
        } elseif (request()->isMethod('put')) {
            return [
                'nombre' => 'required|string|max:255',
                'tipo_documento' => 'required|string|max:50',
                'numero_documento' => 'required|string|max:100|unique:clientes,numero_documento,' . $this->route('cliente')->id,
                'direccion' => 'nullable|string|max:255',
                'telefono' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255'

            ];
        }
        return [];
    }
}
