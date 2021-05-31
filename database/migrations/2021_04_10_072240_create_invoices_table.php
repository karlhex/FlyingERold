<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
1. 发票号
2. 发票复印件（上传）
3. 金额
4. 税率
5. 邮寄/接收标志
6. 关联合同号
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sop_id');
            $table->unsignedTinyInteger('sequence');
            $table->string("invoice_no");
            $table->foreignId('dr_tax_info_id');
            $table->foreignId('cr_tax_info_id');
            $table->string("stack");
            $table->decimal('amount',13,2);
            $table->text('memo')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
