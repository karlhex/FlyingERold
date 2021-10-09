<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RbDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'reason',
        'amount',
        'project_id'
    ];

}
