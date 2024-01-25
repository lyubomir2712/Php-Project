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
        Schema::create('holiday_houses', function (Blueprint $table) {
            $table->id();
            $table->string("house_name");
            $table->foreignId('location')->constrained('cities')->onDelete('cascade');
            $table->integer("rooms_count");
            $table->integer("beds_count");
            $table->foreignId('holiday_house_type')->constrained('holiday_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_houses');
    }
};
