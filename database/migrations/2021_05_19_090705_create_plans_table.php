<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->unsignedTinyInteger('sequence');
            $table->foreignId('charge_person');
            $table->foreignId('action_person')->nullable();
            $table->string('instruction');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('act_start_date')->nullable();
            $table->date('act_end_date')->nullable();
            $table->enum('status',['waiting','pending','working','finished','cancelled']);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('select_options')->insert([
            ['key' => 'planstatus','option' => 'waiting','value'=>'等待开始'],
            ['key' => 'planstatus','option' => 'pending','value'=>'暂时停止'],
            ['key' => 'planstatus','option' => 'working','value'=>'进行中'],
            ['key' => 'planstatus','option' => 'finished','value'=>'已结束'],
            ['key' => 'planstatus','option' => 'cancelled','value'=>'已取消'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
        DB::table('select_options')->where('key','planstatus')->delete();
    }
}
