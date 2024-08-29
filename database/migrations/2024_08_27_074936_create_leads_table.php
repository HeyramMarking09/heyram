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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('location')->nullable();
            $table->string('lead_source')->nullable();
            $table->integer('country')->default(0);
            $table->enum('is_active',[0,1])->default(0);
            $table->enum('status',[0,1,2,3,4,5,6,7,8,9,])->comment('0- not called,1- not received,2- not interested,3- call back,4- interested ,5- followed,6- subcribred,7- convent into client')->default(0);
            $table->unsignedBigInteger('assign_employee');
            $table->timestamps();
            $table->foreign('assign_employee')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
