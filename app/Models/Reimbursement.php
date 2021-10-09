<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RbDetail;
use App\Models\FilterModel;
use App\Traits\FilesMorphs;

class Reimbursement extends FilterModel
{
    use HasFactory;
    use FilesMorphs;

    protected $fillable=[
        'apply_employee_id','apply_date','approve_employee_id','approve_date','total_amount','status','memo'
    ];


    public function detail()
    {
        return $this->hasMany(RbDetail::class);
    }

    public function apply_employee()
    {
        return $this->belongsTo(Employee::class,'apply_employee_id');
    }

    public function approve_employee()
    {
        return $this->belongsTo(Employee::class,'approve_employee_id');
    }

    public function getApplyNameAttribute()
    {
        if ($this->apply_employee != null)
            return $this->apply_employee->name;
        else
            return null;
    }

    public function getApproveNameAttribute()
    {
        if ($this->approve_employee != null)
            return $this->approve_employee->name;
        else
            return null;
    }
}
