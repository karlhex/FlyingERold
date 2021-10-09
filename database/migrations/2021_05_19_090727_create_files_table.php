<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->morphs('fileable');
            $table->unsignedTinyInteger('sequence');
            $table->string('name');
            $table->string('origin_name');
            $table->string('file');
            $table->enum('type',['image','doc']);
            $table->binary('thumbnail')->nullable();
            $table->timestamps();
        });

        DB::table('select_options')->insert([
            ['key' => 'filetype','option' => 'image','value'=>'图片'],
            ['key' => 'filetype','option' => 'doc','value'=>'文档'],
            ['key' => 'filetype','option' => 'zip','value'=>'压缩包'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
        DB::table('select_options')->where('key','filetype')->delete();
    }
}
