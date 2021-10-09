<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable();
            $table->string("sid")->unique();
            $table->string("peer_sid")->nullable();
            $table->string("title");
            $table->foreignId("company_id");
            $table->enum("type",['sales','purchase']);
            $table->enum('stage',['started','ended','waiting','signed','cancelled'] );
            $table->decimal('amount', 13, 2);
            $table->date('sign_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('contact_person');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('select_options')->insert([
            ['key' => 'contracttype','option' => 'sales', 'value'=> '销售合同'],
            ['key' => 'contracttype','option' => 'purchase', 'value'=> '采购合同'],
        ]);

        DB::table('select_options')->insert([
            ['key' => 'contractstage','option' => 'started', 'value'=> '已开始执行'],
            ['key' => 'contractstage','option' => 'ended', 'value'=> '已结束'],
            ['key' => 'contractstage','option' => 'waiting', 'value'=> '等待开始'],
            ['key' => 'contractstage','option' => 'signed', 'value'=> '已签约'],
            ['key' => 'contractstage','option' => 'cancelled', 'value'=> '已取消'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
        DB::table('select_options')->where('key','contracttype')->delete();
        DB::table('select_options')->where('key','contractstage')->delete();
    }
}
