<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('menu.dashboard');
})->name('dash');

Route::get('/management/theme', function () {
    return view('menu.management.theme');
})->name('management.theme');

Route::get('/management/content', function () {
    return view('menu.management.term');
})->name('management.content');


Route::post('upload/img',[CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::controller(AuthController::class)->group(function(){
    Route::post('/auth', 'postlogin')->name('auth');
    Route::get('/exit', 'exit')->name('exit');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('term', TermController::class, [
        'names' => [
            'index' => 'management.term',
            'store' => 'term.make',
            // etc...
        ]
    ]);
    Route::controller(UserController::class)->prefix('user')->group(function(){
        Route::get('/', 'user')->name('user');
        Route::post('/make','create')->name('user.make');
        Route::post('/update/{code}','update')->name('user.update');
        Route::get('/delete/{code}','delete')->name('user.delete');
    });
});

