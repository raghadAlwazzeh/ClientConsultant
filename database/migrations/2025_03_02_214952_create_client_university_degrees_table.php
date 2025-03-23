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
        Schema::create('client_university_degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('country');
            $table->string('study_duration')->nullable();
            $table->string('graduation_year');
            $table->string('study_institution')->nullable();
            $table->string('study_location')->nullable();
            $table->string('study_titel')->nullable();
            $table->string('study_german_translate')->nullable();
            $table->string('refernce_job');
            $table->string('another_refernce_job')->nullable();
            $table->string('regulated')->nullable();
            $table->string('country_regulated')->nullable();
            $table->string('same_country_job')->nullable();
            $table->string('country_job_duration')->nullable();
            $table->string('same_germany_job')->nullable();
            $table->string('germany_job_duration')->nullable();
            $table->string('available_certificate')->nullable();
            $table->string('available_translation')->nullable();
            $table->string('applied_application');
            $table->string('equivalence_assessment')->nullable();
            $table->date('equivalence_assessment_date')->nullable();
            $table->string('evaluation_result')->nullable();         
            $table->date('evaluation_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_university_degrees');
    }
};
