<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->morphs('tranable');
            $table->date('tran_date');
            $table->string('tran_code',10);
            $table->enum('drcr',['Dr','Cr']);
            $table->string('sid')->unique();
            $table->foreignId('dr_account');
            $table->foreignId('cr_account');
            $table->decimal('amount',15,2);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
