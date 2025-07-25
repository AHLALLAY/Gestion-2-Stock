<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['case','glass']);
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('price', 5, 2);
            $table->string('localisation')->nullable();
            $table->foreignId('colorId')->constrained('colors')->nullable()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
