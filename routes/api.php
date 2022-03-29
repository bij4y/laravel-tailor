<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BeverageController;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\CarouselController1;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CAtegoryProductController;
use App\Http\Controllers\Api\HardbearController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\Onbaording\OnboardingController;
use App\Http\Controllers\Api\Onbaording\OnboardingController1;
use App\Http\Controllers\Api\Onbaording\OnboardingController2;
use App\Http\Controllers\Api\Product1Controller;
use App\Http\Controllers\Api\Product2Controller;
use App\Http\Controllers\Api\Product3Controller;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ShowTAilorRatingController;
use App\Http\Controllers\Api\TAilorRatingController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::group(['middleware'=> ['auth:sanctum']],
function(){


    Route::resource('carousel1', CarouselController1::class);

    // Route::resource('rating',RatingController::class);
    // Route::resource('products',ProductController::class);
    Route::resource('rating',TAilorRatingController::class);

    Route::post('logout',[AuthController::class,'logout']);
    Route::resource('invoice',InvoiceController::class);
    Route::resource('cart',CartController::class);

});
// Route::resource('catgory', Category::all());
// Route::resource('products',ProductController::class);
// Route::get('products/search',[ProductController::class,'search']);
// Route::resource('productimage', ProductImageController::class);
// Route::resource('categorywith', CAtegoryProductController::class);

// Route::resource('category',CategoryController::class);
Route::resource('showrating',ShowTAilorRatingController::class);
// Route::resource('onboard',OnboardingController::class);
Route::resource('onboarding1',OnboardingController1::class);
// Route::resource('onboarding2',OnboardingController2::class);
Route::resource('categorywith', CAtegoryProductController::class);
Route::get('products/search',[ProductController::class,'search']);
Route::resource('carousel', CarouselController::class);
