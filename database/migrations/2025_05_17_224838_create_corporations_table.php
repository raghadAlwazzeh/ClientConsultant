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
        Schema::create('corporations', function (Blueprint $table) {
            $table->id();
            $table->date('event_date'); // Datum der Veranstaltung
            $table->string('district'); // Landkreis
            $table->string('event_type'); // Veranstaltungsart
            $table->string('event_other')->nullable(); // Veranstaltung Sonstiges
            $table->string('activity_type'); // Art der Aktivität
            $table->integer('aqb_actors'); // Anzahl der Akteure AQB
            $table->integer('external_actors'); // Anzahl der Akteure Extern
            $table->string('actor_type'); // Akteurstyp
            $table->string('actor_type_other')->nullable(); // Akteurstyp Sonstiges
            $table->string('short_title')->nullable(); // Kurzbezeichnung/Titel
            $table->string('location')->nullable(); // Standort
            $table->text('notes')->nullable(); // Bemerkungen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporations');
    }
};
