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
            $table->morphs('contract');     /* 合同编号 */
            $table->unsignedTinyInteger('sequence');
            $table->string('name');              /* 产品名称 */
            $table->string('model');             /* 型号 */
            $table->string('unit',10);              /* 单位 */
            $table->decimal('unit_price',13,2); /* 单价(所有都是含税价) */
            $table->integer('number');          /* 数量 */
            $table->double('tax_rate');         /* 税率 */
            $table->enum('status',['factory','store','customer','inuse']);    /* 位置 */
            $table->string('license')->nullable();  /* 授权码 */
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
