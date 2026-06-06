<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use App\Models\Libro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {
        $fechaPrestamo = $this->faker->dateTimeBetween('-1 month', 'now');
        $fechaDevolucionEstimada = (clone $fechaPrestamo)->modify('+15 days');
        $fechaDevolucionReal = $this->faker->boolean(70)
            ? $this->faker->dateTimeBetween($fechaPrestamo, $fechaDevolucionEstimada)
            : null;

        // Determinar estado según fechas
        if ($fechaDevolucionReal) {
            $estado = $fechaDevolucionReal > $fechaDevolucionEstimada ? 'retrasado' : 'devuelto';
        } else {
            $estado = 'pendiente';
        }

        return [
            'usuario_id' => Usuario::inRandomOrder()->first()->id,
            'libro_id' => Libro::inRandomOrder()->first()->id,
            'fecha_prestamo' => $fechaPrestamo->format('Y-m-d'),
            'fecha_devolucion_estimada' => $fechaDevolucionEstimada->format('Y-m-d'),
            'fecha_devolucion_real' => $fechaDevolucionReal ? $fechaDevolucionReal->format('Y-m-d') : null,
            'estado' => $estado,
        ];
    }
}
