<?php

use App\Http\Controllers\AppApiController;
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

Route::post('/userregister',[AppApiController::class,'userRegister']);
Route::post('/verifyOTP',[AppApiController::class,'verifyOtp']);
Route::post('/resendOtp',[AppApiController::class,'resendOtp']);
Route::post('/login',[AppApiController::class,'login']);
Route::post('/forgotPassword',[AppApiController::class,'forgotPassword']);
Route::post('/changePassword',[AppApiController::class,'changePassword']);
Route::post('/resetPassword',[AppApiController::class,'resetPassword']);
Route::get('logout',[AppApiController::class,'logout']);

Route::get('/list-all-product',[AppApiController::class,'listAllProduct']);
Route::get('/single-product',[AppApiController::class,'singleProduct']);
Route::post('/add-cart',[AppApiController::class,'addCart']);
Route::get('/get-cart-product',[AppApiController::class,'getCartProduct']);
Route::post('/update-cart',[AppApiController::class,'updateCart']);
Route::post('/remove-cart',[AppApiController::class,'removeCart']);

Route::get('menu-list',[AppApiController::class,'listMenu']);
Route::post('update-profile-pic',[AppApiController::class,'uploadProfilePic']);
Route::post('add-address',[AppApiController::class,'addAddress']);
Route::post('edit-address',[AppApiController::class,'editAddress']);
Route::get('get-address',[AppApiController::class,'getAddress']);
Route::get('update-address-status/{id}',[AppApiController::class,'updateAddressStatus']);
Route::get('support',[AppApiController::class,'support']);
Route::get('privacy-policy',[AppApiController::class,'privacyPolicy']);
Route::get('get-single-address/{id}',[AppApiController::class,'getSignleAddress']);
Route::get('delete-address/{id}',[AppApiController::class,'deleteAddress']);

Route::get('getProfile',[AppApiController::class,'getProfile']);
Route::post('create-order-id',[AppApiController::class,'createOrder']);
Route::post('transaction',[AppApiController::class,'transaction']);
Route::get('get-subscription',[AppApiController::class,'getSubscription']);

Route::get('/single-menu/{id}',[AppApiController::class,'singleMenu']);
Route::get('notification',[AppApiController::class,'notification']);

// Route::get('appointment',[AppApiController::class,'appointment']);
Route::get('get-delivery-history',[AppApiController::class,'getDeliveryDetails']);
