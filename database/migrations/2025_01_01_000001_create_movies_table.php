<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('classification', ['horror', 'slasher', 'thriller', 'suspense', 'action', 'drama']);
            $table->date('release_date');
            $table->text('review');
            $table->unsignedSmallInteger('season')->nullable()->comment('Solo para series');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
