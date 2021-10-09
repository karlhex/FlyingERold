<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency_code',3);
            $table->string('country');
            $table->unsignedFloat('change_rate');
            $table->timestamps();
        });

        DB::table('currencies')->insert([
            [ 'currency_code' => 'CNY', 'country' => 'zh' ,'change_rate'=>1.0],
            [ 'currency_code' => 'USD', 'country' => 'us' ,'change_rate'=>6.5],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
