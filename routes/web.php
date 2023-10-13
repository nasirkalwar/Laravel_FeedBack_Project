<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::post('/send_feedback',[HomeController::class,'send_feedback']);
Route::get('/feedback_form',[HomeController::class,'feedback_form']);
Route::get('/my_feedbacks',[HomeController::class,'my_feedbacks']);
Route::get('/all_feedbacks',[HomeController::class,'all_feedbacks']);
Route::get('/delete_my_feedback/{id}',[HomeController::class,'delete_my_feedback']);
Route::get('/feed_user_search',[HomeController::class,'feed_user_search']);
Route::get('/view_feedback/{id}',[HomeController::class,'view_feedback']);
Route::post('/add_comment/{id}',[HomeController::class,'add_comment']);
Route::post('/reply/{id}',[HomeController::class,'reply']);
Route::post('/upvote/{id}',[HomeController::class,'upvote']);
Route::post('/downvote/{id}',[HomeController::class,'downvote']);


Route::get('/users',[AdminController::class,'users']);
Route::get('/search',[AdminController::class,'search']);
Route::get('/feed_search',[AdminController::class,'feed_search']);
Route::get('/feedbacks',[AdminController::class,'feedbacks']);
Route::get('/delete_user/{id}',[AdminController::class,'delete_user']);
Route::get('/delete_feedback/{id}',[AdminController::class,'delete_feedback']);
Route::get('/edit_feedback/{id}',[AdminController::class,'edit_feedback']);
Route::post('/update_feedback/{id}',[AdminController::class,'update_feedback']);
Route::get('/comments',[AdminController::class,'comments']);
Route::get('/delete_comment/{id}',[AdminController::class,'delete_comment']);
