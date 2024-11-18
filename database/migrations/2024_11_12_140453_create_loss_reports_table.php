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
        Schema::create('loss_reports', function (Blueprint $table) {
            $table->id();
            $table->string('numplaque');
            $table->string('telephone');
            $table->string('nom_victime');
            $table->text('description')->nullable();
            $table->string('code_de_suivi')->unique();
            $table->enum('status', ['en_attente', 'en_cours_de_révision', 'résolu'])->default('en_attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loss_reports');
    }
};
