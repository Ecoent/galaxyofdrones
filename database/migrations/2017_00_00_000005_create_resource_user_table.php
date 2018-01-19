<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('resource_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('resource_id')->unsigned();
            $table->foreign('resource_id')
                ->references('id')
                ->on('resources')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('quantity')->unsigned();
            $table->timestamps();

            $table->unique(['resource_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('resource_user');
    }
}
