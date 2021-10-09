<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('unit');
            $table->string('type'); /* enum['hardware','software','service'] */
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('select_options')->insert([
            ['key' => 'producttype','option' => 'hardware', 'value'=> '硬件产品'],
            ['key' => 'producttype','option' => 'software', 'value'=> '软件产品'],
            ['key' => 'producttype','option' => 'service', 'value'=> '服务产品'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_infos');

        DB::table('select_options')->where('key','producttype')->delete();

    }
}
