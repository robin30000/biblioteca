<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 150);
        $table->string('email', 150)->unique();
        $table->string('telefono', 20)->nullable();
        $table->date('fecha_registro')->default(DB::raw('CURRENT_DATE'));
        $table->enum('estado', ['activo', 'inactivo'])->default('activo');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
