<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FilterModel;
use App\Models\work_experience;
use App\Models\project_experience;
use App\Models\Education;
use App\Models\certificate;

class Employee extends FilterModel
{
    use HasFactory;

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
}
