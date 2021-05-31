<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
1. id
2. 公司名称： Name:string
3. 地址: Address:string
4. 网站: Site:string
5. 电话: Phone: string
6. 邮件: Email: string
7. 商务联系人: businessPerson @ref(person,id)
8. 技术联系人: techPerson @ref(person,id)
9. 财务信息: financeInfo @ref(financeInfo,id)
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('site');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->foreignId('business_person')->nullable();
            $table->foreignId('tech_person')->nullable();
            $table->foreignId('account_id');
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
        Schema::dropIfExists('companies');
    }
}
