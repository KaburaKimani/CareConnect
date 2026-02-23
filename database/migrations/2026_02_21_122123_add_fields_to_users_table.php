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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['client', 'caregiver', 'admin'])->default('client')->after('email');
            $table->string('phone')->nullable()->after('role');
            $table->string('profile_photo_url')->nullable()->after('phone');
            $table->text('bio')->nullable()->after('profile_photo_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'profile_photo_url', 'bio']);
        });
    }
};

