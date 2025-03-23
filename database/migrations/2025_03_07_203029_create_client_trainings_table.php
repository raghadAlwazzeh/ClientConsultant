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
        Schema::create('client_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('training_country');
            $table->string('training_duration')->nullable();
            $table->string('training_completion_year');
            $table->string('training_institution')->nullable();
            $table->string('training_location')->nullable();
            $table->string('training_titel')->nullable();
            $table->string('training_german_translate')->nullable();
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
            $table->string('applied_application')->nullable();
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
        Schema::dropIfExists('client_trainings');
    }
};
