<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FilterModel;

class SelectOption extends FilterModel
{
    use HasFactory;

    protected $fillable = ['key','option','value'];
}
