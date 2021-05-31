<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->foreignId('project_id');
            $table->string("sid")->unique();
            $table->string("peer_sid")->nullable();
            $table->string("title");
            $table->foreignId("company_id");
            $table->enum("type",['sales','puchase']);
            $table->enum('stage',['started','ended','waiting','signed','cancelled'] );
            $table->decimal('amount', 13, 2);
            $table->date('sign_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('contact_person');
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
        Schema::dropIfExists('contracts');
    }
}
