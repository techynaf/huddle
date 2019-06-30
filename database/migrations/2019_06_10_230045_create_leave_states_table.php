<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_states', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('leave_id');
            $table->integer('serial');
            $table->bigInteger('branch_id');
            $table->integer('role_id');
            $table->bigInteger('user_id')->nullable();
            $table->integer('action')->nullable();
            $table->datetime('action_at')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('cascaded')->nullable();
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
        Schema::dropIfExists('leave_states');
    }
}
