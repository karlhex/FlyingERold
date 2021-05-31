<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;

class Product extends Model
{
    use HasFactory;

    /**
     *  Mass Assignment.
     */
    protected $guarded = ['id'];


    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
