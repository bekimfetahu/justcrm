<?php

use Illuminate\Support\Facades\Route;
use Justcrm\Crm\Controllers\LoginController;


Route::get('/justcrm/token/{connectionToken}', [LoginController::class,'createToken'])->name('justcrm.token');
Route::get('/justcrm/sso-access', function (){
    return config('justcrm.sso_access');
})->name('justcrm.sso_access');

