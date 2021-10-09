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

    public function product_info()
    {
        return $this->belongsTo(ProductInfo::class,'productinfo_id');
    }

    public function getProductNameAttribute()
    {
        $pinfo = $this->product_info;

        return $pinfo->name;
    }
}
