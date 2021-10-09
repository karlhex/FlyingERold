<?php

namespace App\Traits;

use App\Models\SidConfig;

trait WithSid{

    public function generateSid($key,$field)
    {
        $count = 0;

        if (strpos($field,'.'))
        {
            $f = explode('.',$field);
            $f1 = $f[0];
            $f2 = $f[1];
            $count = count($f) - 1;
            if ($count > 1)
                $f3 = $f[2];
        }else
            $f1 = $field;

        switch ($count)
        {
            case 0:
                $this->$f1 = SidConfig::where('key',$key)->first()->sid;
                break;
            case 1:
                $this->$f1[$f2] = SidConfig::where('key',$key)->first()->sid;
                break;
            case 2:
                $this->$f1[$f2][$f3] = SidConfig::where('key',$key)->first()->sid;
                break;
        }

    }

}
