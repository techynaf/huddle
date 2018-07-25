<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_update', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('log_id');
            $table->integer('user_id');
            $table->time('initial_start');
            $table->time('initial_end');
            $table->time('final_start');
            $table->time('final_end');
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
        Schema::dropIfExists('logs_update');
    }
}
