<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    function browse($file_name){
        Log::debug($file_name);
        return response()->file(storage_path().'/app/files/'.$file_name);
    }
}
