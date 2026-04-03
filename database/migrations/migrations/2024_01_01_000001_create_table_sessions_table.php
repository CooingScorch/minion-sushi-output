<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->unique();          // Laravel session ID
            $table->unsignedTinyInteger('primary_table');    // e.g. 3  (order number shown to customer)
            $table->json('all_tables');                      // e.g. [3,4] for merged tables
            $table->unsignedTinyInteger('pax');              // number of guests
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_sessions');
    }
};