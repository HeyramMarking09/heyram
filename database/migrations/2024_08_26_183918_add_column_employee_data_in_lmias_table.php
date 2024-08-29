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
        Schema::table('lmias', function (Blueprint $table) {
            $table->json('assign_employee_data')->after('internal_status')->nullable();
            $table->integer('file_assign_to_employee')->after('assign_employee_data')->default(0);
            $table->string('date_of_approval')->after('file_assign_to_employee')->nullable();
            $table->string('date_of_expiry')->after('date_of_approval')->nullable();
            $table->string('number_of_lmia')->after('date_of_expiry')->nullable();
            $table->string('interview_date_time')->after('number_of_lmia')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lmias', function (Blueprint $table) {
            //
        });
    }
};
