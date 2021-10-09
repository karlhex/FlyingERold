<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReimbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reimbursements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apply_employee_id');
            $table->date('apply_date');
            $table->foreignId('approve_employee_id')->nullable();
            $table->date('approve_date')->nullable();
            $table->decimal('total_amount',13,2);
            $table->enum('status',['applying','approved','rejected']);
            $table->text('memo')->nullable();
            $table->timestamps();
        });

        DB::table('select_options')->insert([
            ['key' => 'rbstatus','option' => 'applying','value'=>'已发申情'],
            ['key' => 'rbstatus','option' => 'approved','value'=>'已批准'],
            ['key' => 'rbstatus','option' => 'rejected','value'=>'已拒绝'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reimbursements');
        DB::table('select_options')->where('key','rbstatus')->delete();
    }
}
