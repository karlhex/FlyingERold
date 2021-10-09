<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FilterModel;

class ProductInfo extends FilterModel
{
    use HasFactory;

    protected $fillable=[
        'name',
        'company_name',
        'unit',
        'type',
        'description'
    ];
}
