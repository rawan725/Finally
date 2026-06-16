<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doctor_bookings', function (Blueprint $table) {
            $table->boolean('sms_sent')->default(false)->after('case_image');
            $table->text('sms_message')->nullable()->after('sms_sent');
            $table->timestamp('sms_sent_at')->nullable()->after('sms_message');
        });
    }

    public function down(): void
    {
        Schema::table('doctor_bookings', function (Blueprint $table) {
            $table->dropColumn([
                'sms_sent',
                'sms_message',
                'sms_sent_at',
            ]);
        });
    }
};