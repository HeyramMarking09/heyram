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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone', 15);
            $table->string('password');
            $table->enum('user_type', ['customer','employer', 'employee', 'manager'])->default('employer');
            $table->string('service_type')->nullable();
            $table->string('employee_posssition',10)->nullable();
            $table->tinyInteger('is_online')->default(0)->comment('0-offline, 1 - online');
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
