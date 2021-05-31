<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sid_configs', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('prefix');
            $table->boolean('inc_year');
            $table->boolean('inc_month');
            $table->boolean('inc_day');
            $table->unsignedTinyInteger('length');
            $table->bigInteger('current_no');
            $table->bigInteger('max_no');
            $table->enum('clear_interval',['day','month','season','year','never']);
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
        Schema::dropIfExists('sid_configs');
    }
}
