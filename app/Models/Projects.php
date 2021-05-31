<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;
use App\Models\ProjectRole;
use App\Models\fw_Contract;

class Projects extends Model
{
    use HasFactory;

    /**
     *  Mass Assignment.
     */
    protected $guarded = ['id'];

    /**
     * 合同信息
     */
    public function contract()
    {
        return $this->hasMany(fw_Contract::class);
    }

    /**
     * 项目计划表
     */
    public function plan()
    {
        return $this->hasMany(Plan::class);
    }

    /**
     * 角色表
     */
    public function role()
    {
        return $this->hasMany(ProjectRole::class);
    }
}
