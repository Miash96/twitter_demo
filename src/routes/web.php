<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/{twitt}/show',[\App\Http\Controllers\MyTwitterController::class,'show'])->name('twitts.show');

Route::middleware('auth')->group(function (){
    Route::get('/create',[\App\Http\Controllers\MyTwitterController::class,'create'])->name('twitts.create');
    Route::post('/',[\App\Http\Controllers\MyTwitterController::class,'store'])->name('twitts.store');

    Route::get('/{twitt}/edit',[\App\Http\Controllers\MyTwitterController::class,'edit'])->name('twitts.edit');
    Route::patch('/{twitt}',[\App\Http\Controllers\MyTwitterController::class,'update'])->name('twitts.update');
    Route::delete('/{twitt}',[\App\Http\Controllers\MyTwitterController::class,'destroy'])->name('twitts.delete');;

    Route::post('/{twitt}/answer',[\App\Http\Controllers\AnswerController::class, 'saveOneByTwitt'])->name('answer.save');
    Route::get('/{parentAnswer}/kid_answer',[\App\Http\Controllers\AnswerController::class, 'createKidAnswer'])->name('kid_answer.create');
    Route::get('/{answer}/clear',[\App\Http\Controllers\AnswerController::class, 'clearAnswer'])->name('answer.clear');
    Route::post('/{parentAnswer}/kid_answer',[\App\Http\Controllers\AnswerController::class, 'storeKidAnswer'])->name('kid_answer.store');


    Route::get('/profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile');

    Route::get('image-upload', [ \App\Http\Controllers\ImageUploadController::class, 'imageUpload' ])->name('image.upload');
    Route::post('image-upload',[\App\Http\Controllers\ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');
    Route::get('{user}/update',[\App\Http\Controllers\UpdateController::class,'edit'])->name('user.edit');

});
Route::get('/',[\App\Http\Controllers\MyTwitterController::class,'index'])->name('index');
//Route::get('/',[\App\Http\Controllers\MyTwitterController::class,'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

