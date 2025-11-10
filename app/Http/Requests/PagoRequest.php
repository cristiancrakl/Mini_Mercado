<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
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
                'facturas_id' => 'required|exists:facturas,id',
                'metodoPagos_id' => 'required|exists:metodo_pagos,id',
                'monto' => 'required|numeric|min:0',
                'referencia_transaccion' => 'nullable|string|max:255',
                'observaciones' => 'nullable|string'
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            return [
                'facturas_id' => 'required|exists:facturas,id',
                'metodoPagos_id' => 'required|exists:metodo_pagos,id',
                'monto' => 'required|numeric|min:0',
                'referencia_transaccion' => 'nullable|string|max:255',
                'observaciones' => 'nullable|string'
            ];
        }

        return [];
    }
}
