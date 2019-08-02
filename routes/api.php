<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('doctors', 'Doctor\DoctorController', ['except' => ['create', 'edit']]);

Route::resource('medicaldates', 'Med_Date\Medical_DateController', ['except' => ['create', 'edit']]);

Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);

Route::resource('receptionist', 'Receptionist\ReceptionistController', ['only' => ['index', 'show']]);



