<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SqlController;
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

Route::post('login',[LoginController::class,'login'])->name('login');

Route::get('/login-page',[HomeController::class,'loginPage'])->name('login.page');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::group(['middleware' => 'user_auth'], function(){
    Route::get('/home',[HomeController::class,'home'])->name('home');
    Route::get('/customers',[HomeController::class,'customers'])->name('customers');
    Route::get('/customer-create',[HomeController::class,'customerCreate'])->name('customer.create');
    Route::get('/customer-edit/{id}',[HomeController::class,'customerEdit'])->name('customer.edit');
    Route::post('add-customer',[SqlController::class,'addCustomer'])->name('add.customer');
    Route::post('update-customer',[SqlController::class,'updateCustomer'])->name('update.customer');
    Route::get('delete-customer/{id}',[SqlController::class,'deleteCustomer'])->name('delete.customer');
});
