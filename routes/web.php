<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\StatusPropertiesController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\ClassExpensesController;
use App\Http\Controllers\FileTypeController;
use App\Models\Construction;
use App\Models\Expense;
use App\Models\Properties;
use App\Models\StatusProperties;
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

//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function () {	

	Route::get('/', 'App\Http\Controllers\PropertiesController@listaAllProperties')->name('home');

	//Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

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
	Route::get('properties/list', [PropertiesController::class, 'listaAllPropertiesList'])->name('properties.list');
	Route::get('properties/view/{properties}', [PropertiesController::class, 'showPropertie'])->name('propertie.show');
	Route::get('properties/search', [PropertiesController::class, 'searchPropertie'])->name('search.propertie');	
	Route::get('properties/search/company', [PropertiesController::class, 'searchPropertieCompany'])->name('search.propertie.company');	
	Route::get('properties/create', [PropertiesController::class, 'createPropertie'])->name('properties.create');
	Route::post('properties/create', [PropertiesController::class, 'addProperties'])->name('properties.create.post');

	Route::get('properties/add/files/{properties}', [PropertiesController::class, 'showAddFiles'])->name('properties.add.files');	
	Route::post('properties/add/files/{properties}', [PropertiesController::class, 'addFile'])->name('properties.add.files.post');
	Route::get('properties/remove/file/{propertiesFiles}', [PropertiesController::class, 'removeFile'])->name('propertie.remove.file');
	

	Route::get('properties/add/images/{properties}', [PropertiesController::class, 'showAddImages'])->name('properties.add.images');
	Route::get('properties/add/partner', [PropertiesController::class, 'showAddpartner'])->name('properties.show.partner');
	Route::post('properties/add/partner', [PropertiesController::class, 'addPartner'])->name('properties.add.partner.post');
	Route::get('properties/add/partner/value/propertie', [PropertiesController::class, 'addPartnerValuePropertie'])->name('properties.add.partner.value');
	Route::get('properties/edit/{properties}', [PropertiesController::class, 'showEditPropertie'])->name('propertie.edit');
	Route::put('properties/edit/{properties}', [PropertiesController::class, 'putEditPropertie'])->name('propertie.edit.put');
	//Route::get('properties/{properties}', [PropertiesController::class, 'updatePropertie'])->name('properties.update');
	Route::put('properties/{properties}', [PropertiesController::class, 'editProperties'])->name('properties.edit');	
	Route::get('expense/view/{properties}', [PropertiesController::class, 'showExpensePropertie'])->name('expense.show.propertie');	
	Route::get('expense/create/{properties}', [ExpensesController::class, 'showCreateExpense'])->name('expense.create');	
	Route::post('expense/create/{properties}', [ExpensesController::class, 'createExpense'])->name('expense.create.post');
	//Route::get('expense/view/{properties}/unique', [PropertiesController::class, 'showUniqueExpensePropertie'])->name('expense.show.propertie.unique');
	Route::get('properties/edit/images/{properties}', [PropertiesController::class, 'showEditImages'])->name('properties.edit.images');
	Route::put('properties/edit/images/{properties}', [PropertiesController::class, 'editImages'])->name('properties.edit.images.put');
	Route::get('properties/edit/files/{properties}', [PropertiesController::class, 'showEditFiles'])->name('properties.edit.files');
	Route::get('properties/remove/partner/{properties}', [PropertiesController::class, 'showEditPartnerRemove'])->name('properties.edit.partner');
	Route::get('properties/edit/partner/{partner}', [PropertiesController::class, 'editPartnerRemove'])->name('properties.remove.partner.post');
	Route::get('properties/insert/partner/{properties}', [PropertiesController::class, 'showEditPartnerAdd'])->name('properties.insert.partner');
	Route::post('properties/insert/partner/{properties}', [PropertiesController::class, 'editPartnerAdd'])->name('properties.insert.partner.post');
	Route::get('properties/insert/value/partner/{properties}', [PropertiesController::class, 'showPartnerAddValue'])->name('properties.insert.value.partner');
	Route::post('properties/insert/value/partner/{properties}', [PropertiesController::class, 'partnerAddValue'])->name('properties.insert.value.partner.post');
	
	

	Route::get('partners', [PartnerController::class, 'listaAllPartner'])->name('partners');
	Route::get('partner/create', [PartnerController::class, 'showCreatePartner'])->name('partner.showcreate');
	Route::post('partner/create', [PartnerController::class, 'createPartner'])->name('partner.create');
	Route::get('partner/edit/{partner}', [PartnerController::class, 'editPartner'])->name('partner.edit');	
	Route::put('partner/edit/{partner}', [PartnerController::class, 'editPartnerPut'])->name('partner.edit.put');

	Route::get('expense', [ExpensesController::class, 'listaAllExpenses'])->name('expense');
	Route::get('expense/edit/{expenses}', [ExpensesController::class, 'editExpense'])->name('expense.edit');	
	Route::put('expense/edit/{expenses}', [ExpensesController::class, 'editExpensePut'])->name('expense.edit.put');
	Route::get('expense/view/unique/{expenses}', [ExpensesController::class, 'showExpensesUnique'])->name('expense.show.unique');	
	

	Route::get('realestate', [RealEstateController::class, 'listAllRealEstate'])->name('realestate');
	Route::get('realestate/create', [RealEstateController::class, 'showRealEstate'])->name('realestate.create');
	Route::post('realestate/create', [RealEstateController::class, 'addRealEstate'])->name('realestate.create.post');
	Route::get('realestate/{realestate}', [RealEstateController::class, 'updateRealEstate'])->name('realestate.update');
	Route::put('realestate/{realestate}', [RealEstateController::class, 'editRealEstate'])->name('realestate.edit');

	Route::get('construction', [ConstructionController::class, 'listAllConstruction'])->name('construction');
	Route::get('construction/create', [ConstructionController::class, 'listConstruction'])->name('construction.create');
	Route::post('construction/create', [ConstructionController::class, 'addConstruction'])->name('construction.add');
	Route::get('construction/{construction}', [ConstructionController::class, 'updateConstruction'])->name('construction.show');
	Route::put('construction/{construction}', [constructionController::class, 'editconstruction'])->name('construction.edit');

	Route::get('statusproperties', [StatusPropertiesController::class, 'listAllSP'])->name('statusproperties');
	Route::get('statusproperties/create', [StatusPropertiesController::class, 'createSP'])->name('statusproperties.create');
	Route::post('statusproperties/create', [StatusPropertiesController::class, 'addStatusProperties'])->name('statusproperties.add');
	Route::get('statusproperties/{statusproperties}', [StatusPropertiesController::class, 'updateStatusProperties'])->name('statuspropertie.show');
	Route::put('statusproperties/{statusproperties}', [StatusPropertiesController::class, 'editStatusProperties'])->name('statuspropertie.edit');

	Route::get('expensetype', [ExpenseTypeController::class, 'listAllExpenseTypes'])->name('expensetype');
	Route::get('expensetype/create', [ExpenseTypeController::class, 'createExpenseType'])->name('expensetype.create');
	Route::post('expensetype/create', [ExpensetypeController::class, 'addExpenseType'])->name('expensetype.add');
	Route::get('expensetype/{expensetype}', [ExpensetypeController::class, 'updateExpenseType'])->name('expensetype.show');
	Route::put('expensetype/{expensetype}', [ExpensetypeController::class, 'editExpenseType'])->name('expensetype.edit');

	Route::get('classexpenses', [ClassExpensesController::class, 'listAllClassExpenses'])->name('classexpenses');
	Route::get('classexpenses/create', [ClassExpensesController::class, 'createClassExpenses'])->name('classexpenses.create');
	Route::post('classexpenses/create', [ClassExpensesController::class, 'addClassExpenses'])->name('classexpenses.add');
	Route::get('classexpenses/{classexpenses}', [ClassExpensesController::class, 'updateClassExpenses'])->name('classexpenses.show');
	Route::put('classexpenses/{classexpenses}', [ClassExpensesController::class, 'editClassExpenses'])->name('classexpenses.edit');

	Route::get('filetype', [FileTypeController::class, 'index'])->name('filetypes');
	Route::get('filetype/create', [FileTypeController::class, 'create'])->name('filetype.create');
	Route::post('filetype/create', [FileTypeController::class, 'store'])->name('filetype.create.post');
	Route::get('filetype/{filetype}', [FileTypeController::class, 'show'])->name('filetype.show');
	Route::put('filetype/{filetype}', [FileTypeController::class, 'update'])->name('filetype.update');
	
});

