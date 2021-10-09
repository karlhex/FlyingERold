<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRbDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reimbursement_id');
            $table->date('date');
            $table->string('reason');
            $table->decimal('amount',13,2);

            $table->foreignId('project_id')->nullable();

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
        Schema::dropIfExists('rb_details');
    }
}
