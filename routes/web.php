<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\FileUploadController;

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

Route::get('/', function () {
    return view('welcome');
});

route::get('/file', [FileUploadController::class,'showForm']);
route::post('/file', [FileUploadController::class,'upload'])->name('file.upload');
Route::get('/file-preview/{fileName}', [FileUploadController::class, 'preview'])->name('file.preview');


