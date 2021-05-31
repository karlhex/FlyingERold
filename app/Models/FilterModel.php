<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterModel extends Model
{
    public function scopeFilter($query, $params)
    {
        foreach($params as $key => $item)
        {
            if ( isset($item) && trim($item) !== '') {
                $query->where($key, 'LIKE', '%'.trim($item) . '%');
            }
        }
        return $query;
    }
}
