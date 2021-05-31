<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FilterModel;

class Company extends FilterModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'site',
        'phone',
        'email',
        'business_person',
        'tech_person',
        'account_id'
    ];

}
