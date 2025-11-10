<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetodoPagoRequest extends FormRequest
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
                'descripcion' => 'nullable|string'
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            return [
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string'
            ];
        }

        return [];
    }
}
