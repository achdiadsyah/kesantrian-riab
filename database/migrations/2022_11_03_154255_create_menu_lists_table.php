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
        Schema::create('menu_lists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('alias');
            $table->string('route');
            $table->string('favicon');
            $table->string('description');
            $table->string('order');
            $table->string('parent_id')->nullable();
            $table->enum('is_parent', ['0', '1']);
            $table->enum('is_active', ['0', '1']);
            $table->enum('user_level', ['staff', 'student', 'parent']);
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
        Schema::dropIfExists('menu_lists');
    }
};
