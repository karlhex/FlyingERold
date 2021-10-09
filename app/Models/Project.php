<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Plan;
use App\Models\FilterModel;
use App\Models\ProjectRole;
use App\Models\Contract;
use App\Traits\FilesMorphs;
use App\Traits\WithSelectOption;
use Illuminate\Support\Facades\Log;

class Project extends FilterModel
{
    use HasFactory;
    use FilesMorphs;
    use WithSelectOption;

    /**
     *  Mass Assignment.
     */
    protected $guarded = ['id'];

    /**
     * 合同信息
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * 项目计划表
     */
    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    /**
     * 角色表
     */
    public function roles()
    {
        return $this->hasMany(ProjectRole::class);
    }

    public function getStatusNameAttribute()
    {
        return $this->getSelectOptionValue('prjstatus',$this->status);
    }
}
