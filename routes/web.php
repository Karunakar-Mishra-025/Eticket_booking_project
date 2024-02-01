<?php

use App\Models\Trains;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FairController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Payment_Controller;
use App\Models\Message;
use App\Models\User;

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
    return view('main/index');
})->name("index");

//Show Register/Create Form
Route::get('/register',[UserController::class,'register'])->middleware('guest')->middleware('guest');

//Create New User
Route::post('/users',[UserController::class,'store']);

//Log User Out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//show Login User Form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Login User 
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//Showing Edit Profile Page
Route::get('/edit_profile',[UserController::class,'edit']);

//Updating Profile Page
Route::post('/update_profile',[UserController::class,'update']);

Route::post('/search',[FairController::class,'search']);

Route::get('/insert',[FairController::class,'insert']);
Route::get('/read',[FairController::class,'read']);

Route::post('/trains/{trains}/book',[FairController::class,'book'])->middleware('auth');

Route::post('/trains/{train}/book/generateTicket',[FairController::class,'generateTicket'])->middleware('auth')->name('book');

Route::get('/manage_tickets',[FairController::class,'manageTicket'])->middleware('auth');
Route::post('/{pnr}/print',[FairController::class,'printTicket'])->middleware('auth');

Route::post('/{pnr}/cancel',[FairController::class,'cancelTicket'])->middleware('auth');

Route::post('/payment',[Payment_Controller::class,'store']);
Route::get('/about',[MainController::class,'about']);

//user contact

Route::get('/contact',[MainController::class,'contact']);
Route::post('/contact',[MainController::class,'saveMessage']);



//Admin Controls

//show Admin Login Form
Route::get('/admin',[UserController::class,'adminLogin'])->middleware('guest');

//Login User 
Route::post('/users/authenticateAdmin',[UserController::class,'authenticateAdmin']);
//Deletting Train 
Route::post('/trains/{trains}/delete',[FairController::class,'trainDelete'])->middleware('auth');

//show Editting Train form
Route::post('/trains/{trains}/edit',[FairController::class,'trainEdit'])->middleware('auth');

//Updatting Train details 
Route::post('/trains/{trains}/update',[FairController::class,'trainUpdate'])->middleware('auth');

//Trains index
Route::get("/trains", function () {
    if (auth()->user()->name=="admin") {
        return view('trains/index')->with("trains",Trains::latest()->simplePaginate(6));
    }
    return redirect('/');
})->middleware('auth');

//Add Train
Route::post("/add_train",[FairController::class,'trainAdd'])->middleware('auth'); 


//Updatting Train details 
Route::post('/trains/{trains}/add',[FairController::class,'trainSave'])->middleware('auth');

//Users index
Route::get("/users", function () {
    if (auth()->user()->name=="admin") {
        return view('users/index')->with("users",User::latest()->simplePaginate(10));
    }
    return redirect('/');
})->middleware('auth');


//Messages index
Route::get("/messages", function () {
    if (auth()->user()->name=="admin") {
        return view('messages/index')->with("messages",Message::latest()->simplePaginate(10));
    }
    return redirect('/');
})->middleware('auth');


//Deletting Users 
Route::post('/users/{trains}/delete',[FairController::class,'userDelete'])->middleware('auth');
