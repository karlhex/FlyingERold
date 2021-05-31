<?php

use Illuminate\Support\Collection;

$collection = collect(['first' =>1, 'second' =>2]);

print($collection->first);
