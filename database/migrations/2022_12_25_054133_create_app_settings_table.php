<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->nullable();
            $table->string('app_description')->nullable();
            $table->string('app_logo')->nullable();
            $table->string('app_version')->nullable();
            
            $table->string('school_full_name')->nullable();
            $table->string('school_short_name')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('school_mobile')->nullable();
            $table->string('school_email')->nullable();
            $table->string('school_npsn')->nullable();
            $table->string('school_instagram')->nullable();
            $table->string('school_facebook')->nullable();
            $table->string('school_twitter')->nullable();
            $table->string('school_youtube')->nullable();
            $table->string('school_website')->nullable();
            $table->string('school_headmaster')->nullable();
            
            $table->enum('is_interface_maintenance', ['0', '1']);
            $table->enum('is_api_maintenance', ['0', '1']);
            $table->enum('is_payment_maintenance', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
};
