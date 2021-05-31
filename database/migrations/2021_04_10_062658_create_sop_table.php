<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_of_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id');
            $table->unsignedTinyInteger('sequence');
            $table->string('instruction');
            $table->enum('drcr',['Dr','Cr']);
            $table->date('schedule_date');
            $table->date('tran_date')->nullable();
            $table->decimal('amount',13, 2);
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
        Schema::dropIfExists('schedule_of_payment');
    }
}
