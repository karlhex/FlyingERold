<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sop extends Model
{
    use HasFactory;

    protected $table = 'schedule_of_payment';

    protected $fillable=['contract_id','sequence','instruction',
                         'drcr','amount','schedule_date','tran_date',
                         'memo'
                        ];
    protected $casts =[
       'amount' => 'decimal:2'
    ];

    public function getDrcr()
    {
        if ($this->drcr == 'Dr')
            return '付款';
        else
        if ($this->drcr == 'Cr')
            return '收款';
        else
            return '';
    }
}
