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
            $table->string('complainant')->nullable(); // Peut-être anonyme
            $table->string('type');
            $table->text('description');
            $table->string('address');
            $table->date('date'); // Date du signalement
            $table->string('status')->default('Ouvert'); // Ouvert, En cours, Résolu, Fermé
            $table->string('priority')->default('Moyenne'); // Basse, Moyenne, Haute
            $table->foreignId('resident_id')->nullable()->constrained()->onDelete('set null'); // Liaison optionnelle avec Resident
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
