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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id('log_id'); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign Key to Users
            $table->string('action'); // Action (INSERT, UPDATE, DELETE)
            $table->string('target_table')->nullable(); // Target Table
            $table->unsignedBigInteger('target_id')->nullable(); // Target ID
            $table->text('old_data')->nullable(); // Old Data (optional)
            $table->text('new_data')->nullable(); // New Data (optional)
            $table->timestamp('timestamp')->useCurrent(); // Timestamp with default current time

            // Foreign key constraint
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
