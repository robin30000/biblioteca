<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLibroRequest extends FormRequest
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
             'titulo' => 'sometimes|string|max:150',
            'isbn' => 'sometimes|string|unique:libros,isbn,' . $this->id,
            'año_publicacion' => 'sometimes|integer',
            'numero_paginas' => 'sometimes|integer|min:1',
            'descripcion' => 'nullable|string',
            'stock_disponible' => 'sometimes|integer|min:0',
        ];
    }
}
