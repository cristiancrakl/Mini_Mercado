<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaRequest extends FormRequest
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
                'cliente_id' => 'required|exists:clientes,id',
                'total' => 'required|numeric|min:0',
                'iva' => 'nullable|numeric|min:0',
                'saldo_pendiente' => 'nullable|numeric|min:0',
                'tipo_pago' => 'required|string|max:50',
                'descuento' => 'nullable|numeric|min:0'
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            return [
                'cliente_id' => 'required|exists:clientes,id',
                'total' => 'required|numeric|min:0',
                'iva' => 'nullable|numeric|min:0',
                'saldo_pendiente' => 'nullable|numeric|min:0',
                'tipo_pago' => 'required|string|max:50',
                'descuento' => 'nullable|numeric|min:0'
            ];
        }

        return [];
    }
}
