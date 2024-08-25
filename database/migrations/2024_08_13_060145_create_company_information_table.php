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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id'); // Use the appropriate column type
            $table->string('name')->nullable(); 
            $table->string('last_name')->nullable(); 
            $table->string('phone',20)->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('job_title')->nullable(); 
            $table->string('company_legel_name')->nullable(); 
            $table->string('company_operating_name')->nullable(); 
            $table->string('cra_business_number',50)->nullable(); 
            $table->string('registered_business_address')->nullable(); 
            $table->integer('country')->default(0); 
            $table->string('state',20)->nullable(); 
            $table->string('city',50)->nullable(); 
            $table->string('postal_code',50)->nullable(); 
            $table->integer('full_time')->default(0); 
            $table->integer('part_time')->default(0); 
            $table->string('company_incorporation_date', 30)->nullable(); 
            $table->enum('more_then_five_million',[0,1])->default(1)->comment('1-Yes,0-No');
            $table->enum('lmia_application_in_last_three_year',[0,1])->default(1)->comment('1-Yes,0-No');
            $table->text('description')->nullable();
            $table->json('job_title_occupation')->nullable();
            $table->timestamps();
             // Add the foreign key constraint
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};
