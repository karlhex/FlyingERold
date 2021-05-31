<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
** 员工信息表 employee
1. id
2. 姓名 Name: string
3. 身份证号 nid: string
4. 部门 department:string
5. 岗位 role:string
6. 职级 level:integer
7. 电话1 phone1:string
8. 电话2 phone2:string
9. 电话3 phone3:string
10. 邮箱 email:string
11. 出生日期 birthdate:date
12. 入职时间 joinDate:date
13. 参加工作时间 workDate:date
14. 紧急联系人 contractPerson @ref(person,id)
15. 工资账号:account: @ref(account,id)
16. 社保属地: siPlace :string
17. 社保帐号: siAccid :string
18. 公积金帐号: pfAccid: string
19. 籍贯: origin：string
20. 户口所在地：residence： string
21. 民族： ethnic：string
22. 居住地址： address：string
23. 登录用户： usid:string
24. 教育信息 @reflist(education,nid)
25. 工作信息 @reflist(workexperience,nid)
26. 项目经历 @reflist(projectexperience, nid)
27. 证书 @reflist(certificate，nid)

     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_sid');
            $table->string('name');
            $table->string('national_id',20);
            $table->enum('sex',['M','F']);
            $table->date('birthday');
            $table->string('origin_city');
            $table->string('resident_city');
            $table->string('ethnic',20);

            $table->string('department',10); /*['HO','HRD','GAD','SD','RND','PD','ED','AD','ASSD']*/
            $table->string('role',10);  /*['GM','VP','DM','PM','AM','O']*/
            $table->unsignedTinyInteger('level');
            $table->date('join_date');
            $table->date('sign_date');
            $table->string('sign_type',10); /*['LT','ST']*/
            $table->unsignedTinyInteger('sign_duration');
            $table->date('work_date');

            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('emergency_person')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('email')->nullable();

            $table->string('bank')->nullable();
            $table->string('account')->nullable();
            $table->string('si_city')->nullable();
            $table->string('si_account')->nullable();
            $table->string('pf_account')->nullable();
            $table->string('usid')->nullable();

            $table->string('file_sid');
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
        Schema::dropIfExists('employees');
    }
}
