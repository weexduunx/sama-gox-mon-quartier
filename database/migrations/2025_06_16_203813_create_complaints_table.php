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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->nullable()->constrained()->onDelete('set null');
            $table->string('type'); // Voirie, Nuisance sonore, etc.
            $table->text('description');
            $table->string('address');
            $table->string('priority')->default('Moyenne'); // Basse, Moyenne, Haute
            $table->string('status')->default('Ouvert'); // Ouvert, En cours, Résolu
            $table->date('date')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
