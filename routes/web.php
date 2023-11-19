<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/login', function () {
    return view('auth\login');
})->name('login');

Route::get('/register', function () {
    return view('auth\register');
})->name('register');

Route::get('/doctor',[HomeController::class,'doctor']);

Route::get('/about',[HomeController::class,'about']);

Route::get('/news',[HomeController::class,'news']);

Route::get('/contact',[HomeController::class,'contact']);



Route::get('/add_latest_view',[AdminController::class,'latestview']);

Route::post('/upload_latest',[AdminController::class,'upload_latest']);

Route::get('/show_latest',[AdminController::class,'show_latest']);

Route::get('/deletelatest/{id}',[AdminController::class,'deletelatest']);

Route::get('/updatelatest/{id}',[AdminController::class,'updatelatest']);

Route::post('/editlatest/{id}',[AdminController::class,'editlatest']);




Route::get('/search',[AdminController::class,'search']);

Route::get('/home',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index']);

Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);


Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);


Route::get('/deleteappoint/{id}',[AdminController::class,'deleteappoint']);


Route::get('/showappointment',[AdminController::class,'showappointment']);

Route::get('/approved/{id}',[AdminController::class,'approved']);

Route::get('/canceled/{id}',[AdminController::class,'canceled']);

Route::get('/showdoctor',[AdminController::class,'showdoctor']);

Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor']);

Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);

Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
