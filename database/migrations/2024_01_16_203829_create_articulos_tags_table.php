<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('articulo_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulo_id')->nullable()->constrained('articulos')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->foreignId('tag_id')->nullable()->constrained('tags')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos_tags');
    }
};
