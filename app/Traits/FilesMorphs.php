<?php

namespace App\Traits;

use App\Models\File;

trait FilesMorphs{

    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }
}
