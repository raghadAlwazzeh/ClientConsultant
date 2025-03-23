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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('ort');
            $table->string('landkreis');
            $table->string('data_protection');
            $table->string('education');
            $table->string('unknown_advice')->nullable();
            $table->string('advisor')->nullable();
            $table->string('another_advisor')->nullable();
            $table->string('recognation_person')->nullable();
            $table->string('another_recognation_person')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street');
            $table->string('address')->nullable();
            $table->string('zip_code');
            $table->string('city');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('germany_residence')->nullable();
            $table->string('state')->nullable();
            $table->string('residence')->nullable();
            $table->string('gender');
            $table->string('country');
            $table->string('birth_date');
            $table->string('first_nationality')->nullable();
            $table->string('second_nationality')->nullable();
            $table->string('reise_date')->nullable();
            $table->string('job')->nullable();
            $table->string('has_previous_application');
            $table->string('previous_advisory_institution')->nullable();
            $table->string('result')->nullable();
            $table->string('rating')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
