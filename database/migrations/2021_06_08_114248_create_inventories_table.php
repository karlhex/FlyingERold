<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productinfo_id');
            $table->foreignId('sales_contract');
            $table->foreignId('puchase_contract');
            $table->unsignedInteger('number');
            $table->string('license');
            $table->enum('status',['factory','store','customer','inuse','retired']);
            $table->timestamps();
        });

        DB::table('select_options')->insert([
            ['key' => 'invstatus','option'=>'factory','value' => '厂家未发货'],
            ['key' => 'invstatus','option'=>'store','value' => '公司仓库存放'],
            ['key' => 'invstatus','option'=>'customer','value' => '已送客户'],
            ['key' => 'invstatus','option'=>'inuse','value' => '已投产上线'],
            ['key' => 'invstatus','option'=>'retired','value' => '已退出使用'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
        DB::table('select_options')->where('key','invstatus')->delete();
    }
}
