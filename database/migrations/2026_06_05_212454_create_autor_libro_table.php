<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('autor_libro', function (Blueprint $table) {
        $table->foreignId('autor_id')
              ->constrained('autores')
              ->onDelete('cascade');

        $table->foreignId('libro_id')
              ->constrained('libros')
              ->onDelete('cascade');

        $table->primary(['autor_id', 'libro_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autor_libro');
    }
};
