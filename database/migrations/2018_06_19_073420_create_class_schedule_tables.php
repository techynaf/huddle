<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassScheduleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('branch_id');
            $table->string('day');
            $table->date('sem_start');
            $table->date('sem_end');
            $table->time('start');
            $table->time('end');
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
}
