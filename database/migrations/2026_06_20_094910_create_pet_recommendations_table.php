<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pet_recommendations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('home_space');
            $table->string('daily_time');
            $table->string('personality');
            $table->string('has_children');
            $table->string('has_allergy');
            $table->string('experience_level');
            $table->string('budget_level');
            $table->string('preferred_activity');

            $table->string('recommended_pet');
            $table->text('recommendation_reason');
            $table->json('answers_vector')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_recommendations');
    }
};