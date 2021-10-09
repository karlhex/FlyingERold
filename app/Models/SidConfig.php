<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FilterModel;

class SidConfig extends FilterModel
{
    use HasFactory;

    protected $fillable=[
        'key','prefix','inc_year','inc_month','inc_day','length','current_no','max_no','clear_interval'
    ];


    public function getSidAttribute()
    {
        $x = trim($this->prefix);
        $y = date('Y');
        $m = date('m');
        $d = date('d');

        if ($this->inc_year)
            $x = $x.$y;

        if ($this->inc_month)
            $x = $x.$m;

        if ($this->inc_day)
            $x = $x.$d;

        $n = sprintf("%06u",$this->current_no);

        $this->increment("current_no");

        return $x.$n;
    }
}
