<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('log_id');
            $table->integer('user_id');
            $table->datetime('initial_start');
            $table->datetime('initial_end')->nullable();
            $table->datetime('final_start');
            $table->datetime('final_end');
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
        Schema::dropIfExists('log_updates');
    }
}
