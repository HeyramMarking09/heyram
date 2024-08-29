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
        Schema::create('job_banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('job_title')->nullable();
            $table->integer('number_of_vacancies')->default(0);
            $table->text('location')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('bank_job_ad_number')->default(0);
            $table->string('status', 20)->nullable();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_banks');
    }
};
