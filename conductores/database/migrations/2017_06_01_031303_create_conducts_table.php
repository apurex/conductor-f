<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conducts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('car_m');
            $table->string('car_ma');
            $table->string('car_state');
            $table->mediumText('short');
            $table->text('body');
            $table->string('phone');

            $table->boolean('verif')->default(0);
            $table->string('name');
            $table->string('last_name');
            $table->string('state');

            $table->integer('user_id')->unsigned();   

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('conducts');
    }
}
