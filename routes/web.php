<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('users', [UserController::class, 'listAllUsers'])->name('users');
	Route::get('users/create', [UserController::class, 'showForm'])->name('users/create');
	Route::post('users/create', [UserController::class, 'addUser'])->name('users/create.post');
	Route::get('users/{user}', [UserController::class, 'listUser'])->name('users.list');
	Route::post('users/{user}', [UserController::class, 'updateUser'])->name('users.update');

	Route::get('properties', [PropertiesController::class, 'listaAllProperties'])->name('properties');
	Route::get('properties/create', [PropertiesController::class, 'createPropertie'])->name('properties.create');	

	Route::get('partners', [PartnerController::class, 'listaAllPartner'])->name('partners');
	Route::get('partner/create', [PartnerController::class, 'createPartner'])->name('partner.create');

	Route::get('expense', [ExpensesController::class, 'listaAllExpenses'])->name('expense');
	Route::get('expense/create', [ExpensesController::class, 'createExpense'])->name('expense.create');
	


	
});

