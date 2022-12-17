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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address');
            $table->string('phone');
            $table->string('image');
            $table->string('gender');
            $table->string('birthday');
            $table->foreignId('group_id')->references('id')->on('groups');
            $table->foreignId('province_id')->references('id')->on('provinces');
            $table->foreignId('district_id')->references('id')->on('districts');
            $table->foreignId('ward_id')->references('id')->on('wards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 
    }
};
