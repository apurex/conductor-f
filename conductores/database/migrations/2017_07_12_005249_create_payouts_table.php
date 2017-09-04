<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('payouts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('last_name');

            $table->boolean('active')->default(0); // si esta verificado o no
            $table->string('num_ref');
            $table->string('last_payout');
            // la fecha del ultimo pago es la fecha de actualizacon de la fila
            // contenida en timestam update_at
            $table->integer('plan'); // plan mensual, quincenal o cualquier vaina q inventemos

            //$table->integer('payouts_counts'); // cantidad de pagos
            //$table->float('total_payouts',10,2); // total pagado
            $table->integer('left_days'); // fecha de vencimiento - fecha de hoy
            
            $table->datetime('exp_date'); //fecha de vencimiento

            $table->integer('user_id')->unsigned();   

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
        //
    }
}
