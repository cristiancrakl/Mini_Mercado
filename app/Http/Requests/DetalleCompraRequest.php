<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleCompraRequest extends FormRequest
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
                'producto_id' => 'required|exists:productos,id',
                'ordenCompras_id' => 'required|exists:orden_compras,id',
                'cantidad' => 'required|integer|min:1',
                'sub_total' => 'required|numeric|min:0',
                'iva' => 'nullable|numeric|min:0'
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            return [
                'producto_id' => 'required|exists:productos,id',
                'ordenCompras_id' => 'required|exists:orden_compras,id',
                'cantidad' => 'required|integer|min:1',
                'sub_total' => 'required|numeric|min:0',
                'iva' => 'nullable|numeric|min:0'
            ];
        }

        return [];
    }
}
