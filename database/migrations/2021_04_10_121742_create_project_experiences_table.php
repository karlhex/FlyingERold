<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
1. 员工ID nid
2. 开始时间 startDate
3. 结束时间 endDate
4. 公司 company
5. 项目名称 project
6. 项目角色 role
     * @return void
     */
    public function up()
    {
        Schema::create('project_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('sequence');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('project');
            $table->string('role');
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
        Schema::dropIfExists('project_experiences');
    }
}
