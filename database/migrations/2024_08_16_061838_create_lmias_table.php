<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lmias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->enum('employee_already_working_in_the_company', [0,1])->comment('0-no ,1- yes');
            $table->json('enployee_detail')->nullable();
            $table->string('suggested_job_title')->nullable();
            $table->string('number_of_vacancies')->nullable();
            $table->enum('speak_english', [0,1])->comment('1-YES ,0-NO');
            $table->enum('write_english',[0,1])->comment('1-YES ,0-NO');
            $table->string('same_occupation')->nullable();
            $table->enum('employee_currenty_in_same_occupation',[0,1])->comment('0-no ,1- yes');
            $table->integer('total_number_of_canadian')->default(0);
            $table->enum('status',[0,1,2,3,4,5,6,7])->default(0)->comment('0-pendding ,1- yes');
            $table->timestamps();
            
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade'); // Optional: defines what happens on delete

        });
    }
    public function down(): void
    {
        Schema::dropIfExists('lmias');
    }
};
