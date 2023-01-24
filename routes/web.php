<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', function () {return view('admin-template.auth.login');});
Route::get('/home', function () {return view('admin-template.home');});


Route::get('/resetpassword', function () {return view('resetPasswords.resetPassword');});