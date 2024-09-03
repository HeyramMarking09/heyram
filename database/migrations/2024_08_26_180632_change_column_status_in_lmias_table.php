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
            $table->enum('status', [0,1,2,3,4,5,6,7,8,9,10,11])->default(0)->comment('1. Request received and approved , 2. LMIA submitted, 3. Payment deducted, 4. Queued for assessment, 5. LMIA assigned to the LMIA officer and assessment in progress ,6. Interview Schedule, 7. LMIA officer requested information/documents , 8. LMIA process started, and job vacancy advertised , 9. Other, 10. LMIA Approved , 11-Lmia Denied' )->change();
            $table->string('internal_status')->after('status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lmias', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
