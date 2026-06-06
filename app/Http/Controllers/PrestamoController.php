<?php
namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Http\Requests\StorePrestamoRequest;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['usuario', 'libro'])->paginate(10);
        return response()->json($prestamos, 200);
    }

    public function store(StorePrestamoRequest $request)
    {
        $prestamo = Prestamo::create($request->validated());
        return response()->json($prestamo, 201);
    }

    public function devolver($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update([
            'fecha_devolucion_real' => now(),
            'estado' => 'devuelto'
        ]);
        return response()->json(['message' => 'Préstamo devuelto'], 200);
    }
}
