<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable=[
        'productinfo_id',
        'purchase_contract',
        'sales_contract',
        'number',
        'license',
        'status',
    ];

    public function ProductInfo()
    {
        return $this->hasOne(ProductInfo::class);
    }

    public function PurchaseContract()
    {
        return $this->belongTo(Contract::class,'purchase_contract');
    }

    public function SalesContract()
    {
        return $this->belongTo(Contract::class,'sales_contract');
    }

}
