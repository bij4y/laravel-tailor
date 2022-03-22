<?php

use App\Http\Controllers\AddIMageController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OrderController as ControllersOrderController;
use App\Http\Controllers\OrderController1;
use App\Http\Controllers\ProductController;
use App\Models\OrderController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders',OrderController1::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('carousel', CarouselController::class);
Route::resource('add', AddIMageController::class);
Route::resource('onboarding',OnboardingController::class);
