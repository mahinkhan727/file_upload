<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;


route::get('/', [FileUploadController::class,'showForm']);
route::post('/', [FileUploadController::class,'upload'])->name('file.upload');
Route::get('/file-preview/{fileName}', [FileUploadController::class, 'preview'])->name('file.preview');


