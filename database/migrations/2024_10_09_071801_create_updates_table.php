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
        Schema::create('updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('application_number')->nullable();
            $table->string('date',25)->nullable();
            $table->text('update')->nullable();
            $table->text('comment')->nullable();
            $table->enum('informed', [1,0])->comment('1-Yes, 0-No')->default(0);
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('updates');
    }
};
