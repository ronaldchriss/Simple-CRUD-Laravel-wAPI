<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\ContController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\ThemController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReplyCOntroller;
use Illuminate\Support\Facades\Route;
use Lcobucci\JWT\Signer\Ecdsa\Sha256;

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

Route::controller(AuthController::class)->group(function(){
    Route::post('/auth', 'postlogin')->name('auth');
    Route::get('/exit', 'exit')->name('exit');
});

Route::group(['middleware' => ['auth'],], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dash');
    Route::post('upload/img',[CKEditorController::class, 'upload'])->name('ckeditor.upload');
    Route::prefix(hash('sha256','signalog').'-signalog')->group(function(){
        Route::resource('term', TermController::class, [
            'names' => [
                'index' => 'management.term',
                'store' => 'term.make',
                'update' => 'term.update',
                'edit' => 'term.edit',
                'show' => 'term.destroy'
            ]
        ])->parameters(['term' => 'code']);
        Route::controller(ThemeController::class)->prefix('theme')->group(function(){
            Route::get('/{flag}', 'index')->name('management.theme');
            Route::post('/make','store')->name('thm.make');
            Route::get('/edit/{code}','edit')->name('thm.edit');
            Route::post('/update/{code}','update')->name('thm.update');
            Route::get('/delete/{code}','show')->name('thm.destroy');
        });
        Route::controller(ContentController::class)->prefix('content')->group(function(){
            Route::get('/{code}', 'index')->name('management.content');
            Route::post('/make','store')->name('content.make');
            Route::get('/edit/{code}','edit')->name('content.edit');
            Route::post('/update/{code}','update')->name('content.update');
            Route::get('/delete/{code}','show')->name('content.destroy');
        });
        Route::controller(UserController::class)->prefix('user')->group(function(){
            Route::get('/', 'user')->name('user');
            Route::post('/make','create')->name('user.make');
            Route::post('/update/{code}','update')->name('user.update');
            Route::get('/delete/{code}','delete')->name('user.delete');
        });
        Route::controller(ReplyCOntroller::class)->prefix('reply')->group(function(){
            Route::get('/{code}', 'reply')->name('management.reply');
        });
    });
});

