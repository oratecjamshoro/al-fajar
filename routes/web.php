<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\admin\MCCController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\mcc\MilkDetailController;

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
    return redirect('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionsController::class);

    //Admin Routes
    Route::resource('mcc','App\Http\Controllers\admin\mcc\MCCController');

    Route::resource('employees','App\Http\Controllers\admin\hr\EmployeesController');
    Route::resource('users','App\Http\Controllers\admin\users\UserController');
    Route::resource('supplier','App\Http\Controllers\admin\supplier\SupplierController');
    Route::resource('inv_category','App\Http\Controllers\admin\inventory\CategoryController');
    Route::resource('inv_item','App\Http\Controllers\admin\inventory\ItemController');
    Route::resource('inv_request','App\Http\Controllers\employees\InventoryRequestController');

    // MCC Routes
    Route::resource('milk_detail','App\Http\Controllers\mcc\MilkDetailController');
    Route::get('received_milk',[MilkDetailController::class,'received_milk'])->name('received_milk');

});




Route::get('/test',function (){
    return view('test');
})->name('test');