<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable=[
        'currency_code',
        'country',
        'change_rate',
        'balance',
        'status',
    ];
}
