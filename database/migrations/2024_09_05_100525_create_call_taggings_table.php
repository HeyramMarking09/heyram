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
        Schema::create('call_taggings', function (Blueprint $table) {
            $table->id();
            $table->string('user_type',20)->comment('employer,employee,customer')->nullable();
            $table->string('type',20)->comment('existing, new')->nullable();
            $table->string('lead_other',20)->comment('lead, other')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->enum('status', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14])->default(0);
            $table->string('visa_type')->nullable();
            $table->string('call_back_date',30)->nullable();
            $table->text('client_query')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_taggings');
    }
};
