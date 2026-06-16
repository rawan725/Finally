<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('bio');
            $table->string('whatsapp_number')->nullable()->after('phone');
            $table->string('response_time')->nullable()->after('whatsapp_number');
        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'whatsapp_number',
                'response_time',
            ]);
        });
    }
};