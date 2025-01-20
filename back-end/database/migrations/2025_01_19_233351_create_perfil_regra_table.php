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
        Schema::create('perfil_regra', function (Blueprint $table) {
            $table->foreignId('perfil_id')->constrained('perfils')->onDelete('cascade');
            $table->foreignId('regra_id')->constrained('regras')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['perfil_id', 'regra_id']); // Evita duplicações
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_regra');
    }
};
