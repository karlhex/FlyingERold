<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FilterModel;

class Person extends FilterModel
{
    use HasFactory;

    protected $guarded = ['id'];

}
