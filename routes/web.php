<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]] ,function() {
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dialog/{dialog}/id/{id?}',function($dialog,$id = null){
        return view('layouts.dialog',['dialog' => $dialog, 'id' => $id] );
    })->name('dialog')->whereNumber('id');

    Route::get('/frame/{frame}',function($frame){
        return view('layouts.frame',['frame' => $frame] );
    })->name('frame');

    Route::get('/employees',function(){
        return view('layouts.manage-employees');
    })->name('manage-employees');

    Route::get('/contracts',function(){
        return view('layouts.manage-contracts');
    })->name('manage-contracts');

    Route::get('/projects',function(){
        return view('layouts.projects');
    })->name('manage-projects');

    Route::get('/people',function(){
        return view('layouts.manage-people');
    })->name('manage-people');

    Route::get('/companies',function(){
        return view('layouts.companies');
    })->name('manage-companies');

    Route::get('/sids',function(){
        return view('layouts.sids');
    })->name('manage-sids');

    Route::get('/options',function(){
        return view('layouts.options');
    })->name('manage-options');

    Route::get('/sub-edit-plan',function(){
        return view('layouts.sub-edit-plan');
    })->name('sub-edit-plan');

    Route::get('/contract/{id?}',function($id = null){
        return view('layouts.contract',['id' => $id] );
    })->name('contract')->whereNumber('id');

    Route::get('/project/{id?}',function($id = null){
        return view('layouts.project',['id' => $id] );
    })->name('project')->whereNumber('id');

    Route::get('/employee/{id?}',function($id = null){
        return view('layouts.employee',['id' => $id] );
    })->name('employee')->whereNumber('id');

    Route::get('/company/{id?}',function($id = null){
        return view('layouts.company',['id' => $id] );
    })->name('company')->whereNumber('id');

    Route::get('/person/{id?}',function($id = null){
        return view('layouts.person',['id' => $id] );
    })->name('person')->whereNumber('id');

    Route::get('/sidconfig/{id?}',function($id = null){
        return view('layouts.sidconfig',['id' => $id] );
    })->name('sidconfig')->whereNumber('id');

    Route::get("storage/{file_name}",[FileController::class,'browse']);
});
