<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AppointmentController;


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

// Route::get('/', function () {
//     return view('front.index')->name('index');
// });

Route::view('/','front.index')->name('index');
Route::view('/about','front.about')->name('about');
Route::view('/contact','front.contact')->name('contact');
Route::post('/add-appointments', [AppointmentController::class,'add'])->name('add-appointment');

Route::middleware(['PreventBackHistory'])->group(function(){
    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [Controller::class, 'profile'])->name('profile');
    Route::post('/update-profile',[Controller::class, 'updateProfile'])->name('update-profile');

    //category
    Route::get('/category', [CategoryController::class,'index'])->name('category');
    Route::get('/add-category', [CategoryController::class,'addCategory'])->name('addCategory');
    Route::post('/add-category', [CategoryController::class,'add'])->name('add-category');
    Route::get('/edit-category/{id}', [CategoryController::class,'editCategory'])->name('edit-category');
    Route::get('/category/destroy/{id}', [CategoryController::class,'destroy'])->name('category.destroy');

    //menu
    Route::get('/menus', [MenuController::class,'index'])->name('menus');
    Route::get('/add-menu', [MenuController::class,'addMenu'])->name('addMenu');
    Route::post('/add-menu', [MenuController::class,'add'])->name('add-menu');
    Route::get('/edit-menu/{id}', [MenuController::class,'editMenu'])->name('edit-menu');
    Route::get('/menu/destroy/{id}', [MenuController::class,'destroy'])->name('menu.destroy');

    //Daily Expense
    Route::get('/expenses', [ExpenseController::class,'index'])->name('expenses');
    Route::get('/add-expense', [ExpenseController::class,'addExpense'])->name('addExpense');
    Route::post('/add-expense', [ExpenseController::class,'add'])->name('add-expense');
    Route::get('/edit-expense/{id}', [ExpenseController::class,'editExpense'])->name('edit-expense');
    Route::get('/expense/destroy/{id}', [ExpenseController::class,'destroy'])->name('expense.destroy');

    //users
    Route::get('/users', [UserController::class,'index'])->name('users');
    Route::get('/update-status/{id}', [UserController::class,'updateStatus'])->name('user.update-status');

    //delivery
    Route::get('/delivery-report',[DeliveryController::class, 'index'])->name('delivery-report');
    Route::post('/update-delivery',[DeliveryController::class, 'update'])->name('update-delivery');

    //notifications
    Route::get('/notifications',[NotificationController::class, 'index'])->name('notifications');
    Route::get('/add-notifications', [NotificationController::class,'addNotification'])->name('addNotification');
    Route::post('/add-notifications', [NotificationController::class,'add'])->name('add-notification');
    Route::get('/edit-notifications/{id}', [NotificationController::class,'editNotification'])->name('edit-notification');
    Route::get('/notifications/destroy/{id}', [NotificationController::class,'destroy'])->name('notification.destroy');

//supports
Route::get('/supports',[SupportController::class, 'index'])->name('supports');
Route::post('/edit-supports', [SupportController::class,'editSupport'])->name('edit-support');

//privacy_policy
// Route::get('/supports',[SupportController::class, 'index'])->name('supports');
// Route::post('/edit-supports', [SupportController::class,'editSupport'])->name('edit-support');

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

});
