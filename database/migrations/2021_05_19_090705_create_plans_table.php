<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->unsignedTinyInteger('sequence');
            $table->foreignId('charge_person');
            $table->foreignId('action_person')->nullable();
            $table->string('instruction');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('act_start_date')->nullable();
            $table->date('act_end_date')->nullable();
            $table->enum('status',['waiting','pending','working','finished','cancelled']);
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
        Schema::dropIfExists('plans');
    }
}
