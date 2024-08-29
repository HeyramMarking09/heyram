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
        Schema::create('company_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('certificate_of_incorporation')->nullable();
            $table->string('valid_business_license')->nullable();
            $table->string('summary_of_company')->nullable();
            $table->integer('following_document')->default(0);
            $table->string('following_document_file_one')->nullable();
            $table->string('following_document_file_two')->nullable();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_docs');
    }
};
