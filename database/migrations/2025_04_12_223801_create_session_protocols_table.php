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
        Schema::create('session_protocols', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->enum('contact_type', ['first_consultation', 'follow_up_consultation', 'other']);
            $table->date('consultation_date')->nullable();
            $table->string('advice_seeker');
            $table->string('another_advice_seeker')->nullable();;
            $table->string('consultation_type');
            $table->string('duration');
            $table->string('another_help_system')->nullable();
            $table->string('anerkennend_help')->nullable();
            $table->string('iq_help')->nullable();
            $table->string('another_advisor_help')->nullable();
            $table->string('other_help')->nullable();
            $table->string('consultation_language');
            $table->enum('interpreter', ['yes', 'no'])->nullable();
            $table->boolean('data_processing_consent')->default(false);
            $table->boolean('survey_contact_consent')->default(false);
            $table->text('notes_and_agreements')->nullable();
            $table->date('task_date')->nullable();
            $table->string('task_subject')->nullable();
            $table->text('scheduled_task')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_protocols');
    }
};
