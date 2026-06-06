<?php
namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\UpdateLibroRequest;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $query = Libro::with('autores');

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', "%{$request->titulo}%");
        }
        if ($request->filled('autor')) {
            $query->whereHas('autores', fn($q) => $q->where('nombre', 'like', "%{$request->autor}%"));
        }
        if ($request->filled('año')) {
            $query->where('año_publicacion', $request->año);
        }

        return response()->json($query->paginate(10), 200);
    }

    public function show($id)
    {
        $libro = Libro::with('autores')->findOrFail($id);
        return response()->json($libro, 200);
    }

    public function store(StoreLibroRequest $request)
    {
        $libro = Libro::create($request->validated());
        return response()->json($libro, 201);
    }

    public function update(UpdateLibroRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->validated());
        return response()->json($libro, 200);
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete(); // Soft delete
        return response()->json(['message' => 'Libro eliminado'], 200);
    }
}
