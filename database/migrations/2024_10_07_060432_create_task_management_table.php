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
        Schema::create('task_management', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('category', 20)->nullable();
            $table->string('client_name')->nullable();
            $table->unsignedBigInteger('responsible_person')->nullable();
            $table->string('start_date',30)->nullable();
            $table->string('due_date',30)->nullable();
            $table->string('type_of_service')->nullable();
            $table->string('priority', 20)->nullable();
            $table->string('status', 30)->nullable();
            $table->json('description')->nullable();
            $table->string('file', 100)->nullable();
            $table->timestamps();

            $table->foreign('responsible_person')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_management');
    }
};
