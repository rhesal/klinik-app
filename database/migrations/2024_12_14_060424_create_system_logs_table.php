<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id('log_id'); // Primary Key
            $table->enum('log_level', ['INFO', 'WARN', 'ERROR', 'DEBUG']); // Log Level
            $table->text('message'); // Message
            $table->timestamp('timestamp')->useCurrent(); // Timestamp with default current time
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_logs');
    }
};
