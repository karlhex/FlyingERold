<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("sid");
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('status');
            $table->text('memo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('select_options')->insert([
            ['key' => 'prjstatus','option' => 'planning','value'=>'计划中'],
            ['key' => 'prjstatus','option' => 'started','value'=>'已开始'],
            ['key' => 'prjstatus','option' => 'end','value'=>'已结束'],
            ['key' => 'prjstatus','option' => 'pending','value'=>'等待资源'],
            ['key' => 'prjstatus','option' => 'aborted','value'=>'已取消'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
