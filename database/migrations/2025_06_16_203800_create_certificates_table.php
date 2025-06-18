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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('applicant');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('purpose');
            $table->string('status')->default('En attente'); // En attente, Approuvé, Rejeté
            $table->date('request_date'); // Date de la demande
            $table->foreignId('resident_id')->nullable()->constrained()->onDelete('set null'); // Liaison optionnelle avec Resident
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
