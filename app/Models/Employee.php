<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FilterModel;
use App\Models\work_experience;
use App\Models\project_experience;
use App\Models\Education;
use App\Models\certificate;
use App\Traits\FilesMorphs;
use App\Traits\WithSelectOption;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends FilterModel
{
    use HasFactory;
    use SoftDeletes;
    use FilesMorphs;
    use WithSelectOption;

    protected $guarded = ['id'];

    public function work_experience()
    {
        return $this->hasMany(work_experience::class);
    }

    public function project_experience()
    {
        return $this->hasMany(project_experience::class);
    }

    public function education()
    {
        return $this->hasMany(education::class);
    }

    public function certificate()
    {
        return $this->hasMany(certificate::class);
    }

    public function getDepartmentNameAttribute()
    {
        return $this->getSelectOptionValue('department',$this->department);
    }
}
