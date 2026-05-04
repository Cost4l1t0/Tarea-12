<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('character_movie', function (Blueprint $table) {
            $table->foreignId('character_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->primary(['character_id', 'movie_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('character_movie');
    }
};
