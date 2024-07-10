<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//View Routes
Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/add', function () {
    return view('adminAdd');
});

Route::get('/login', function (){
    return view('plain.login');
});

Route::get('/order', function (){
    return view('plain.order');
});
//end View

// Route to display the shirt creation form
Route::get('/shirts/create', [AdminController::class, 'create'])->name('shirts.create')->middleware('isLoggedIn');

// Route to handle the form submission and add the shirt data
Route::post('/shirts', [AdminController::class, 'store'])->name('shirts.store')->middleware('isLoggedIn');

//ADMIN VIEW with Shirts
Route::get('/admin', [AdminController::class, 'shirtList'])->middleware('isAdmin');

//ADMIN SEARCH
Route::get('/search',[AdminController::class,'search'])->middleware('isAdmin');

//USER VIEW with Shirts
Route::get('/shirts', [UserController::class, 'shirtList'])->middleware('isLoggedIn');

//SIGNUP
Route::get('/signup', [UserController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'processSignup']);

//LOGIN
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'processLogin']);

Route::get('/logout', [UserController::class, 'logout'])->middleware('isLoggedIn');

//DELETE SHIRT ADMIN
Route::get('/delete/{item}', [AdminController::class, 'delete'])->name('delete')->middleware('isLoggedIn');

//EDIT SHIRT ADMIN
Route::get('edit/{item}',[AdminController::class,'edit'])->name('edit')->middleware('isLoggedIn');
Route::put('update-data/{id}',[AdminController::class, 'update'])->middleware('isLoggedIn');

//CREATE ORDER
Route::post('/createOrder', [UserController::class, 'createOrder'])->name('createOrder')->middleware('isLoggedIn');
Route::get('/order', [UserController::class, 'showOrder'])->middleware('isLoggedIn');
Route::get('cancelOrder/{orderId}/{shirtid}',[UserController::class, 'cancelOrder'])->name('cancelOrder');

//ACCOUNT
Route::get('/account',[UserController::class,'accountDet']);
Route::post('/updateUser', [UserController::class, 'updateUser'])->name('updateUser');

//ORDER ADMIN
Route::get('/adminOrder', [AdminController::class, 'adminShowOrder'])->middleware('isAdmin');
Route::post('/fulfill/{id}', [AdminController::class, 'fulfill']);
Route::post('/cancel/{id}', [AdminController::class, 'cancel']);