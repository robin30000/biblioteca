<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Autor;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $autores = Autor::all();

        Libro::factory(20)->create()->each(function ($libro) use ($autores) {
            $libro->autores()->attach(
                $autores->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
