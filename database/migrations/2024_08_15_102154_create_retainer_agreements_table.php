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
        Schema::create('retainer_agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('name_first')->nullable();
            $table->string('second_name')->nullable();
            $table->string('third_name')->nullable();
            $table->string('governing_law')->nullable();
            $table->string('governing_law1')->nullable();
            $table->string('client_signature')->nullable();
            $table->string('date',20)->nullable();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retainer_agreements');
    }
};
