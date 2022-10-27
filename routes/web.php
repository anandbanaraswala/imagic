<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\imageControllerAjax;

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

/*Route::get('/', function () {
    return view('resizeimage');
});*/

Route::get('/', function () {
    return view('resizeimageajax');
});


//Route::get('resizeImage', [ImageController::class, 'resizeImage']);
//Route::post('resizeImagePost', [ImageController::class, 'resizeImagePost'])->name('resizeImagePost');

// ajax request rounting
Route::post('/', [imageControllerAjax::class, 'result']);

