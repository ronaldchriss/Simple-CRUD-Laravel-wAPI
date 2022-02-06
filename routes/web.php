<?php

use App\Http\Controllers\CKEditorController;
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

Route::get('/', function () {
    return view('menu.dashboard');
})->name('dash');

Route::get('/user', function () {
    return view('menu.user.user');
})->name('user');

Route::get('/management/term', function () {
    return view('menu.management.term');
})->name('management.term');

Route::get('/management/theme', function () {
    return view('menu.management.term');
})->name('management.theme');

Route::get('/management/content', function () {
    return view('menu.management.term');
})->name('management.content');

Route::post('upload/img',[CKEditorController::class, 'upload'])->name('ckeditor.upload');
