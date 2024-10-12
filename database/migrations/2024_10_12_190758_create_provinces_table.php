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
        Schema::create(table: 'provinces', callback:  function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'iso_code');
            $table->timestamps();
        });

        Schema::table(table: 'facilities', callback: function (Blueprint $table) {
            $table->foreignId('province_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
