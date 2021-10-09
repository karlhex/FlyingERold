<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id');     /* 合同编号 */
            $table->unsignedTinyInteger('sequence');
            $table->foreignId('productinfo_id');
            $table->string('model');             /* 型号 */
            $table->decimal('unit_price',13,2); /* 单价(所有都是含税价) */
            $table->integer('number');          /* 数量 */
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
