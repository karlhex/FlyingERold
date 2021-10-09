<?php

namespace App\Traits;

use App\Models\SelectOption;

trait WithSelectOption{

    public function getSelectOptionValue($key,$option)
    {
        $rec = SelectOption::where('key',$key)
                           ->where('option',$option)
                           ->first();

        if ($rec == null)
            return null;

        return $rec->value;
    }
}
