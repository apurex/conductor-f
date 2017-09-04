<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserCamposExtrasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creo un campo apellidos "last_name"
        Schema::table('users', function($table){
        $table->string('last_name');
        $table->string('direction');
        $table->string('state');
        $table->string('extension')->nullable();
        $table->integer('roles')->unsigned();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimino el campo last_name
        Schema::table('users', function ($table) {
        Schema::drop('users');
    });
    }
}
