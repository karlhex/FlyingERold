<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProjectRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->unsignedTinyInteger('sequence');
            $table->string('role',20); /*['sales','PM','engineer','accuntant']*/
            $table->foreignId('person_id');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('select_options')->insert([
            ['key' => 'prrole','option' => 'sales','value'=>'销售'],
            ['key' => 'prrole','option' => 'PM','value'=>'项目经理'],
            ['key' => 'prrole','option' => 'engineer','value'=>'工程师'],
            ['key' => 'prrole','option' => 'accuntant','value'=>'会计'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_roles');
        DB::table('select_options')->where('key','prrole')->delete();
    }
}
