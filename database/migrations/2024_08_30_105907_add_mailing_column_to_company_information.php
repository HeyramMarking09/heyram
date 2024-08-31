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
        Schema::table('company_information', function (Blueprint $table) {
            $table->enum('same_as_business_address',[0,1])->after('job_title_occupation')->default(1)->comment('1-Yes,0-No');
            $table->string('mailing_business_address')->after('same_as_business_address')->nullable();
            $table->string('mailing_country')->after('mailing_business_address')->nullable();
            $table->string('mailing_state')->after('mailing_country')->nullable();
            $table->string('mailing_city')->after('mailing_state')->nullable();
            $table->string('mailing_postal_code')->after('mailing_city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_information', function (Blueprint $table) {
            //
        });
    }
};
