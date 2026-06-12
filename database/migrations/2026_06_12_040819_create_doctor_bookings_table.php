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
    Schema::create('doctor_bookings', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

        $table->string('pet_name');
        $table->string('pet_type');
        $table->string('problem_title');
        $table->text('problem_description');
        $table->date('booking_date')->nullable();
        $table->time('booking_time')->nullable();

        $table->string('status')->default('pending');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('doctor_bookings');
}
};
