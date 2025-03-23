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
        Schema::create('client_school_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('school_country');
            $table->string('school_study_duration')->nullable();
            $table->string('school_graduation_year');
            $table->string('qualification_level')->nullable();
            $table->string('school_institution')->nullable();
            $table->string('school_location')->nullable();
            $table->string('school_study_titel')->nullable();
            $table->string('school_german_translate')->nullable();
            $table->string('school_available_certificate')->nullable();
            $table->string('school_available_translation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_school_education');
    }
};
