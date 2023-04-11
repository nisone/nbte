<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\CourseController;
use App\Http\Controllers\api\DepartmentController;
use App\Http\Controllers\api\FacultyController;
use App\Http\Controllers\api\PurchasedController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::resource('course', CourseController::class);
    Route::resource('purchase', PurchasedController::class);
    Route::resource('faculty', FacultyController::class);
    Route::resource('department', DepartmentController::class);
    // Route::resource('cart', CartController::class);

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});
