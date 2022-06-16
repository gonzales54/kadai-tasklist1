<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('content');
            $table->string('status', 10);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');                              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['user_id']);
            Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::dropIfExists('tasks');
    }
}
