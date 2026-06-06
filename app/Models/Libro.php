<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = [
        'titulo',
        'isbn',
        'año_publicacion',
        'numero_paginas',
        'descripcion',
        'stock_disponible',
    ];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro');
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
