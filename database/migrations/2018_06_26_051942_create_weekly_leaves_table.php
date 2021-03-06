<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id');
            $table->integer('user_id');
            $table->date('start');
            $table->date('end');
            $table->string('day_1');
            $table->string('day_2');
            $table->integer('approved')->nullable();
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
        Schema::dropIfExists('weekly_leaves');
    }
}
