<?php

namespace App\Traits;

use App\Models\Transaction;

trait FilesMorphs{

    public function transactions()
    {
        return $this->morphMany(Transaction::class,'tranable');
    }
}
