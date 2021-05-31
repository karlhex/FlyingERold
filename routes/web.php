<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/employees',function(){
        return view('layouts.manage-employees');
    })->name('manage-employees');

    Route::get('/contracts',function(){
        return view('layouts.manage-contracts');
    })->name('manage-contracts');

    Route::get('/people',function(){
        return view('layouts.manage-people');
    })->name('manage-people');

    Route::get('/companies',function(){
        return view('layouts.companies');
    })->name('manage-company');

    Route::get('/options',function(){
        return view('layouts.options');
    })->name('manage-options');

    Route::get('/contract/{id?}',function($id = null){
        return view('layouts.contract',['id' => $id] );
    })->name('contract')->whereNumber('id');

    Route::get('/employee/{id?}',function($id = null){
        return view('layouts.employee',['id' => $id] );
    })->name('employee')->whereNumber('id');

});
