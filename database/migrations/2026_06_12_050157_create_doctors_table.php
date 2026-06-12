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
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('specialty');
        $table->integer('experience_years')->default(0);
        $table->decimal('consultation_price', 10, 2)->default(0);
        $table->text('bio')->nullable();
        $table->string('image')->nullable();
        $table->boolean('is_available')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
