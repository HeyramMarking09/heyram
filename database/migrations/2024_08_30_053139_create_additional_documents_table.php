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
        Schema::create('additional_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('name')->nullable();
            $table->string('dead_line_date')->nullable();
            $table->string('simple_file')->nullable();
            $table->string('docs_file')->nullable();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_documents');
    }
};
