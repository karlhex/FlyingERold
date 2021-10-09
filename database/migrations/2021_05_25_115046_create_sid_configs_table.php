<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

        DB::table('select_options')->insert([
            ['key' => 'clearinterval','option' => 'day','value'=>'每日清除'],
            ['key' => 'clearinterval','option' => 'month','value'=>'每月清除'],
            ['key' => 'clearinterval','option' => 'day','value'=>'每季清除'],
            ['key' => 'clearinterval','option' => 'year','value'=>'每年清除'],
            ['key' => 'clearinterval','option' => 'never','value'=>'不清除'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sid_configs');
        DB::table('select_options')->where('key','clearinterval')->delete();
    }
}
