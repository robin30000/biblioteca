<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibroRequest extends FormRequest
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
            'titulo' => 'required|string|max:150',
            'isbn' => 'required|string|unique:libros,isbn',
            'año_publicacion' => 'required|integer',
            'numero_paginas' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
            'stock_disponible' => 'required|integer|min:0',
        ];
    }
}
