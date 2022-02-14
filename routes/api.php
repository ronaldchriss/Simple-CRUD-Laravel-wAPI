<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth', [AuthController::class, 'authenticate'])->name('authenticate');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::controller(APIController::class)->group(function(){
        Route::prefix('content')->group(function(){
            Route::get('/list/{theme}', 'list_content')->name('list_content');
            Route::get('/{id}', 'content')->name('content');
            Route::get('/{id}/{status}', 'status')->name('status');
            Route::post('/reply/{id}', 'reply')->name('reply');
        });
        Route::get('theme', [APIController::class, 'list_theme'])->name('theme');
        Route::get('term', [APIController::class, 'list_term'])->name('term');
    });
});
