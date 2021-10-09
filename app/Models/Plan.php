<?php

namespace App\Models;

use App\Traits\WithSelectOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Plan extends Model
{
    use HasFactory;
    use WithSelectOption;

    protected $fillable =[
        'sequence',
        'charge_person',
        'action_person',
        'instruction',
        'start_date',
        'end_date',
        'act_start_date',
        'act_end_date',
        'status',
    ];

    public function charge_employee()
    {
        return $this->belongsTo(Employee::class,'charge_person');
    }

    public function action_employee()
    {
        return $this->belongsTo(Employee::class,'action_person');
    }

    public function getStatusNameAttribute()
    {
        return $this->getSelectOptionValue('planstatus',$this->status);
    }

    public function getChargePersonNameAttribute()
    {
        return $this->charge_employee->name;
    }

    public function getActionPersonNameAttribute()
    {
        return $this->action_employee->name;
    }
}
